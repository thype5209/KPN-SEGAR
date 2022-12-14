{{-- @section('title', 'barangkeluar')
@section('barangkeluar', 'active')
@section('charts-nav', 'show') --}}

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />
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


<div class="row">
    <div class="col-lg-12">

        <!-- Default Card -->
        <div class="card">
            <div class="card-body">
                <h3>
                    <center>SISTEM INFORMASI <BR> KPN SEGAR BAROMBONG
                </h3>
                SISTEM INFORMASI
                <hr style="width:max;height:2px;">
                <h4><b>
                        <center>LAPORAN DATA ASET PERLENGKAPAN</center>
                    </b></h4><br>



            </div>
        </div><!-- End Default Card -->


        <div class="card">
            <div class="card-body">



                <!-- Table with stripped rows -->
                <table border="1" cellspacing='' id="example" class="table-border display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Barang
                            </th>
                            <th scope="col">Kegunaan</th>
                            <th scope="col">Tgl Perolehan</th>
                            <th scope="col">Asal Perolehan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">kondisi</th>
                            <th scope="col">ket</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $nomor = 1;
                        ?>
                        @foreach ($data as $data)
                            @if ($data->jenis_asets_id == 4)
                                <tr>
                                    <th> {{ $nomor++ }}</th>
                                    <td style="text-align: center;"> {{ $data->kode }}</td>
                                    <td style="text-align: center;"> {{ $data->jenis_barangs->jenis_barang }} {{ $data->nama_barang }}</td>
                                    <td style="text-align: center;"> {{ $data->kegunaan }} </td>
                                    <td style="text-align: center;"> {{ $data->tanggal_perolehan }}
                                    <td style="text-align: center;"> {{ $data->asal_perolehans->nama_asalperolehan }} </td>

                                    <td style="text-align: center;"> {{ $data->jumlah }} {{ $data->satuans->nama_satuan }}</td>
                                    <td style="text-align: center;"> {{ $data->kondisi }}</td>
                                    <td style="text-align: center;"> {{ $data->ket }}</td>
                            @endif
                        @endforeach
                        </tr>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
