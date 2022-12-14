@extends('layouts.master')

@section('title', 'potongan-nav')
@section('voucherli', 'active')
@section('potongan-nav', 'show')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('logo/logo.jpg') }}" alt="">
                        <span class="d-none d-lg-block">Sistem Inventaris</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Tambah Voucher</h5>
                        </div>

                        <form class="row g-3 needs-validation" novalidate method="POST"
                            action="{{ route('Voucher.update', ['id'=> $voucher->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="yourName" class="form-label">kode</label>
                                <input id="name" type="text"
                                    class="form-control @error('kode') is-invalid @enderror" name="kode"
                                    value="{{ $voucher->kode }}" required autocomplete="kode" autofocus>
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourName" class="form-label">Jenis voucher</label>
                                <select name="jenis_voucher" id="jenis_voucher" class="form-select">
                                    <option value="1" {{ $voucher->jenis_voucher == 1 ? 'selected' :'' }} >voucher Pengguna Barus</option>
                                    <option value="2" {{ $voucher->jenis_voucher == 2 ? 'selected' :'' }}>voucher Pembelian Produk</option>
                                    <option value="3" {{ $voucher->jenis_voucher == 3 ? 'selected' :'' }}>voucher Umum</option>

                                </select>
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourName" class="form-label">potongan</label>
                                <input id="name" type="text"
                                    class="form-control @error('potongan') is-invalid @enderror" name="potongan"
                                    value="{{ $voucher->potongan }}" required autocomplete="potongan" autofocus>
                                @error('potongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourName" class="form-label">Tanggal Mulai</label>
                                <input id="name" type="date"
                                    class="form-control @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai"
                                    value="{{ $voucher->tgl_mulai }}" required autocomplete="tgl_mulai" autofocus>
                                @error('tgl_mulai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourName" class="form-label">Tanggal Akhir</label>
                                <input id="name" type="date"
                                    class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir"
                                    value="{{ $voucher->tgl_akhir }}" required autocomplete="tgl_akhir" autofocus>
                                @error('tgl_akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn w-100" style="background-color: #494cf6; color:#FFFFFF"
                                    type="submit">submit</button>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#form-barang_id").hide()
        $("#barang_id").prop("disabled", true);

        $("#jenis_voucher").change(function() {
            if ($(this).val() == 2) {
                $("#form-barang_id").show()
                $("#barang_id").prop("disabled", false);
            }else{
                $("#form-barang_id").toggleClass('hidden')
                $("#barang_id").prop("disabled", true);

            }
        })
    </script>
@endsection
