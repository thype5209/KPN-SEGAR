@extends('layouts.master')
@section('content')

@section('title', 'peralatan')
@section('peralatan', 'active')
@section('forms-nav', 'show')

<main id="main" class="main">

    <div class="pagetitle">
        {{-- <h1>Data Jenis Aset</h1> --}}
        {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> --}}
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-body  overflow-scroll">
                        <h5 class="card-title">Data Aset Peralatan</h5>

                        <a href="/data-peralatan/form" type="button" class="btn btn-sm"
                            style="background-color:  #012970; color:#FFFFFF">Tambah</a>
                        <form action="{{ route('filter-data', ['data' => 'Peralatan']) }}">
                            <select name="filter" id="filter">
                                <option value="">Semua</option>
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id }}">{{ $item->lantai }}/{{ $item->ruangan }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm"
                                style="background-color:  #012970; color:#FFFFFF">Filter Lokasi</button>
                        </form>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama
                                        Tipe/ Spesifik</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Jumlah Satuan</th>
                                    <th scope="col">Sisa Barang</th>
                                    <th scope="col">Kondisi</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Riwayat</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $nomor = 1;
                                ?>
                                @foreach ($inputbarang as $data)
                                    @if ($data->jenis_asets_id == 3)
                                        <tr>
                                            <th> {{ $nomor++ }}</th>
                                            <td> {{ $data->kode }}</td>
                                            <td> {{ $data->jenis_barangs->jenis_barang }} {{ $data->nama_barang }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('fotobarang/' . $data->foto) }}"
                                                    style="width: 100px;" alt="...">
                                            </td>
                                            <td> {{ $data->jumlah }} {{ $data->satuans->nama_satuan }}</td>
                                            <td> {{ $data->jumlah }} {{ $data->satuans->nama_satuan }}</td>
                                            <td> {{ $data->kondisi }}</td>
                                            <td>

                                                <!-- Large Modal -->

                                                <button type="button" class="btn btn-sm"
                                                    style="background-color:  #012970; color:#FFFFFF"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modaldetail{{ $data->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>

                                                <div class="modal fade" id="modaldetail{{ $data->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Data Aset</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <!-- Card with an image on left -->


                                                                <div class="card mb-3">
                                                                    <div class="row g-0">
                                                                        <div class="col-md-4">
                                                                            <img src="{{ asset('fotobarang/' . $data->foto) }}"
                                                                                class="img-fluid rounded-start"
                                                                                alt="...">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body">
                                                                                {{-- <h5 class="card-title text-center">Detail Data Aset</h5> --}}


                                                                                <h5 class="card-title text-center">
                                                                                    {{ $data->jenis_barangs->jenis_barang }}
                                                                                    {{ $data->nama_barang }}</h5>

                                                                                <p class="card-text">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label ">
                                                                                        Kode </div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->kode }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Nama </div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->jenis_barangs->jenis_barang }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Tipe</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->nama_barang }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Jenis aset</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->jenis_asets->nama_jenisaset }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Kegunaan</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->kegunaan }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Tgl Perolehan</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        <?php echo date('d F Y', strtotime($data->tanggal_perolehan)); ?></div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Asal Perolehan</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->asal_perolehans->nama_asalperolehan }}
                                                                                    </div>
                                                                                </div>



                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Jumlah</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->jumlah }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Satuan</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->satuans->nama_satuan }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Kondisi</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->kondisi }}</div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-lg-5 col-md-4 label">
                                                                                        Ket</div>
                                                                                    <div class="col-lg-7 col-md-8">
                                                                                        {{ $data->ket }}</div>
                                                                                </div>

                                                                            </div>
                                                                        </div>



                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- End Card with an image on left -->

                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                    </div>
                </div><!-- End Large Modal-->

                <a href="/data-peralatan/edit/{{ $data->id }}" type="button" class="btn btn-sm"
                    style="background-color: #05b3c3; color:#FFFFFF"><i class="bi bi-pencil"></i></a>
                <a href="/data-peralatan/hapus/{{ $data->id }}" onclick="return confirm('Hapus Data?')"
                    type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash delete"></i></a>
                </td>
                <td>

                    <!-- Large Modal -->
                    <a href="{{route('detail-Barang-Mutasi', ['id'=> $data->id])}}" class="btn btn-sm" style="background-color:  #4e9764; color:#FFFFFF">
                        Mutasi
                     </a>
                    <button type="button" class="btn btn-sm" style="background-color:  #e6ad28; color:#FFFFFF"
                        data-bs-toggle="modal" data-bs-target="#modalpinjam{{ $data->id }}">
                        <i class="bi bi-info"></i>
                    </button>
                    @foreach ($pinjam as $item)
                        {{-- @if ($item->barangs_id == $data->id) --}}
                        <div class="modal fade" id="modalpinjam{{ $data->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Data Riwayat Pembelian</h5>

                                                <!-- Table with stripped rows -->
                                                <table class="table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Peminjaman</th>
                                                            <th scope="col">jenis peminjaman</th>
                                                            <th scope="col">Tanggal Pengajuan</th>
                                                            {{-- <th scope="col">Tanggal Peminjaman</th> --}}
                                                            <th scope="col">Tanggal Kembali</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $nomor = 1;
                                                        ?>
                                                        <tr>

                                                            <td>{{ $nomor++ }}</td>
                                                            <td>{{ $item->users->name }}</td>
                                                            <td>{{ $item->kode_peminjaman }}</td>
                                                            <td>{{ $item->tgl_pengajuan }}</td>
                                                            {{-- <td>{{ $item->tgl_pinjam }}</td> --}}
                                                            <td>{{ $item->tgl_kembali }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <!-- End Table with stripped rows -->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                    @endforeach
    </section>

</main><!-- End #main -->

</div>
<div class="modal-footer">
</div>
</div>
</div>
</div><!-- End Large Modal-->
@endif
@endforeach

</tr>
</td>

</tbody>
</table>
<!-- End Table with stripped rows -->

</div>
</div>

</div>
</div>
</section>
@endsection
