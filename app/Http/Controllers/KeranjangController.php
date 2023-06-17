<?php

namespace App\Http\Controllers;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KeranjangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $Pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.nama as nama_barang','pemesanans.*')
        ->where('pemesanans.users_id', $user_id)
        ->where('pemesanans.status', 'keranjang')
        ->get();  
        
        $user_id = Auth::id();
        $penyewaan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->where('pemesanans.users_id', $user_id)
        ->where('pemesanans.status', 'keranjang')
        ->where('pemesanans.jenis_transaksi', 'sewa')
        ->select('pemesanans.*', DB::raw('barangs.harga_sewa * pemesanans.jumlah_pesanan AS total_harga'))
        ->get();
    
        $pembelian = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->where('pemesanans.users_id', $user_id)
        ->where('pemesanans.status', 'keranjang')
        ->where('pemesanans.jenis_transaksi', 'beli')
        ->select('pemesanans.*', DB::raw('barangs.harga_jual * pemesanans.jumlah_pesanan AS total_harga'))
        ->get();
    
        $totalPenyewaan = $penyewaan->sum('total_harga');
        $totalPembelian = $pembelian->sum('total_harga');
    
        return view('keranjang.index', [
            'keranjang' => $Pemesanan,
            'total_penyewaan' => $totalPenyewaan,
            'total_pembelian' => $totalPembelian,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPenyewaan()
    {
        $user_id = Auth::id();
        $Pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
            ->where('pemesanans.users_id', $user_id)
            ->where('pemesanans.status', 'keranjang')
            ->select('pemesanans.*');
    
        if ("pemesanans.jenis_transaksi" == "sewa") {
            $Pemesanan->select(DB::raw('barangs.harga_sewa * pemesanans.jumlah_pesanan AS total_harga'));
        } else {
            $Pemesanan->select(DB::raw('barangs.harga_jual * pemesanans.jumlah_pesanan AS total_harga'));
        }
    
        $Pemesanan = $Pemesanan->get();
        $totalHarga = $Pemesanan->sum('total_harga');
    
        return view('keranjang.create', [
            'keranjang' => $Pemesanan,
       
        ]);
    }
    public function createPembelian()
    {
        $user_id = auth()->user()->id;
    
        $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
            ->select('barangs.nama as nama_barang', 'barangs.harga_jual as harga_jual', 'pemesanans.*')
            ->where('pemesanans.users_id', $user_id)
            ->where('pemesanans.status', 'keranjang')
            ->where('pemesanans.jenis_transaksi', 'beli')
            ->get();
    
        $kode_pemesanan = Str::upper(Str::random(5));
        $status = 'pesan';
        $total_bayar = $pemesanan->sum('harga_jual');
    
        $pemesananIds = $pemesanan->pluck('id')->toArray();
    
        DB::table('pemesanans')
            ->whereIn('id', $pemesananIds)
            ->update([
                'kode_pemesanan' => $kode_pemesanan,
                'status' => $status,
                'total_bayar' => $total_bayar
            ]);
    
        return redirect()->route('pemesanan.indexUser');
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        
        // Ubah input sebelum validasi
        $jumlah_pesanan = $request->input('jumlah_pesanan');
        $jenis_transaksi = $request->input('jenis_transaksi');
        $request->merge(['jumlah_pesanan' => implode(',', $jumlah_pesanan)]);

        // Validasi input dari form
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'jumlah_pesanan' => 'required',
            'jenis_transaksi' => 'required',
            // Tambahkan validasi untuk field lainnya
        ]);
        
        // Tambahkan user_id ke dalam data yang akan disimpan
        $validatedData['users_id'] = $user_id;
        
        // Buat pemesanan baru berdasarkan input dari form
        Pemesanan::create($validatedData);
        
        // Redirect ke halaman index pemesanan dengan pesan sukses
        return redirect()->route('keranjang.index')->with('success', 'Berhasil ditambahkan ke keranjang.');
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
        $keranjang = Keranjang::find($id);
        if (!$keranjang) return redirect()->route('keranjang.index')
            ->with('error_message', 'Keranjang tidak ditemukan');
        return view('keranjang.edit', [
            'keranjang' => $keranjang
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
            'nama_keranjang' => 'required',      
        ]);
        $keranjang = Keranjang::find($id);
        $keranjang->nama_keranjang = $request->nama_keranjang;
        $keranjang->save();
        return redirect()->route('keranjang.index')
            ->with('success_message', 'Berhasil mengubah keranjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $keranjang = Pemesanan::find($id);
        if ($keranjang) $keranjang->delete();
        return redirect()->route('keranjang.index')
            ->with('success_message', 'Berhasil menghapus keranjang');
    }
}
