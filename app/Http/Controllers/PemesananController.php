<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;



class PemesananController extends Controller
{
    public function index()
    {
        $kode_pemesanan = Pemesanan::select(
            'pemesanans.kode_pemesanan',
            'pemesanans.status',
            'pemesanans.alamat',
            'pemesanans.tanggal_mulai',
            'pemesanans.tanggal_selesai',
            'pemesanans.jumlah_pesanan',
            'pemesanans.total_bayar',
            'pemesanans.denda',
            'pemesanans.tanggal_kembali',
            'pemesanans.jenis_transaksi',
            'users.name as user_name',
            DB::raw('SUM(pemesanans.total_bayar) as total_bayar'),
            DB::raw('SUM(pemesanans.denda) as total_denda')
        )
            ->join('users', 'pemesanans.users_id', '=', 'users.id')
            ->whereNotNull('pemesanans.kode_pemesanan')
            ->where('pemesanans.status','!=', "keranjang")
            ->groupBy(
                'pemesanans.kode_pemesanan',
                'pemesanans.status',
                'pemesanans.alamat',
                'pemesanans.tanggal_mulai',
                'pemesanans.tanggal_selesai',
                'pemesanans.jumlah_pesanan',
                'pemesanans.total_bayar',
                'pemesanans.denda',
                'pemesanans.tanggal_kembali',
                'pemesanans.jenis_transaksi',
                'users.name'
            )
            ->get();
            $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
            ->select('barangs.*', 'pemesanans.*')
            ->whereNotNull('pemesanans.kode_pemesanan')
            ->where('pemesanans.status','!=', "keranjang")
            ->get();

  
            // dd($pemesanan);
    
        return view('pemesanan.index', compact('pemesanan', 'kode_pemesanan'));
    }
    public function indexUser()
{
    $user_id = auth()->user()->id;

    $kode_pemesanan = Pemesanan::select('kode_pemesanan','jenis_transaksi', 'status','alamat')
    ->where('users_id', $user_id)
    ->where('status', '!=', 'keranjang')
    ->selectRaw('SUM(total_bayar) as total_bayar')
    ->groupBy('kode_pemesanan','jenis_transaksi', 'status','alamat')
    ->get();
    
    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
        ->where('pemesanans.users_id', $user_id)
        ->where('pemesanans.status', '!=', 'keranjang')
        ->get();

    return view('pemesanan.indexUser', compact('pemesanan', 'kode_pemesanan'));
}

public function indexConfirm()
{
   

    $kode_pemesanan = Pemesanan::select('kode_pemesanan', 'jenis_transaksi','status','bukti_pembayaran')
   
    ->where('status','pesan')
    ->orwhere('status','dikonfirmasi')
    ->selectRaw('SUM(total_bayar) as total_bayar')
    ->groupBy('kode_pemesanan', 'jenis_transaksi', 'status','bukti_pembayaran')
    ->get();

  


    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
       
        ->where('pemesanans.status','pesan')
        ->orwhere('pemesanans.status','dikonfirmasi')
        ->get();

    return view('pemesanan.indexConfirm', compact('pemesanan', 'kode_pemesanan'));
}
public function indexProses()
{
   

    $kode_pemesanan = Pemesanan::select('kode_pemesanan', 'jenis_transaksi','status','bukti_pembayaran')
   
    ->where('status','sedang di proses')
    ->orwhere('status','dikonfirmasi')
    ->selectRaw('SUM(total_bayar) as total_bayar')
    ->groupBy('kode_pemesanan', 'jenis_transaksi', 'status','bukti_pembayaran')
    ->get();

    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
       
        ->where('pemesanans.status','sedang di proses')
        ->orwhere('pemesanans.status','dikonfirmasi')
        ->get();

    return view('pemesanan.indexProses', compact('pemesanan', 'kode_pemesanan'));
}
public function indexKirim()
{
    $kode_pemesanan = Pemesanan::select('kode_pemesanan', 'jenis_transaksi','status','bukti_pembayaran')
   
    ->where('status','sedang di proses')
    ->orwhere('status','sedang di kirim')
    ->selectRaw('SUM(total_bayar) as total_bayar')
    ->groupBy('kode_pemesanan', 'jenis_transaksi', 'status','bukti_pembayaran')
    ->get();

    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
       
        ->where('status','sedang di proses')
        ->orwhere('status','sedang di kirim')
        ->get();

    return view('pemesanan.indexKirim', compact('pemesanan', 'kode_pemesanan'));
}
public function indexPengembalian()
{
  

    $kode_pemesanan = Pemesanan::select('kode_pemesanan', 'status')
 
    ->where('status','disewakan')
    ->orwhere('status','dikembalikan')
    ->selectRaw('SUM(total_bayar) as total_bayar')
    ->groupBy('kode_pemesanan', 'status')
    ->get();

    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
        ->where('pemesanans.status','disewakan')
        ->orwhere('pemesanans.status','dikembalikan')
        ->get();

    return view('pemesanan.indexPengembalian', compact('pemesanan', 'kode_pemesanan'));
}

public function confirm($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'dikonfirmasi',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}
public function proses($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'sedang di proses',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil diproses.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}
public function kirim($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'sedang di kirim',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikirim.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}
public function terima($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'pesanan di terima',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil diterima.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}

public function sewakan($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'disewakan',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}
public function selesai($kode_pemesanan)
{
    // Lakukan logika untuk mengonfirmasi pemesanan dengan kode_pemesanan tertentu
    // Misalnya, update status pemesanan menjadi "dikonfirmasi"

    // Contoh implementasi:
    $pemesanan = Pemesanan::where('kode_pemesanan', $kode_pemesanan)->get();
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    if ($pemesanan) {
        DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => 'selesai',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dikonfirmasi.');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}

public function printpengembalian($kode_pemesanan)
{
    // Lakukan logika untuk mendapatkan data yang diperlukan untuk cetak PDF
    $kode_pemesanan_data = Pemesanan::select('pemesanans.kode_pemesanan', 'pemesanans.status', 'pemesanans.tanggal_kembali', 'pemesanans.tanggal_selesai', 'users.name as user_name')
    ->join('users', 'pemesanans.users_id', '=', 'users.id')
    ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
    ->selectRaw('SUM(pemesanans.denda) as total_denda')
    ->groupBy('pemesanans.kode_pemesanan', 'pemesanans.status', 'pemesanans.tanggal_kembali', 'pemesanans.tanggal_selesai', 'users.name')
    ->get();


    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
        ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
        ->get();
    if ($kode_pemesanan_data) {
        // Load tampilan blade sebagai konten PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pemesanan.pengembalianpdf', compact('pemesanan', 'kode_pemesanan_data'))->render());

        // Atur opsi dan konfigurasi Dompdf jika diperlukan
        $pdf->setPaper('A4', 'portrait');

        // Render PDF ke output
        $pdf->render();

        // Berikan response dengan header PDF untuk mengunduh file
        return $pdf->stream('pengembalian-' . $kode_pemesanan . '.pdf');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}

public function printpenyewaan($kode_pemesanan)
{
    // Lakukan logika untuk mendapatkan data yang diperlukan untuk cetak PDF
    $kode_pemesanan_data = Pemesanan::select('pemesanans.kode_pemesanan', 'pemesanans.status', 'pemesanans.tanggal_mulai', 'pemesanans.tanggal_selesai', 'users.name as user_name')
    ->join('users', 'pemesanans.users_id', '=', 'users.id')
    ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
    ->selectRaw('SUM(pemesanans.total_bayar) as total_bayar')
    ->groupBy('pemesanans.kode_pemesanan', 'pemesanans.status', 'pemesanans.tanggal_mulai', 'pemesanans.tanggal_selesai', 'users.name')
    ->get();


    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.*', 'pemesanans.*')
        ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
        ->get();
    if ($kode_pemesanan_data) {
        // Load tampilan blade sebagai konten PDF
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pemesanan.penyewaanpdf', compact('pemesanan', 'kode_pemesanan_data'))->render());

        // Atur opsi dan konfigurasi Dompdf jika diperlukan
        $pdf->setPaper('A4', 'portrait');

        // Render PDF ke output
        $pdf->render();

        // Berikan response dengan header PDF untuk mengunduh file
        return $pdf->stream('pemesanan-' . $kode_pemesanan . '.pdf');
    }

    return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
}


    public function create()
    {
        // Tampilkan form untuk membuat pemesanan baru
        return view('pemesanans.create');
    }

    
    public function store(Request $request)
{
    $user_id = auth()->user()->id;

    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.nama as nama_barang', 'barangs.harga_sewa as harga_sewa', 'pemesanans.*')
        ->where('pemesanans.jenis_transaksi', 'sewa')
        ->where('pemesanans.users_id', $user_id)
        ->where('pemesanans.status', 'keranjang')
        ->get();

  

    $kode_pemesanan = Str::upper(Str::random(5));
    $status = 'pesan';
    $total_bayar = $request->total_bayar;
    $tanggal_mulai = $request->tanggal_mulai;
    $tanggal_selesai = $request->tanggal_selesai;
    $alamat = $request->alamat;

 
    $pemesananIds = $pemesanan->pluck('id')->toArray();
    $image_data = null;
    
    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');

        // Menggunakan package intervention/image untuk memproses bukti_pembayaran
        $image = Image::make($file);

        // Mengompres bukti_pembayaran dengan kualitas 70%
        $image->encode('jpg', 70);

        // Mengambil data base64 dari bukti_pembayaran yang sudah dikompres
        $image_data = base64_encode($image->stream());

        // Jika ukuran file lebih dari 1 MB, return error
        if (strlen($image_data) > 1048576) {
            return redirect()->back()->withErrors(['bukti_pembayaran' => 'Ukuran file harus kurang dari 1 MB']);
        }
    }

    DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'kode_pemesanan' => $kode_pemesanan,
            'status' => $status,
            'total_bayar' => $total_bayar,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'bukti_pembayaran' => $image_data,
            'alamat' => $alamat,
        ]);

    return redirect()->route('pemesanan.indexUser')->with('success', 'Pemesanan berhasil diperbarui.');
}

