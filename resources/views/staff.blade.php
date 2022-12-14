@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row align-items-top">
                <div class="col-lg-full">
                    <!-- Default Card -->
                    <div class="card">
                        <div class="card-body"><br>
                            <center> <img src="{{ asset('logo/logo.jpg') }}" class="card-img-bottom" style="width: 90px;" alt="...">
                                <center>
                                    <h5 class="card-title">SISTEM INFORMASI KPN “SEGAR” POLITEKNIK PELAYARAN BAROMBONG</h5>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card " style="background-color: #012970;">
                            <div class="card-body ">
                                <a href="{{ route('Pembelian.create') }}">
                                    <div class="card-title text-center">
                                        <span><i class="bi bi-file-earmark-break-fill text-danger"
                                                style="font-size: 50px"></i></span>
                                        <span class="text-light" style="font-size: 20px">Pembelian barang</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body" style="background-color: #012970;">
                                <a href="{{ route('Pembelian.riwayat') }}">
                                    <div class="card-title text-center">
                                        <span class=""><i class="bi bi-receipt-cutoff text-warning"
                                                style="font-size: 50px"></i></span>
                                        <span class="text-light" style="font-size: 20px">Riwayat</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
