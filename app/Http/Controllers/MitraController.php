<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\Paket;
use App\Berlangganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Mitra::leftJoin('users', 'users.id', 'mitra.id_akun')
        ->select('users.username', 'mitra.*')
        ->get();
        return view('mitra.index', compact('mitra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Mitra::leftJoin('users', 'users.id', 'mitra.id_akun')
        ->select('users.username', 'mitra.*')
        ->where('mitra.id', $id)
        ->first();

        $paket = Paket::where('id_mitra', $id)->get();

        $berlangganan = Berlangganan::leftJoin('pelanggan', 'pelanggan.id', 'berlangganan.id_pelanggan')
        ->leftjoin('paket', 'paket.id', 'berlangganan.id_paket')
        ->select('pelanggan.nama', 'paket.nama_paket', 'pelanggan.status', 'pelanggan.id')
        ->where('berlangganan.id_mitra', $id)
        ->get();
        return view('mitra.detail', compact('detail', 'paket', 'berlangganan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mitra = Mitra::leftJoin('users', 'users.id', 'mitra.id_akun')
        ->select('users.username', 'mitra.*')
        ->where('mitra.id', $id)
        ->first();
        // ->find($id);
        return view('mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);

        $input['nama_usaha'] = $request['nama_usaha'];
        $input['username'] = $request['username'];
        $input['telepon'] = $request['telepon'];
        $input['status'] = $request['status'];
        $input['alamat'] = $request['alamat'];
        $input['info'] = $request['info'];

        try {
            Mitra::leftJoin('users', 'users.id', 'mitra.id_akun')
            ->select('users.username', 'mitra.*')
            ->where('mitra.id', $id)
            ->update($input);
            return redirect('/mitra')->with('status', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            return redirect('/mitra/edit/'.$id)->with('status', 'Gagal mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Mitra::destroy('id', $id);
            return redirect('/mitra')->with('status', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect('/mitra')->with('status', 'Data Gagal Dihapus');
        }
    }
}
