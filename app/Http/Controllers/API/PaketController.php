<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mitra;
use App\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $id = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();
            $data = Paket::where('id_mitra', $id->id)->get();
            if ($data->isNotEmpty()) {
                return response()->json([
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'data' => 'Data paket tidak teredia'
                ], 200);
            }


        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string',
            'kode_paket' => 'required|string',
            'tarif' => 'required|string',
        ]);

        try {
            $id = Mitra::where('id_akun', Auth::user()->id)->select('id')->first();
            Paket::create([
                'id_mitra' => $id->id,
                'nama_paket' => $request->nama_paket,
                'kode_paket' => $request->kode_paket,
                'tarif' => $request->tarif,
                'status' => 'Aktif',
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);
            return response()->json([
                'success' => 'Successfully created paket!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Paket::where('id', $id)->first();
            return response()->json([
                'data' => $data
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'nama_paket' => 'required|string',
            'kode_paket' => 'required|string',
            'tarif' => 'required|string',
            'status' => 'required|string',
        ]);
        // return response()->json([
        //     'success' => $request->nama_paket
        // ], 200);
        try {
            Paket::where('id', $id)->update([
                'nama_paket' => $request->nama_paket,
                'kode_paket' => $request->kode_paket,
                'tarif' => $request->tarif,
                'status' => $request->status,
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);
            return response()->json([
                'success' => 'Successfully updated paket!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
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
            Paket::where('id', $id)->delete();
            return response()->json([
                'success' => 'Successfully deleted paket!'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }
}
