<?php

namespace App\Http\Controllers;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBarang = JenisBarang::all();
        return view('jenisBarang.index', [
            'jenisBarang' => $jenisBarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenisBarang.create');
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
            'nama_jenis_barang' => 'required',
            
        ]);
        $array = $request->only([
            'nama_jenis_barang'
        ]);
        
        $jenisBarang = JenisBarang::create($array);
        return redirect()->route('jenisBarang.index')
            ->with('success_message', 'Berhasil menambah jenisBarang baru');

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
        $jenisBarang = JenisBarang::find($id);
        if (!$jenisBarang) return redirect()->route('jenisBarang.index')
            ->with('error_message', 'JenisBarang tidak ditemukan');
        return view('jenisBarang.edit', [
            'jenisBarang' => $jenisBarang
        ]);
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
            'nama_jenis_barang' => 'required',      
        ]);
        $jenisBarang = JenisBarang::find($id);
        $jenisBarang->nama_jenis_barang = $request->nama_jenis_barang;
        $jenisBarang->save();
        return redirect()->route('jenisBarang.index')
            ->with('success_message', 'Berhasil mengubah jenisBarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $jenisBarang = JenisBarang::find($id);
        if ($jenisBarang) $jenisBarang->delete();
        return redirect()->route('jenisBarang.index')
            ->with('success_message', 'Berhasil menghapus jenisBarang');
    }
}
