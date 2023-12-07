@extends('components/dosen_wali/sidebar')
@section('section')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                        <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dosenWali/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">KHS</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List KHS</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Semester</th>
                                    <th>Jumlah SKS</th>
                                    <th>SKS Kumuluatif</th>
                                    <th>IP Semester</th>
                                    <th>IPK</th>
                                    <th>Scan KHS</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khs as $kh)
                                    <tr>
                                        <td>{{ $kh->mahasiswa->nim }}</td>
                                        <td>{{ $kh->semester_aktif }}</td>
                                        <td>{{ $kh->jumlah_sks }}</td>
                                        <td>{{ $kh->sks_kumulatif }}</td>
                                        <td>{{ $kh->ip }}</td>
                                        <td>{{ $kh->ipk }}</td>
                                        <td><a href="{{ route('khs.download', ['id' => $kh->id]) }}">Lihat</a></td>
                                        <td>{{ $kh->status ? 'Sudah disetujui' : 'Belum disetujui' }}</td>
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