    public function tanggal(Request $request){
        $user_id = auth()->user()->id;
    
        $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
            ->select('barangs.nama as nama_barang','barangs.harga_sewa as harga_sewa', 'pemesanans.*')
            ->where('pemesanans.jenis_transaksi','sewa')
            ->where('pemesanans.users_id', $user_id)
            ->where('pemesanans.status', 'keranjang')
            ->get();

            $validatedData = $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
            ]);

            $tanggal_mulai = $request->tanggal_mulai;
            $tanggal_selesai = $request->tanggal_selesai;
        
            foreach ($pemesanan as $item) {
                $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
                $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        
                if ($tanggal_selesai && $tanggal_mulai) {
                    $selisih_hari = $tanggal_selesai->diffInDays($tanggal_mulai);
                    $total_bayar += $selisih_hari * ($item->harga_sewa * $item->jumlah_pesanan);
                }
            }
           
        
    
            return view('pemesanan.create', [
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'total_bayar' => $total_bayar,
            ]);

    }
    
    
    
    

    public function show($kode_pemesanan)
{
    $pemesanan = Pemesanan::select(
        'pemesanans.kode_pemesanan',
        'pemesanans.status',
        'pemesanans.alamat',
        'pemesanans.tanggal_mulai',
        'pemesanans.tanggal_selesai',
        'pemesanans.jumlah_pesanan',
        'pemesanans.total_bayar',
        'pemesanans.denda',
        'pemesanans.bukti_pembayaran',
        'pemesanans.tanggal_kembali',
        'pemesanans.jenis_transaksi',
        'users.name as user_name',
        DB::raw('SUM(pemesanans.total_bayar) as total_bayar'),
        DB::raw('SUM(pemesanans.denda) as total_denda')
    )
        ->join('users', 'pemesanans.users_id', '=', 'users.id')
        ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
        ->groupBy(
            'pemesanans.kode_pemesanan',
            'pemesanans.status',
            'pemesanans.alamat',
            'pemesanans.tanggal_mulai',
            'pemesanans.tanggal_selesai',
            'pemesanans.jumlah_pesanan',
            'pemesanans.total_bayar',
            'pemesanans.denda',
            'pemesanans.bukti_pembayaran',
            'pemesanans.tanggal_kembali',
            'pemesanans.jenis_transaksi',
            'users.name'
        )
        ->first();

    if (!$pemesanan) {
        return response()->json(['message' => 'Pemesanan tidak ditemukan.'], 404);
    }

    $pemesananDetails = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
        ->select('barangs.*', 'pemesanans.*')
        ->get();

    return response()->json(['pemesanan' => $pemesanan, 'pemesanan_details' => $pemesananDetails]);
}

    
    public function edit($kode_pemesanan)
    {
        $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
            ->select('pemesanans.*');
    
        if ($pemesanan->first()->jenis_transaksi == 'sewa') {
            $pemesanan->select(DB::raw('barangs.harga_sewa * pemesanans.jumlah_pesanan AS total_harga'));
        } else {
            $pemesanan->select(DB::raw('barangs.harga_jual * pemesanans.jumlah_pesanan AS total_harga'));
        }
    
        $pemesanan = $pemesanan->where('pemesanans.kode_pemesanan', $kode_pemesanan)
            ->first();
    
        if (!$pemesanan) {
            return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
        }
    
        // Tampilkan form untuk mengedit pemesanan dengan id tertentu
        return view('pemesanan.edit', compact('pemesanan'));
    }
    
    
    public function pengembalian($id)
{
    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('pemesanans.*', DB::raw('barangs.harga_sewa * pemesanans.jumlah_pesanan AS total_harga'))
        ->where('pemesanans.kode_pemesanan', $id)
        ->first();
    if (!$pemesanan) {
        return redirect()->back()->with('error', 'Pemesanan tidak ditemukan.');
    }

    // Tampilkan form untuk mengedit pemesanan dengan id tertentu
    return view('pemesanan.pengembalian', compact('pemesanan'));
}


