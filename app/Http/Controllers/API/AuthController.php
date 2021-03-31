<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mitra;
use App\Pelanggan;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signupMitra(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
        ]);
        try {

            $user = User::create([
                'username' => $request->username,
                'role' => 'Admin',
                'status' => 'Aktif',
                'password' => bcrypt($request->password)
            ]);
            Mitra::create([
                'id_akun' => $user->id,
                'nama_usaha' => $request->nama,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'info' => $request->info,
                'status' => 'Aktif',
            ]);
            return response()->json([
                'success' => 'Successfully created user!'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 404);
        }
    }

    public function signupPelanggan(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
        ]);
        try {

            $user = User::create([
                'username' => $request->username,
                'role' => 'Admin',
                'status' => 'Aktif',
                'password' => bcrypt($request->password)
            ]);
            Pelanggan::create([
                'id_akun' => $user->id,
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'status' => 'Aktif',
            ]);
            return response()->json([
                'success' => 'Successfully created user!'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 404);
        }
    }

    public function login(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $data = User::where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data->password)) {
                $success['id_akun'] =  $data->id;
                $success['username'] =  $data->username;
                $success['role'] =  $data->role;
                $success['status'] =  $data->status;

                if ($data->role == 'Mitra') {
                    $mitra = Mitra::where('id_akun', $data->id)->first();
                    $success['id_mitra'] = $mitra->id;
                    $success['nama_usaha'] = $mitra->nama_usaha;
                    $success['alamat'] = $mitra->alamat;
                    $success['telepon'] = $mitra->telepon;
                    $success['info'] = $mitra->info;
                    $success['status'] = $mitra->status;
                } else if ($data->role == 'Pelanggan') {
                    $pelanggan = Pelanggan::where('id_akun', $data->id)->first();
                    $success['id_pelanggan'] = $pelanggan->id;
                    $success['nama_usaha'] = $pelanggan->nama;
                    $success['alamat'] = $pelanggan->alamat;
                    $success['telepon'] = $pelanggan->telepon;
                    $success['status'] = $pelanggan->status;
                }
                $success['token'] =  $data->createToken('nApp')->accessToken;
                return response()->json(['data' => $success], 200);
            } else {
                // return response()->json(['error' => bcrypt($password)], 401);
                return response()->json(['error' => 'Password salah'], 401);
            }
        } else {
            return response()->json(['error' => 'Username Salah'], 401);
        }
    }
}
