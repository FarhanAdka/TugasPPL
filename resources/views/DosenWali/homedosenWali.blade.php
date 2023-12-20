@extends('components/dosen_wali/sidebar')
@section('section')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                        {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page. --}}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/user/dosenWali/profile">Profil</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                {{-- <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <a href="/user/dosenWali/profile">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                        <div class="stats-icon bg-secondary blue mb-2 text-center w-100">
                                            <i class="bi bi-person-circle mx-3 mb-4 "></i>
                                            <h6 class="text-white font-semibold mx-0 mb-0"> Profil </h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}



                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <a href="/user/dosenWali/verifikasiIRS">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-earmark-text mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Verifikasi IRS </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/dosenWali/IRS">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-earmark-text-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> List IRS </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <a href="/user/dosenWali/verifikasiKHS">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-post mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Verifikasi KHS </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/dosenWali/KHS">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-post-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> List KHS </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <a href="/user/dosenWali/verifikasiPKL">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-journal-bookmark-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Verifikasi PKL </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/dosenWali/KHS">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-box-seam-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> List KHS </h6>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <a href="/user/dosenWali/verifikasiSkripsi">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-journals mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Verifikasi Skripsi </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/dosenWali/Skripsi">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-box-seam-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> List Skripsi </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $title }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->angkatan }}</td>
                                        <td>
                                            <form action="/user/dosenWali{{ $mhs->id }}" method="POST">
                                                <a class="btn btn-primary"
                                                    href="{{ route('dosw.studi', $mhs->user_id) }}">Detil</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>





                {{-- <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default </h4>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam
                        quaerat
                        similique iusto
                        temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic
                        deleniti?
                        Placeat delectus
                        quibusdam ratione ullam!
                    </div>
                </div> --}}
            </section>
        </div>
    </div>
@endsection
