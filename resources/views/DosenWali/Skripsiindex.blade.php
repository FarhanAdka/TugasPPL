@extends('components/dosen_wali/sidebar')
@section('section')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                        {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dosenWali/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Skripsi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Skripsi</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Tanggal Lulus</th>
                                    <th>Nilai</th>
                                    <th>Scan Skripsi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skripsi as $skrip)
                                    <tr>
                                        <td>{{ $skrip->mahasiswa->nim }}</td>
                                        <td>{{ $skrip->tanggal_lulus }}</td>

                                        <td>{{ $skrip->nilai }}</td>
                                        <td><a href="{{ route('doswal.downloadskripsi', ['id' => $skrip->id])  }}">Lihat</a></td>
                                        <td>{{ $skrip->status ? 'Sudah disetujui' : 'Belum disetujui' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection