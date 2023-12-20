@extends('components/operator/sidebar')
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item"><a href="/user/operator/profile">Profile</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="card">

                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <h6 class="text-small font-bold mx-6 mb-3"> Tambah Akun </h6>

                                <div class="row">
                                    <a href="/user/operator/tambahMahasiswa">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-post mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Tambah Akun Mahasiswa </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/operator/tambahdosenWali">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-file-post-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Tambah Akun Dosen Wali </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="row">
                                    <a href="/user/operator/tambahOperator">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-journal-bookmark-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Tambah Akun Operator </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="{{ route('datamhs.create') }}">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2 text-center w-100 justify-content-start">
                                                <i class="bi bi-box-seam-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Tambah Data Mahasiswa </h6>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <h6 class="text-small font-bold mx-6 mb-3"> Kelola Akun </h6>
                                <div class="row">
                                    <a href="/user/operator/kelolaMahasiswa">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2 text-center w-100 "
                                                style="height: 105px; justify-content-start">

                                                <i class="bi bi-file-earmark-text mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Kelola Akun Mahasiswa </h6>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="/user/operator/keloladosenWali">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2 text-center w-100 "
                                                style="height: 105px; justify-content-start">
                                                <i class="bi bi-file-earmark-text-fill mx-3 mb-4 "></i>
                                                <h6 class="text-white font-semibold mx-0 mb-0"> Kelola Akun Dosen Wali </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>
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
