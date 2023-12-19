@extends('components/departemen/template')
@section('section')
    <section class="section">
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

                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#sudahPKL{{ $tahun }}">
                                                {{ sizeof($pkl[$tahun]['sudah']) }}
                                            </a>

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
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-primary">Cetak</button>
        </div>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ $Title }}
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Dosen Wali</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pkll as $pk)
                            <tr>
                                <td>{{ $pk->mahasiswa->nama }}</td>
                                <td>{{ $pk->mahasiswa->nim }}</td>
                                <td>{{ $pk->mahasiswa->doswal }}</td>
                                <td>{{ $pk->mahasiswa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $pk->id }}" method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('dept.studi', $pk->mahasiswa->user_id) }}">Detil</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
