@extends('components/Departemen/template')
@section('section')
    <section class="section">
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
                                    <th scope="col" colspan="{{ count($tahun_shown) * 2 + 1 }}" class="h4">Angkatan
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    @foreach ($tahun_shown as $tahun)
                                        <th scope="col" colspan="2">{{ $tahun }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Status Skripsi</th>
                                    @foreach ($tahun_shown as $tahun)
                                        <th scope="col">Belum</th>
                                        <th scope="col">Sudah</th>
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

                                            <!-- Modal Belum Skripsi -->
                                            <div class="modal fade" id="belumSkripsi{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa yang Belum Lulus skripsi Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($skripsi[$tahun]['belum'])
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
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#sudahSkripsi{{ $tahun }}">
                                                {{ sizeof($skripsi[$tahun]['sudah']) }}
                                            </a>

                                            <!-- Modal Sudah Skripsi -->
                                            <div class="modal fade" id="sudahSkripsi{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Sudah Lulus skripsi Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($skripsi[$tahun]['sudah'])
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
                            <th>ID</th>
                            <th>Dosen Wali</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($skripsii as $skrip)
                            <tr>
                                <td>{{ $skrip->mahasiswa->nama }}</td>
                                <td>{{ $skrip->mahasiswa->nim }}</td>
                                <td>{{ $skrip->mahasiswa->doswal }}</td>
                                <td>{{ $skrip->mahasiswa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $skrip->mahasiswa->user_id }}"
                                        method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('dept.studi', $skrip->mahasiswa->user_id) }}">Detil</a>
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