public function update(Request $request, $kode_pemesanan)
{
    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.nama as nama_barang', 'barangs.harga_sewa as harga_sewa', 'pemesanans.*')
        ->where('kode_pemesanan', $kode_pemesanan)
        ->where('pemesanans.status', 'disewakan')
        ->get();
       
    $validatedData = $request->validate([
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'alamat' => 'required|string', // Aturan validasi untuk field alamat
    ]);

    $total_denda = 0;

    foreach ($pemesanan as $item) {
        $tanggal_kembali = Carbon::parse($request->tanggal_kembali);
        $tanggal_selesai = Carbon::parse($item->tanggal_selesai);

        if ($tanggal_selesai && $tanggal_kembali) {
            $selisih_hari = $tanggal_kembali->diffInDays($tanggal_selesai);
            $total_denda += $selisih_hari * ($item->harga_sewa * $item->jumlah_pesanan);
        }
    }

    // Update data pemesanan menggunakan Eloquent
    foreach ($pemesanan as $item) {
        $item->update([
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'denda' => $total_denda,
            'tanggal_kembali' => $validatedData['tanggal_kembali'],
            'alamat' => $validatedData['alamat'], // Simpan data alamat dari form
        ]);
    }

    // Redirect ke halaman detail pemesanan dengan pesan sukses
    return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui.');
}

    public function updatePengembalian(Request $request, $kode_pemesanan)
{
    $pemesanan = Pemesanan::join('barangs', 'pemesanans.barang_id', '=', 'barangs.id')
        ->select('barangs.nama as nama_barang', 'barangs.harga_sewa as harga_sewa', 'pemesanans.*')
        ->where('kode_pemesanan', $kode_pemesanan)
        ->where('pemesanans.status', 'disewakan')
        ->get();
       

    $validatedData = $request->validate([
        'tanggal_kembali' => 'required|date',
    ]);

    $status = 'dikembalikan';
    $total_denda = 0;


    foreach ($pemesanan as $item) {
        $tanggal_kembali = Carbon::parse($request->tanggal_kembali);
        $tanggal_selesai = Carbon::parse($item->tanggal_selesai);

        if ($tanggal_selesai && $tanggal_kembali) {
            $selisih_hari = $tanggal_kembali->diffInDays($tanggal_selesai);
            $total_denda += $selisih_hari * ($item->harga_sewa * $item->jumlah_pesanan);
        }
    }

    $pemesananIds = $pemesanan->pluck('id')->toArray();

    DB::table('pemesanans')
        ->whereIn('id', $pemesananIds)
        ->update([
            'status' => $status,
            'denda' => $total_denda,
            'tanggal_kembali' => $validatedData['tanggal_kembali'],
        ]);

    return redirect()->route('pemesanan.indexPengembalian')->with('success', 'Pemesanan berhasil diperbarui.');
}


    public function destroy($kode_pemesanan)
    {
        // Hapus pemesanan berdasarkan kode_pemesanan
        Pemesanan::where('kode_pemesanan', $kode_pemesanan)->delete();
    
        // Redirect ke halaman index pemesanan dengan pesan sukses
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
    
    public function batal($kode_pemesanan)
    {
        // Hapus pemesanan berdasarkan kode_pemesanan
        Pemesanan::where('kode_pemesanan', $kode_pemesanan)->delete();
    
        // Redirect ke halaman index pemesanan dengan pesan sukses
        return redirect()->route('pemesanan.indexUser')->with('success', 'Pemesanan berhasil dihapus.');
    }
    
  
    
}
