@extends('components/departemen/template')
@section('section')
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <a href="/user/departemen/DataMahasiswa">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2 text-center w-100"
                                    style="height: 100px; justify-content-start">
                                    <i class="bi bi-floppy2-fill mx-3 mb-4 "></i>
                                    <h6 class="text-white font-semibold mx-0 mb-0"> Data Mahasiswa </h6>
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
                        <a href="/user/departemen/ProgresPKL">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2 text-center w-100 100"
                                    style="height: 100px; justify-content-start">
                                    <i class="bi bi-box-seam-fill mx-3 mb-4 "></i>
                                    <h6 class="text-white font-semibold mx-0 mb-0"> Data Progres PKL </h6>
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
                        <a href="/user/departemen/ProgresSkripsi">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start">
                                <div class="stats-icon green mb-2 text-center w-100"
                                    style="height: 100px; justify-content-start">
                                    <i class="bi bi-box-fill mx-3 mb-4 "></i>
                                    <h6 class="text-white font-semibold mx-0 mb-0"> Data Progres Skripsi </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
