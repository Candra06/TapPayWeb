<?php

namespace App\Http\Controllers;

use App\Berlangganan;
use App\Mitra;
use App\Pelanggan;
use App\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return  session('id');

        $data = Tagihan::leftJoin('users', 'users.id', 'tagihan.payer')
            ->leftjoin('mitra', 'mitra.id_akun', 'users.id')
            ->where('tagihan.collector', session('id'))
            ->whereMonth('tagihan_bulan', Date('m'))
            ->select('tagihan.*', 'mitra.nama_usaha', 'mitra.id as id_mitra')
            ->get();
        $mitra = Mitra::count();
        $pelanggan = Pelanggan::count();
        // return $data;
        $count = Berlangganan::where('id_mitra', 1)->count();
        $tarif = $count * 1000;
        $pendapatan = Tagihan::where('collector', session('id'))
            ->where('status_tagihan', 'Lunas')
            ->whereMonth('tagihan_bulan', Date('m'))
            ->sum('jumlah_tagihan');
        return view('home.index', compact('data', 'mitra', 'pelanggan', 'pendapatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        try {
            $mitra = Mitra::all();

            $cek = Tagihan::where('collector', session('id'))->whereMonth('tagihan_bulan', Date('m'))->get();
            // return $cek;
            if (count($cek) > 0) {
                return redirect('/dashboard')->with('error', 'Tagihan bulan ini telah tersedia');
            } else {

                foreach ($mitra as $dt) {
                    $pendapatan = Tagihan::where('collector', $dt->id_akun)
                        ->where('status_tagihan', 'Lunas')
                        ->whereMonth('tagihan_bulan', Date('m'))
                        ->sum('jumlah_tagihan');

                    $tarif = round($pendapatan * (5 / 100));
                    // return $pendapatan;
                    Tagihan::create([
                        'collector' => session('id'),
                        'payer' => $dt->id_akun,
                        'jumlah_tagihan' => $tarif,
                        'tagihan_bulan' => Date('Y-m-d'),
                        'status_tagihan' => 'Masuk',
                        'created_by' => session('id'),
                        'updated_by' => session('id'),
                        'created_at' => Date('Y-m-d H:i:s'),
                        'updated_at' => Date('Y-m-d H:i:s'),
                    ]);
                }
                return redirect('/dashboard')->with('status', 'Berhasil generate tagihan');
            }
        } catch (\Throwable $th) {
            return redirect('/dashboard')->with('error', 'Gagal generate tagihan');
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
