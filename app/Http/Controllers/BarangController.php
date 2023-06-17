<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;




class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
                        ->get(['barangs.*', 'jenis_barangs.nama_jenis_barang AS nama_jenis_barang']);
    
        // Mendecode gambar dari base64

        return view('barang.index', [
            'barang' => $barang
        ]);
    }

    public function etalase()
    {
        $barang = Barang::join('jenis_barangs', 'barangs.jenis_barang_id', '=', 'jenis_barangs.id')
                        ->get(['barangs.*', 'jenis_barangs.nama_jenis_barang AS nama_jenis_barang']);
    
        // Mendecode gambar dari base64
        $jenis_transaksi = "";
        return view('etalase.index', [
            'barang' => $barang,
            'jenis_transaksi' => $jenis_transaksi 
        ]);
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_barang = JenisBarang::all();
        return view('barang.create', [
            'jenis_barang' => $jenis_barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kode_barang' => 'required',
            'jenis_barang_id' => 'required|exists:jenis_barangs,id',
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga_sewa' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'gambar' => 'image|file|max:2048',
            'deskripsi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $barang = new Barang();
            $barang->kode_barang = $request->input('kode_barang');
            $barang->jenis_barang_id = $request->input('jenis_barang_id');
            $barang->nama = $request->input('nama');
            $barang->stok = $request->input('stok');
            $barang->harga_sewa = $request->input('harga_sewa');
            $barang->harga_jual = $request->input('harga_jual');
            $barang->deskripsi = $request->input('deskripsi');

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');

                // Menggunakan package intervention/image untuk memproses gambar
                $image = Image::make($file);

                // Mengompres gambar dengan kualitas 70%
                $image->encode('jpg', 70);

                // Mengambil data base64 dari gambar yang sudah dikompres
                $image_data = base64_encode($image->stream());

                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['gambar' => 'Ukuran file harus kurang dari 1 MB']);
                }

                $barang->gambar = $image_data;
            }

            $barang->save();


            return redirect()->route('barang.index')
                ->with('success', 'Barang berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $barangWithJenisBarang = $barang->join('jenis_barangs', 'jenis_barangs.id', '=', 'barangs.jenis_barang_id')
            ->select('barangs.*', 'jenis_barangs.nama_jenis_barang')
            ->findOrFail($barang->id);
    
        return response()->json($barangWithJenisBarang);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $jenis_barang = JenisBarang::all();
        return view('barang.edit', [
            'barang' => $barang,
            'jenis_barang' => $jenis_barang,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'kode_barang' => 'required',
            'jenis_barang_id' => 'required|exists:jenis_barangs,id',
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga_sewa' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'gambar' => 'image|file|max:2048',
            'deskripsi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $barang->kode_barang = $request->input('kode_barang');
            $barang->jenis_barang_id = $request->input('jenis_barang_id');
            $barang->nama = $request->input('nama');
            $barang->stok = $request->input('stok');
            $barang->harga_sewa = $request->input('harga_sewa');
            $barang->harga_jual = $request->input('harga_jual');
            $barang->deskripsi = $request->input('deskripsi');

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');

                // Menggunakan package intervention/image untuk memproses gambar
                $image = Image::make($file);

                // Mengompres gambar dengan kualitas 70%
                $image->encode('jpg', 70);

                // Mengambil data base64 dari gambar yang sudah dikompres
                $image_data = base64_encode($image->stream());

                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['gambar' => 'Ukuran file harus kurang dari 1 MB']);
                }

                $barang->gambar = $image_data;
            }

            $barang->save();

            return redirect()->route('barang.index')
                ->with('success', 'Barang berhasil diperbarui');
        }
    }



    public function destroy(Request $request, $id)
    {
        $barang = Barang::find($id);
        if ($barang) $barang->delete();
        return redirect()->route('barang.index')
            ->with('success_message', 'Berhasil menghapus barang');
    }
}
