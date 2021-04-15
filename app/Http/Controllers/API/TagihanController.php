<?php

namespace App\Http\Controllers\API;

use App\Berlangganan;
use App\Http\Controllers\Controller;
use App\Paket;
use App\Mitra;
use App\Tagihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TagihanController extends Controller
{
    public function generate(Request $request)
    {

        try {
            $mitra = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();
            $data = Berlangganan::leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
            ->leftJoin('pelanggan', 'pelanggan.id', 'berlangganan.id_pelanggan')
            ->where('berlangganan.id_mitra', $mitra->id)
            ->where('berlangganan.status', 'Aktif')
            ->select('berlangganan.*', 'paket.tarif', 'pelanggan.id_akun')
            ->get();
            $cek = Tagihan::whereMonth('tagihan_bulan' , Date('m'))->get();
            if ($cek) {
                return response()->json([

                    'success' => 'Tagihan bulan ini sudah ada'
                ], 200);
            } else {
                foreach ($data as $dt) {
                    Tagihan::create([
                        'collector' => $dt->id_mitra,
                        'payer' => $dt->id_akun,
                        'jumlah_tagihan' => $dt->tarif,
                        'tagihan_bulan' => Date('Y-m-d'),
                        'status_tagihan' => 'Masuk',
                        'created_at' => Date('Y-m-d H:i:s'),
                        'updated_at' => Date('Y-m-d H:i:s'),
                    ]);
                }
            }
            return response()->json([
                'success' => 'Berhasil generate tagihan'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }
}
