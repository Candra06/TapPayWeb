<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::leftjoin('users', 'users.id', 'pelanggan.id_akun')
            ->select('users.username', 'pelanggan.*')
            ->get();
        // return $data;
        return view('pelanggan.index', compact('data'));
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
        $detail = Pelanggan::leftJoin('users', 'users.id', 'pelanggan.id_akun')
            ->select('users.username', 'pelanggan.*')
            ->where('pelanggan.id', $id)
            ->first();
        return view('pelanggan.detail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pelanggan::leftJoin('users', 'users.id', 'pelanggan.id_akun')
            ->select('users.username', 'pelanggan.*')
            ->where('pelanggan.id', $id)
            ->first();
        // return $data;
        return view('pelanggan.edit', compact('data'));
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
            'nama' => 'required',
            'telepon' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);

        try {
            $input['telepon'] = $request['telepon'];
            $input['status'] = $request['status'];
            $input['alamat'] = $request['alamat'];
            $input['nama'] = $request['nama'];
            Pelanggan::where('id', $id)->update($input);
            return redirect('/pelanggan')->with('status', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            return $th;
            return redirect('/pelanggan/edit/' . $id)->with('status', 'Gagal mengubah data');
        }
        // retu
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
