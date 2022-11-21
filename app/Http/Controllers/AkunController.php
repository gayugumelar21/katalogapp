<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Akun;
use Session;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akuns = Akun::paginate(5);

        return view('admin.akun.index', ['users' => $akuns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Akun::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Akun Dibuat!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akuns = Akun::findOrFail($id);
        return response()->json($akuns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        return $akun;
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
        $akun = Akun::findOrFail($id);

        $akun->name = $request->username;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        $akun->role = $request->role;

        $akun->update();

        return response()->json([
            'success'=>true,
            'message'=>'Akun Diperbaharui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akuns = Akun::findOrFail($id);
        
        $akuns->delete();

        return response()->json([
            'success' => true,
            'message' => 'Akun Berhasil Dihapus!'
        ]);
    }

    public function apiAkun()
    {
        $akuns = Akun::all();
        return response()->json($akuns);
    }
}
