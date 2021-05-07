<?php

namespace App\Http\Controllers\API;

use App\Berlangganan;
use App\Mitra;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Tagihan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function createInvitation(Request $request)
    {
        $request->validate([
            'id_paket' => 'required',
            'kode_undangan' => 'required',
        ]);

        try {
            $id_mitra = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();

            if (!$request->id_pelanggan) {
                Berlangganan::create([
                    'id_mitra' => $id_mitra->id,
                    // 'id_pelanggan' => $request->id_pelanggan,
                    'id_paket' => $request->id_paket,
                    'kode_undangan' => $request->kode_undangan,
                    'status' => 'Nonaktif',
                    'created_at' => Date('Y-m-d H:i:s'),
                    'updated_at' => Date('Y-m-d H:i:s'),
                ]);
            } else {
                Berlangganan::create([
                    'id_mitra' => $id_mitra->id,
                    'id_pelanggan' => $request->id_pelanggan,
                    'id_paket' => $request->id_paket,
                    'kode_undangan' => $request->kode_undangan,
                    'status' => 'Aktif',
                    'created_at' => Date('Y-m-d H:i:s'),
                    'updated_at' => Date('Y-m-d H:i:s'),
                ]);
            }
            return response()->json([
                'success' => 'Successfully created invitation!'
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    public function inputInvitation(Request $request)
    {
        $request->validate([
            'kode_undangan' => 'required'
        ]);

        try {
            $id_pelanggan = Pelanggan::where('id_akun', Auth::user()->id)->select('id')->first();
            Berlangganan::where('kode_undangan', $request->kode_undangan)->update([
                'id_pelanggan' => $id_pelanggan->id,
                'status' => 'Aktif',
            ]);
            return response()->json([
                'success' => 'Successfully input invitation!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    public function homeMitra()
    {
        try {

            $rekap = Tagihan::where('collector', Auth::id())
                ->where('status_tagihan', 'Lunas')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->sum('jumlah_tagihan');
            $rekap = Tagihan::where('payer', Auth::id())
                ->where('status_tagihan', 'Masuk')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->sum('jumlah_tagihan');
            return response()->json([
                'pendapatan' => $rekap,
                'tagihan' => $rekap,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }
}
