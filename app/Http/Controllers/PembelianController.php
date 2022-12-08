<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Pinjam;
use App\Models\Satuan;
use App\Models\Status;
use App\Models\TrxStatus;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Models\DataJenisAset;
use App\Models\DataAsalPerolehan;
use App\Notifications\NotifPinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $pinjam = Pinjam::whereNull('ket')
        ->where('jenis_peminjaman', '=', "Beli")
        ->get();
        $status = Status::all();
        $trxstatus = TrxStatus::all();
        return view('pembelian.index', [
            'title' => 'pengajuan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'status' => $status,
            'pinjam' => $pinjam,
            'akun' => $akun,
            'trxstatus' => $trxstatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $pinjam = Pinjam::whereNull('ket')
        ->whereNotNull('barangs_id')
        ->where('jenis_peminjaman', '=', 'Beli')
        ->where('users_id', Auth::user()->id)->get();
        $status = Status::all();
        $trxstatus = TrxStatus::all();
        return view('pembelian.form', [
            'title' => 'pengajuan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'status' => $status,
            'pinjam' => $pinjam,
            'akun' => $akun,
            'trxstatus' => $trxstatus,
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
        $book_id = 0;
        $data = Pinjam::max('kode_peminjaman');
        if ($data == null) {
            $book_id = 'BB-001';
        }
        // dd($data);
        $huruf = 'BB';
        $urutan = (int) substr($data, 3, 3);
        $urutan++;
        if ($urutan < 10) {
            $book_id = $huruf . '-00' . $urutan;
        } else {
            $book_id = $huruf . '-' . $urutan;
        }
        $b = Barang::where('id', $request->barangs_id)->first();
        if ($b->jumlah < $request->jumlah_pinjam) {
            return redirect()
                ->back()
                ->with('warning', 'Maaf jumlah barang yang anda pinjam melebihi dari sisa stok yang ada');
        } else {
            $pinjam = new Pinjam();
            $pinjam->kode_peminjaman = $book_id;
            $pinjam->barangs_id = $request->barangs_id;
            $pinjam->users_id = $request->users_id;
            $pinjam->nama_peminjam = $request->nama_peminjam;
            $pinjam->jenis_peminjaman = "Beli";
            $pinjam->tujuan = $request->tujuan;
            $pinjam->tgl_pengajuan = $request->tgl_pengajuan;
            // $pinjam->tgl_pinjam = $request->tgl_pengajuan;
            $pinjam->tgl_kembali = $request->tgl_kembali;
            $pinjam->jumlah_pinjam = $request->total;

            $pinjam->save();
            $trxstatus = new TrxStatus();
            $trxstatus->kode_peminjaman = $book_id;
            $trxstatus->users_id = $request->input('users_id');
            $trxstatus->pinjams_id = $pinjam->id;
            $trxstatus->status_id = 5;
            $trxstatus->save();
            // User
            $user = User::find($request->input('users_id'));

            // Barang
            $brg = Barang::where('id', $request->barangs_id)->first();
            // dd(intval($brg->jumlah - $request->jumlah_pinjam));
            $brg->update([
                'jumlah' => intval($brg->jumlah - $request->jumlah_pinjam),
            ]);
            Notification::send($pinjam, new NotifPinjam([
                'nama' => $user->name,
                'barang' => $brg->kode . ',' . $brg->nama_barang . ', ',
                'jumlah' => $request->jumlah_pinjam,
            ]));
            return redirect()
                ->route('Pembelian.index')
                ->with('success', 'Pengajuan Peminjaman Sukses');
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
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $pinjam = Pinjam::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $jenisbarang = JenisBarang::all();
        $inputbarang = Barang::find($id);
        return view('pembelian.edit', [
            'title' => ' ',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'jenisbarang' => $jenisbarang,
            'pinjam' => $pinjam,
        ]);
    }
    public function detail($id)
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $pinjam = Pinjam::whereNull('ket')->whereNotNull('barangs_id')->where('users_id', Auth::user()->id)->get();
        $status = Status::all();
        $trxstatus = TrxStatus::all();
        return view('pembelian.edit', [
            'title' => 'pengajuan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'status' => $status,
            'pinjam' => $pinjam,
            'akun' => $akun,
            'trxstatus' => $trxstatus,
        ]);
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

    public function riwayat()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $pinjam = Pinjam::whereNotNull('ket')
            ->where('jenis_peminjaman', '=', 'Barang')
            ->orderBy('id', 'desc')
            ->latest()
            ->get();
        $status = Status::all();
        $trxstatus = TrxStatus::all();
        return view('pembelian.riwayatpinjam', [
            'title' => 'pengajuan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'status' => $status,
            'pinjam' => $pinjam,
            'akun' => $akun,
            'trxstatus' => $trxstatus,
        ]);
    }
    public function cekdata()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        abort_if(Auth::user()->roles->id == 1, 401);
        return view('pembelian.cekdata', [
            'title' => 'peralatan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
        ]);
    }

    public function dataPembelian()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $pinjam = Pinjam::whereNotNull('ket')
            ->where('jenis_peminjaman', '=', 'Beli')
            ->get();
        $status = Status::all();
        $trxstatus = TrxStatus::all();
        return view('pembelian.data_pembelian', [
            'title' => 'pengajuan',
            'jenisbarang' => $jenisbarang,
            'jenisaset' => $datajenisaset,
            'dataasalperolehan' => $dataasalperolehan,
            'datasatuan' => $datasatuan,
            'inputbarang' => $inputbarang,
            'status' => $status,
            'pinjam' => $pinjam,
            'akun' => $akun,
            'trxstatus' => $trxstatus,
        ]);
    }
}
