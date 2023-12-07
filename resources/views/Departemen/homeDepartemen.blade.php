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
                <div class="table-responsive mx-4">
                    <table class="table table-bordered" style="text-align: center;">

                        <thead>
                            <tr>
                                <th scope="col" colspan="100%">Angkatan</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2">2016</th>
                                <th scope="col" colspan="2">2017</th>
                                <th scope="col" colspan="2">2018</th>
                                <th scope="col" colspan="2">2019</th>
                                <th scope="col" colspan="2">2020</th>
                                <th scope="col" colspan="2">2021</th>
                                <th scope="col" colspan="2">2022</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                                <th scope="col" colspan="1">Sudah</th>
                                <th scope="col" colspan="1">Belum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer mx-4">
                    <button type="button" class="btn btn-primary">Cetak</button>
                </div>
            </div>
            <script>
                function cektak() {
                    // Logika untuk mencetak tabel
                    // Misalnya, Anda dapat menggunakan window.print()
                }
            </script>






            <div class="row mt-1 mx-4">
                @foreach ($tahun_shown as $tahun)
                    <div class="col col-lg-2">
                        <div class="card background-color:rgba(255, 255, 255, 0.5) ">
                            <div class="card-body px-4 py-4-5">
                                <h6 class="font-extrabold text-center">{{ $tahun }}</h6>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted font-semibold mb-0 text-center">
                                            Belum
                                        </h6>

                                        <h6 class="text-muted font-semibold mb-0 text-center">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#belumPKL{{ $tahun }}">
                                                {{ sizeof($pkl[$tahun]['belum']) }}
                                            </a>
                                        </h6>
                                        <!-- Modal -->
                                        <div class="modal fade" id="belumPKL{{ $tahun }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Daftar Mahasiswa
                                                            yang Belum Lulus PKL Angkatan
                                                            {{ $tahun }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($pkl[$tahun]['belum'])
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">NIM</th>
                                                                        <th scope="col">Nama</th>
                                                                        <th scope="col">Angkatan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($pkl[$tahun]['belum'] as $mahasiswa)
                                                                        <tr>
                                                                            <th scope="row">
                                                                                {{ $loop->iteration }}
                                                                            </th>
                                                                            <td>
                                                                                {{ $mahasiswa->nim }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $mahasiswa->nama }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $mahasiswa->angkatan }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <div class="text-muted font-semibold mb-0 text-center">
                                                                Belum ada data mahasiswa
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-primary">Cetak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div>
                                        <h6 class="text-muted font-semibold mb-0 text-center">
                                            Sudah
                                        </h6>
                                        <h6 class="text-muted font-semibold mb-0 text-center">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#sudahPKL{{ $tahun }}">
                                                {{ sizeof($pkl[$tahun]['sudah']) }}
                                            </a>
                                        </h6>
                                        <!-- Modal -->
                                        <div class="modal fade" id="sudahPKL{{ $tahun }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Daftar Mahasiswa
                                                            yang Sudah Lulus PKL Angkatan
                                                            {{ $tahun }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($pkl[$tahun]['sudah'])
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">NIM</th>
                                                                        <th scope="col">Nama</th>
                                                                        <th scope="col">Angkatan</th>
                                                                        <th scope="col">Nilai</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($pkl[$tahun]['sudah'] as $mahasiswa)
                                                                        <tr>
                                                                            <th scope="row">
                                                                                {{ $loop->iteration }}
                                                                            </th>
                                                                            <td>
                                                                                {{ $mahasiswa->nim }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $mahasiswa->nama }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $mahasiswa->angkatan }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $mahasiswa->nilai }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <div class="text-muted font-semibold mb-0 text-center">
                                                                Belum ada data mahasiswa
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="button" class="btn btn-primary">Cetak</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Tambahkan card lain di sini dengan struktur yang sama -->
            </div>
        </div>
    </div>



































































    <section class="row">
        <div class="col-6 col-lg-12">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="row text-center">
                        <h6 class="text-muted font-semibold">- Progres PKL Seluruh Mahasiswa Aktif
                            -</h6>
                        <h6 class="text-muted">Total Mahasiswa Lulus
                        </h6>
                        <h4>
                            {{ $lulus_pkl }}
                        </h4>
                    </div>
                </div>

                <div class="row mt-1 mx-4">
                    @foreach ($tahun_shown as $tahun)
                        <div class="col col-lg-2">
                            <div class="card background-color:rgba(255, 255, 255, 0.5) ">

                                <div class="card-body px-4 py-4-5">
                                    <h6 class="font-extrabold text-center">{{ $tahun }}</h6>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                Belum
                                            </h6>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#belumPKL{{ $tahun }}">
                                                    {{ sizeof($pkl[$tahun]['belum']) }}
                                                </a>
                                            </h6>
                                            <!-- Modal -->
                                            <div class="modal fade" id="belumPKL{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Daftar
                                                                Mahasiswa
                                                                yang Belum Lulus PKL Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($pkl[$tahun]['belum'])
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">NIM</th>
                                                                            <th scope="col">Nama
                                                                            </th>
                                                                            <th scope="col">Angkatan
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($pkl[$tahun]['belum'] as $mahasiswa)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $mahasiswa->nim }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nama }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->angkatan }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-muted font-semibold mb-0 text-center">
                                                                    Belum ada data mahasiswa
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-primary">Cetak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                Sudah
                                            </h6>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#sudahPKL{{ $tahun }}">
                                                    {{ sizeof($pkl[$tahun]['sudah']) }}
                                                </a>
                                            </h6>
                                            <!-- Modal -->
                                            <div class="modal fade" id="sudahPKL{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Daftar
                                                                Mahasiswa
                                                                yang Sudah Lulus PKL Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($pkl[$tahun]['sudah'])
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">NIM</th>
                                                                            <th scope="col">Nama
                                                                            </th>
                                                                            <th scope="col">Angkatan
                                                                            </th>
                                                                            <th scope="col">Nilai
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($pkl[$tahun]['sudah'] as $mahasiswa)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $mahasiswa->nim }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nama }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->angkatan }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nilai }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-muted font-semibold mb-0 text-center">
                                                                    Belum ada data mahasiswa
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-primary">Cetak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Tambahkan card lain di sini dengan struktur yang sama -->
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-12">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="row text-center">
                        <h6 class="text-muted font-semibold">- Progres Skripsi Seluruh Mahasiswa
                            Aktif -</h6>
                        <h6 class="text-muted">Total Mahasiswa Lulus
                        </h6>
                        <h4>
                            {{ $lulus_skripsi }}
                        </h4>
                    </div>
                </div>
                <div class="row mt-1 mx-4">
                    @foreach ($tahun_shown as $tahun)
                        <div class="col col-lg-2">
                            <div class="card background-color:rgba(255, 255, 255, 0.5) ">

                                <div class="card-body px-4 py-4-5">
                                    <h6 class="font-extrabold text-center">{{ $tahun }}</h6>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                Belum
                                            </h6>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#belumSkripsi{{ $tahun }}">
                                                    {{ sizeof($skripsi[$tahun]['belum']) }}
                                                </a>
                                            </h6>
                                            <!-- Modal -->
                                            <div class="modal fade" id="belumSkripsi{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Daftar
                                                                Mahasiswa yang Belum Lulus Skripsi
                                                                Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($skripsi[$tahun]['belum'])
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">NIM</th>
                                                                            <th scope="col">Nama
                                                                            </th>
                                                                            <th scope="col">Angkatan
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($skripsi[$tahun]['belum'] as $mahasiswa)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $mahasiswa->nim }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nama }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->angkatan }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-muted font-semibold mb-0 text-center">
                                                                    Belum ada data mahasiswa
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-primary">Cetak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                Sudah
                                            </h6>
                                            <h6 class="text-muted font-semibold mb-0 text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#sudahSkripsi{{ $tahun }}">
                                                    {{ sizeof($skripsi[$tahun]['sudah']) }}
                                                </a>
                                            </h6>
                                            <!-- Modal -->
                                            <div class="modal fade" id="sudahSkripsi{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Daftar
                                                                Mahasiswa yang Sudah Lulus Skripsi
                                                                Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($skripsi[$tahun]['sudah'])
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">NIM</th>
                                                                            <th scope="col">Nama
                                                                            </th>
                                                                            <th scope="col">Angkatan
                                                                            </th>
                                                                            <th scope="col">Nilai
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($skripsi[$tahun]['sudah'] as $mahasiswa)
                                                                            <tr>
                                                                                <th scope="row">
                                                                                    {{ $loop->iteration }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $mahasiswa->nim }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nama }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->angkatan }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $mahasiswa->nilai }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-muted font-semibold mb-0 text-center">
                                                                    Belum ada data mahasiswa
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" class="btn btn-primary">Cetak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Tambahkan card lain di sini dengan struktur yang sama -->
                </div>
            </div>
        </div>
    </section>
@endsection
