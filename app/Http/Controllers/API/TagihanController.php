<?php

namespace App\Http\Controllers\API;

use App\Berlangganan;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Paket;
use App\Mitra;
use App\Tagihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    public $oke = 200;
    public $fail = 401;
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
            $cek = Tagihan::whereMonth('tagihan_bulan', Date('m'))->get();

            if ($cek) {
                return response()->json([
                    'success' => 'Tagihan bulan ini sudah ada'
                ], 200);
            } else {
                foreach ($data as $dt) {
                    Tagihan::create([
                        'collector' => $mitra->id,
                        'payer' => $dt->id_akun,
                        'jumlah_tagihan' => $dt->tarif,
                        'tagihan_bulan' => Date('Y-m-d'),
                        'status_tagihan' => 'Masuk',
                        'created_by' => $mitra->id,
                        'updated_by' => $mitra->id,
                        'created_at' => Date('Y-m-d H:i:s'),
                        'updated_at' => Date('Y-m-d H:i:s'),
                    ]);
                }
            }
            return response()->json([
                'success' => 'Berhasil generate tagihan'
            ], $this->oke);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], $this->fail);
        }
    }

    public function payable($idPayer)
    {
        try {
            $data = Tagihan::where('payer', $idPayer)->where('status_tagihan', 'Masuk')->get();
            $paylable = [];
            $jumlah = 0;
            foreach ($data as $key) {
                $jumlah = $jumlah + $key->jumlah_tagihan;
                $paylable[] = ([
                    'label' => Helper::bulantahun($key->tagihan_bulan),
                    'bulan' => $key->tagihan_bulan,
                    'jumlah' => $jumlah,
                ]);
            }
            return response()->json([
                'payable' => $paylable
            ],  $this->oke);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ],  $this->oke);
        }
    }

    public function createTagihan(Request $request)
    {
        $payer = $request['idPelanggan'];
        // $bulan = $request['bulan'];
        $data = Tagihan::where('payer', $payer)->where('status_tagihan', 'Masuk')->get();
        $bulan = [];
        $jumlah = 0;
        $paylable = [];
        foreach ($data as $key) {
            $jumlah = $jumlah + $key->jumlah_tagihan;
            $paylable[] = ([
                'label' => Helper::bulantahun($key->tagihan_bulan),
                'bulan' => $key->tagihan_bulan,
                'jumlah' => $jumlah,
                'id' => $key->id,
            ]);
        }
        for ($i = 0; $i < count($paylable); $i++) {
            array_push($bulan, $paylable[$i]['id']);
            if ($paylable[$i]['bulan'] == $request['bulan']) {

                if ($request['total'] < $paylable[$i]['jumlah']) {
                    return response()->json([
                        'error' => 'Jumlah pembayaran kurang dari total tagihan'
                        // 'error' => $request['total']
                    ],  $this->fail);
                } else {
                    for ($i = 0; $i < count($bulan); $i++) {
                        if (Auth::user()->role == 'Mitra') {
                            Tagihan::where('id', $bulan[$i])
                                ->update([
                                    'updated_by' => Auth::id(),
                                    'updated_at' => Date('Y-m-d H:i:s'),
                                    'status_tagihan' => 'Lunas',
                                ]);
                        } else {
                            $fileType = $request->file('bukti')->extension();
                            $name = Str::random(8) . '.' . $fileType;
                            Storage::putFileAs('bukti', $request->file('bukti'), $name);
                            Tagihan::where('id', $bulan[$i])
                                ->update([
                                    'updated_by' => Auth::id(),
                                    'updated_at' => Date('Y-m-d H:i:s'),
                                    'status_tagihan' => 'Lunas',
                                    'bukti' => Storage::putFileAs('bukti', $request->file('bukti'), $name)
                                ]);
                        }
                    }
                    // Tagihan::where()
                    return response()->json([
                        'success' => 'Berhasil melakukan pembayaran'
                    ],  $this->oke);
                }
            } else {
                array_push($bulan, $paylable[$i]['id']);
            }
        }
    }

    public function historyTagihan()
    {
        $id = Auth::id();
        try {
            if (Auth::user()->role == 'Mitra') {

                try {
                    $data = Tagihan::where('tagihan.payer', $id)->orderBy('tagihan.tagihan_bulan', 'DESC')
                        ->select('tagihan.*',)
                        ->get();
                    $tagihanPelanggan = Tagihan::leftJoin('berlangganan', 'berlangganan.id_pelanggan', 'tagihan.payer')
                        ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
                        ->leftJoin('users', 'users.id', 'tagihan.collector')
                        ->leftJoin('pelanggan', 'pelanggan.id_akun', 'berlangganan.id_pelanggan')
                        ->where('tagihan.collector', $id)->orderBy('tagihan.tagihan_bulan', 'DESC')
                        ->select('tagihan.*', 'paket.nama_paket', 'pelanggan.nama', 'pelanggan.id_akun', 'pelanggan.id')
                        ->get();
                    $rekap = Tagihan::where('collector', $id)
                        ->where('status_tagihan', 'Lunas')
                        ->whereMonth('tagihan_bulan', Date('m'))
                        ->sum('jumlah_tagihan');
                    return response()->json([
                        'rekap' => $rekap,
                        'pelanggan' => $tagihanPelanggan,
                        'data' => $data
                    ],  $this->oke);
                } catch (\Throwable $th) {
                    return response()->json([
                        'error' => $th
                    ],  $this->fail);
                }
            } else {
                $data = Tagihan::leftJoin('berlangganan', 'id_pelanggan', 'tagihan.payer')
                    ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
                    ->leftJoin('users', 'users.id', 'tagihan.collector')
                    ->leftJoin('mitra', 'mitra.id_akun', 'users.id')
                    ->where('tagihan.payer', $id)->orderBy('tagihan.tagihan_bulan', 'DESC')
                    ->select('tagihan.*', 'paket.nama_paket', 'mitra.nama_usaha')
                    ->get();
                return response()->json([
                    'data' => $data
                ],  $this->oke);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ],  $this->fail);
        }
    }

    public function detailTagihan($id)
    {
        try {
            $cek = Tagihan::where('id', $id)->first();
            if (Auth::user()->role == 'Pelanggan') {
                $data = Tagihan::leftJoin('berlangganan', 'id_pelanggan', 'tagihan.payer')
                    ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
                    ->leftJoin('users', 'users.id', 'tagihan.collector')
                    ->leftJoin('mitra', 'mitra.id_akun', 'users.id')
                    ->where('tagihan.id', $id)
                    ->select('tagihan.*', 'paket.nama_paket', 'mitra.nama_usaha')
                    ->first();
                return response()->json([
                    'data' => $data
                ],  $this->oke);
            } else {
                if ($cek->payer == Auth::user()->id) {
                    $data = Tagihan::select('*')
                        ->first();

                    return response()->json([
                        'data' => $data
                    ],  $this->oke);
                } else {
                    $data = Tagihan::leftJoin('berlangganan', 'id_pelanggan', 'tagihan.payer')
                        ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
                        ->leftJoin('users', 'users.id', 'tagihan.collector')
                        ->leftJoin('pelanggan', 'pelanggan.id_akun', 'users.id')
                        ->where('tagihan.id', $id)
                        ->select('tagihan.*', 'paket.nama_paket', 'pelanggan.nama')
                        ->first();
                    return response()->json([
                        'data' => $data
                    ],  $this->oke);
                }
            }
        } catch (\Throwable $th) {
            return $th;
            return response()->json([
                'error' => $th
            ],  $this->fail);
        }
    }

    public function detailTagihanPelanggan($id)
    {
        try {
            $data = Tagihan::leftJoin('berlangganan', 'berlangganan.id_pelanggan', 'tagihan.payer')
                ->leftJoin('paket', 'paket.id', 'berlangganan.id_paket')
                ->leftJoin('users', 'users.id', 'tagihan.payer')
                ->leftJoin('pelanggan', 'pelanggan.id_akun', 'users.id')
                ->where('tagihan.id', $id)
                ->select('tagihan.*', 'paket.nama_paket', 'pelanggan.nama')
                ->first();
            return response()->json([
                'data' => $data
            ],  $this->oke);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ],  $this->fail);
        }
    }
}
