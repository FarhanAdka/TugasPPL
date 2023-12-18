@extends('components/departemen/template')
@section('section')
    <div class="col-6 col-lg-12">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="row text-center">
                    <h6 class="text-muted font-semibold">
                        - Progres PKL Seluruh Mahasiswa Aktif -
                    </h6>
                    <h6 class="text-muted">
                        Total Mahasiswa Lulus
                    </h6>
                    <h4>
                        {{ $lulus_pkl }}
                    </h4>
                </div>
            </div>


            <div class="card-body ">
                <div class="table-responsive mx-4 display: inline-block;">
                    <table class="table table-bordered" style="text-align: center; ">

                        <thead>
                            <tr>
                                <th scope="col" colspan="100%" class="h4">Angkatan</th>
                            </tr>
                            <tr>
                                <th> Tahun </th>
                                @foreach ($tahun_shown as $tahun)
                                    <th scope="col" colspan="2">{{ $tahun }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Status PKL</th>
                                @foreach ($tahun_shown as $tahun)
                                    <th scope="col" colspan="1">Belum</th>
                                    <th scope="col" colspan="1">Sudah</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                @foreach ($tahun_shown as $tahun)
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#belumPKL{{ $tahun }}">
                                            {{ sizeof($pkl[$tahun]['belum']) }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#sudahPKL{{ $tahun }}">
                                            {{ sizeof($pkl[$tahun]['sudah']) }}
                                        </a>
                                    </td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer mx-4 my-4">
                    <button type="button" class="btn btn-primary">Cetak</button>
                </div>
            </div>
            <script>
                function cektak() {
                    // Logika untuk mencetak tabel
                    // Misalnya, Anda dapat menggunakan window.print()

                }
            </script>
        </div>
    </div>





    <div class="col-6 col-lg-12">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="row text-center">
                    <h6 class="text-muted font-semibold">
                        - Progres Skripsi Seluruh Mahasiswa Aktif -
                    </h6>
                    <h6 class="text-muted">
                        Total Mahasiswa Lulus
                    </h6>
                    <h4>
                        {{ $lulus_skripsi }}
                    </h4>
                </div>
            </div>



            <div class="card-body ">
                <div class="table-responsive mx-4 display: inline-block;">
                    <table class="table table-bordered" style="text-align: center; ">

                        <thead>
                            <tr>
                                <th scope="col" colspan="100%" class="h4">Angkatan</th>
                            </tr>
                            <tr>
                                <th> Tahun </th>
                                @foreach ($tahun_shown as $tahun)
                                    <th scope="col" colspan="2">{{ $tahun }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Status Skripsi</th>
                                @foreach ($tahun_shown as $tahun)
                                    <th scope="col" colspan="1">Belum</th>
                                    <th scope="col" colspan="1">Sudah</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                @foreach ($tahun_shown as $tahun)
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#belumSkripsi{{ $tahun }}">
                                            {{ sizeof($skripsi[$tahun]['belum']) }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#sudahSkripsi{{ $tahun }}">
                                            {{ sizeof($skripsi[$tahun]['sudah']) }}
                                        </a>
                                    </td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer mx-4 my-4">
                    <button type="button" class="btn btn-primary">Cetak</button>
                </div>
            </div>
            <script>
                function cektak() {
                    // Logika untuk mencetak tabel
                    // Misalnya, Anda dapat menggunakan window.print()
                }
            </script>
        </div>
    </div>
@endsection
