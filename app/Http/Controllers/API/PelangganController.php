<?php

namespace App\Http\Controllers\API;

use App\Berlangganan;
use App\Mitra;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Tagihan;
use App\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{

    public function index()
    {
        try {
            $data = Pelanggan::leftJoin('users', 'users.id', 'pelanggan.id_akun')
                ->select('pelanggan.*', 'users.username')
                ->get();
            return response()->json([
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'error' => $th
            ], 200);
        }
    }

    public function detail($id)
    {
        try {
            $data = Pelanggan::leftJoin('users', 'users.id', 'pelanggan.id_akun')
                ->leftJoin('berlangganan', 'berlangganan.id_pelanggan', 'pelanggan.id_akun')
                ->select('pelanggan.*', 'users.username', 'berlangganan.kode_undangan')
                ->where('pelanggan.id', $id)
                ->first();
            return response()->json([
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'error' => $th
            ], 200);
        }
    }
    public function createInvitation(Request $request)
    {
        $request->validate([
            'id_paket' => 'required',
            'kode_undangan' => 'required',
        ]);

        try {
            $id_mitra = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();

            if (!$request->id_pelanggan) {
                $user = User::create([
                    'username' => $request->telepon,
                    'role' => 'Pelanggan',
                    'status' => 'Aktif',
                    'password' => bcrypt('12345678'),
                    'created_at' => Date('Y-m-d H:i:s'),
                    'updated_at' => Date('Y-m-d H:i:s'),
                ]);
                Pelanggan::create([
                    'id_akun' => $user->id,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                    'status' => 'Aktif',
                    'created_at' => Date('Y-m-d H:i:s'),
                    'updated_at' => Date('Y-m-d H:i:s'),
                ]);
                Berlangganan::create([
                    'id_mitra' => $id_mitra->id_akun,
                    'id_pelanggan' => $user->id,
                    'id_paket' => $request->id_paket,
                    'kode_undangan' => $request->kode_undangan,
                    'status' => 'Aktif',
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

    public function listPelanggan()
    {
        try {
            $id = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();
            $data = Berlangganan::leftJoin('users', 'users.id', 'berlangganan.id_pelanggan')
                ->leftJoin('pelanggan', 'pelanggan.id_akun', 'users.id')
                ->where('berlangganan.id_mitra', Auth::user()->id)
                ->select('pelanggan.*')
                ->get();
            return response()->json([
                'data' => $data
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

            $pendapatan = Tagihan::where('collector', Auth::user()->id)
                ->where('status_tagihan', 'Lunas')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->sum('jumlah_tagihan');
            $rekap = Tagihan::where('payer', Auth::user()->id)
                ->where('status_tagihan', 'Masuk')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->sum('jumlah_tagihan');
            $tagihan = Tagihan::where('payer', Auth::user()->id)
                ->where('status_tagihan', 'Masuk')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->first();
            $pelanggan = Berlangganan::where('id_mitra', Auth::user()->id)
                ->count();
            $jumlah_bayar = Tagihan::leftJoin('users', 'users.id', 'tagihan.payer')
                ->leftjoin('mitra', 'mitra.id_akun', 'users.id')
                ->where('tagihan.collector', Auth::user()->id)
                ->where('tagihan.status_tagihan', '!=', 'Lunas')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->count();
            $jumlah_belum_bayar = Tagihan::leftJoin('users', 'users.id', 'tagihan.payer')
                ->leftjoin('mitra', 'mitra.id_akun', 'users.id')
                ->where('tagihan.collector', Auth::user()->id)
                ->where('tagihan.status_tagihan', 'Lunas')
                ->whereMonth('tagihan_bulan', Date('m'))
                ->count();
            return response()->json([
                'pendapatan' => $pendapatan,
                'rekap' => $rekap,
                'tagihan' => $tagihan,
                'pelanggan' => $pelanggan,
                'jumlah_bayar' => $jumlah_bayar,
                'jumlah_belum_bayar' => $jumlah_belum_bayar,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    public function homePelanggan()
    {
        try {

            $tagihan =Tagihan::leftJoin('berlangganan', 'id_pelanggan', 'tagihan.payer')
            ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
            ->leftJoin('users', 'users.id', 'tagihan.collector')
            ->leftJoin('mitra', 'mitra.id_akun', 'users.id')
            ->whereMonth('tagihan.tagihan_bulan', Date('m'))
            ->where('tagihan.payer', Auth::user()->id)->orderBy('tagihan.tagihan_bulan', 'DESC')
            ->select('tagihan.*', 'paket.nama_paket', 'mitra.nama_usaha')
            ->get();

            return response()->json([

                'tagihan' => $tagihan,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }
}
