@extends('components/departemen/template')
@section('section')
    <section class="section">
        <div class="col-6 col-lg-12">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="card-body text-center">
                        <h6 class="text-muted font-semibold">- Seluruh Mahasiswa Departemen Informatika -</h6>
                        <h6 class="text-muted">Status Mahasiswa</h6>

                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted">Aktif</h6>
                                <h4>{{ $mhs_Aktif }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">Cuti</h6>
                                <h4>{{ $mhs_Cuti }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">Mangkir</h6>
                                <h4>{{ $mhs_Mangkir }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">DO</h6>
                                <h4>{{ $mhs_DO }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">UndurDiri</h6>
                                <h4>{{ $mhs_UndurDiri }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">Lulus</h6>
                                <h4>{{ $mhs_Lulus }}</h4>
                            </div>
                            <div class="col">
                                <h6 class="text-muted">MeninggalDunia</h6>
                                <h4>{{ $mhs_Meninggal }}</h4>
                            </div>
                        </div>
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
                                        <th scope="col" colspan="7">{{ $tahun }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Status Mhs</th>
                                    @foreach ($tahun_shown as $tahun)
                                        <th scope="col" colspan="1">Aktif</th>
                                        <th scope="col" colspan="1">Cuti</th>
                                        <th scope="col" colspan="1">Mangkir</th>
                                        <th scope="col" colspan="1">DO</th>
                                        <th scope="col" colspan="1">UndurDiri</th>
                                        <th scope="col" colspan="1">Lulus</th>
                                        <th scope="col" colspan="1">MeninggalDunia</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total</td>
                                    @foreach ($tahun_shown as $tahun)
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusAktif{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['Aktif']) }}
                                            </a>

                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusAktif{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status Aktif Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['Aktif'])
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
                                                                        @foreach ($status[$tahun]['Aktif'] as $mahasiswa)
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusCuti{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['Cuti']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusCuti{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status Cuti Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['Cuti'])
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
                                                                        @foreach ($status[$tahun]['Cuti'] as $mahasiswa)
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusCuti{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['Mangkir']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusMangkir{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status Mangkir Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['Mangkir'])
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
                                                                        @foreach ($status[$tahun]['Mangkir'] as $mahasiswa)
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusDO{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['DO']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusDO{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status DO Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['DO'])
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
                                                                        @foreach ($status[$tahun]['DO'] as $mahasiswa)
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusUndurDiri{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['UndurDiri']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusUndurDiri{{ $tahun }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status UndurDiri Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['UndurDiri'])
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
                                                                        @foreach ($status[$tahun]['UndurDiri'] as $mahasiswa)
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusLulus{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['Lulus']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusLulus{{ $tahun }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status Lulus Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['Lulus'])
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
                                                                        @foreach ($status[$tahun]['Lulus'] as $mahasiswa)
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#statusMeninggalDunia{{ $tahun }}">
                                                {{ sizeof($status[$tahun]['MeninggalDunia']) }}
                                            </a>
                                            {{-- Modal --}}
                                            <div class="modal fade" id="statusMeninggalDunia{{ $tahun }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Daftar Mahasiswa
                                                                yang Status MeninggalDunia Angkatan
                                                                {{ $tahun }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($status[$tahun]['MeninggalDunia'])
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
                                                                        @foreach ($status[$tahun]['MeninggalDunia'] as $mahasiswa)
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
                            <th>Status</th>
                            <th>Dosen Wali</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mahasiswaa as $mhs)
                            <tr>
                                <td>{{ $mhs->name }}</td>
                                <td>{{ $mhs->user_id }}</td>
                                <td>{{ $mhs->mahasiswaa->status }}</td>
                                <td>{{ $mhs->doswal }}</td>
                                <td>{{ $mhs->mahasiswaa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $mhs->id }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('dept.studi', $mhs->id) }}">Detil</a>
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
