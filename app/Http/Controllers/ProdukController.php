<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Session;
use File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::paginate(10);
        $kategories = Kategori::all();

        return view('admin.produk.index', ['produk' => $produks, 'kategori'=>$kategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('gambar_produk');
        $filename = time()."_".$image->getClientOriginalName();
        $address = 'img_produk_upload';
        $image->move($address,$filename);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama_umkm' => $request->nama_umkm,
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'gambar_produk' => $filename,
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'Produk Dibuat!'
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
         $produks = Produk::join('kategori', 'kategori.id', '=', 'produk.kategori_id')
                    ->where('produk.id', $id)
                    ->first(['produk.*', 'kategori.nama']);
        return $produks;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = Produk::join('kategori', 'kategori.id', '=', 'produk.kategori_id')
                    ->where('produk.id', $id)
                    ->first(['produk.*', 'kategori.nama']);
        return $produks;
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
        $produk = Produk::findOrFail($id);

        $filename = $produk->image;
        if ($request->hasfile('gambar_produk')){
            $image_path = public_path().'/img_produk_upload/'.$filename;
            if(file_exists($image_path))
                File::delete($image_path);
            $image = $request->file('gambar_produk');
            $filename = time()."_".$image->getClientOriginalName();
            $address = 'img_produk_upload';
            $image->move($address,$filename);
        }

        $produk->kategori_id = $request->kategori_id;
        $produk->nama_umkm = $request->nama_umkm;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->gambar_produk =  $filename;
        /*$data =array(
            'kategori_id' => $request->kategori_id,
            'nama_umkm' => $request->nama_umkm,
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'image' =>  $filename,
        );

        DB::table("produk")->where("id",$request->id)->update($data);*/

        $produk->update();

        return response()->json([
            'success'=>true,
            'message'=>'Produk Diperbaharui!'
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
        $produk = Produk::findOrFail($id);

        $filename = $produk->gambar_produk;

        $image_path = public_path().'/img_produk_upload/'.$filename;
            if(file_exists($image_path))
                File::delete($image_path);
        
        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk Berhasil Dihapus!'
        ]);
    }

    public function apiProduk()
    {
        $produks = Produk::join('kategori', 'kategori.id', '=', 'produk.kategori_id')
                    ->get(['produk.*', 'kategori.nama']);
        return response()->json($produks);
    }
}
