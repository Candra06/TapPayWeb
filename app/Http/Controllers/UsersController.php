<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // return $request;
        $data = User::where('username', $request->username)->first();
        if ($data) {
            if ($data->role != 'Admin') {
                // return 'Anda bukan admin!';
                return redirect('/')->with('message', 'Anda bukan admin!');
            } else {
                if (password_verify($request->password, $data->password)) {

                    return $data;
                    session()->put('login', true);
                    session()->put('nama', 'Admin');
                    session()->put('username', $data->username);
                    session()->put('id', $data->id);
                    return redirect('dashboard')->with('message', 'Selamat datang!');
                } else {
                    return redirect('/')->with('message', 'Password salah!');
                }
            }
        } else {
            return redirect('/')->with('message', 'Email tidak teredaftar!');
        }
    }
}
