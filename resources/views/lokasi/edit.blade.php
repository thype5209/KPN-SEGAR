@extends('layouts.master')
@section('content')
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
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Lokasi</h5>

                            <!-- validation Form Elements -->

                            <form action="{{route('lokasi-update', ['id'=> $lokasi->id])}}" method="POST"
                                enctype="multipart/form-data" class=" needs-validation" novalidate>
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row mb-3">
                                    {{-- <label for="validationCustom01" class="col-sm-2 col-form-label">Nama Jenis Aset</label> --}}
                                    <div class="col-sm-10">
                                        <input name="lantai" value="{{ $lokasi->lantai }}" type="text"
                                            id="lantai " class="form-control" required>
                                        <input name="ruangan" value="{{ $lokasi->ruangan }}" type="text"
                                            id="ruangan " class="form-control" required>
                                        <div class="invalid-feedback">
                                            Harus di isi
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit"
                                            style=" float :right; background-color: #012970; color:#FFFFFF" type="submit"
                                            class="btn btn">Update</button>
                                        <a href={{ route('lokasi') }} type="button" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->



                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
