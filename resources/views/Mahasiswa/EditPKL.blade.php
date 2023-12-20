@extends('components/mahasiswa/sidebar')
@section('section')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>KHS</h3>
                        <p class="text-subtitle text-muted">Edit KHS Mahasiswa</p>
                    </div>

                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/mahasiswa/PKL">Data PKL</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit PKL</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row match-height">

                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">

                                <form class="form" action="{{ route('KHS.update', $khs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-semester-aktif">Semester Aktif</label>
                                                    <select id="semester_aktif" class="form-control" name="semester_aktif">
                                                        <option value="{{ $khs->semester_aktif }}" selected>
                                                            {{ $khs->semester_aktif }}</option>
                                                        <?php
                                                        for ($i = 1; $i <= 14; $i++) {
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-jumlah-sks">Jumlah SKS</label>
                                                    <input type="text" id="jumlah_sks" class="form-control"
                                                        name="jumlah_sks" placeholder="Jumlah SKS"
                                                        value="{{ $khs->jumlah_sks }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-ip">IP Semester</label>
                                                    <input type="text" id="ip" class="form-control" name="ip"
                                                        value="{{ $khs->ip }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-ipk">IP Kumulatif</label>
                                                    <input type="text" id="ipk" class="form-control" name="ipk"
                                                        value="{{ $khs->ipk }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="scan-krs">Scan KHS</label>
                                                    <input type="file" id="scan_khs" class="form-control"
                                                        name="scan_khs"
                                                        value="{{ $khs->scan_khs }}> 
                            </div>
                          </div>
                          
                          <div class="col-12">
                                                    <div class="form-group">
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>

                                            </div>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
