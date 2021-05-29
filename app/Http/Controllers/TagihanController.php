<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berlangganan;
use App\Mitra;
use App\Pelanggan;
use App\Tagihan;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tagihan::leftJoin('users', 'users.id', 'tagihan.payer')
            ->leftjoin('mitra', 'mitra.id_akun', 'users.id')
            ->where('tagihan.collector', session('id'))
            ->select('tagihan.*', 'mitra.nama_usaha', 'mitra.id as id_mitra')
            ->get();

        return view('tagihan.index', compact('data'));
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tagihan::leftJoin('users', 'users.id', 'tagihan.payer')
            ->leftJoin('mitra', 'mitra.id_akun', 'users.id')
            ->where('tagihan.id', $id)
            ->select('tagihan.*', 'mitra.nama_usaha', 'mitra.id as id_mitra')
            ->first();
        // return $data;
        return view('tagihan.detail', compact('data'));
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
        // return $request;
        try {
            Tagihan::where('id', $id)->update(['status_tagihan' => $request['status_tagihan'], 'updated_by' => session('id'), 'updated_at' => Date('Y-m-d H:i:s')]);
            return redirect('/tagihan')->with('status', 'Berhasil mengubah tagihan');
        } catch (\Throwable $th) {
            return redirect('/tagihan')->with('error', 'Gagal mengubah tagihan');
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
        //
    }
}
