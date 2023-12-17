@extends('components/mahasiswa/sidebar')
@section('section')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>KHS</h3>
                        <p class="text-subtitle text-muted">Isi KHS Mahasiswa</p>
                    </div>

                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data KHS</li>
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

                                <form class="form" action="{{ route('KHS.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-semester-aktif">Semester Aktif</label>
                                                    <select id="semester_aktif" class="form-control" name="semester_aktif">
                                                        <option value="" disabled selected hidden>Pilih Semester
                                                        </option>
                                                        <?php
                                                        foreach ($avail_semester as $key => $value) {
                                                            echo "<option value='$value'>$value</option>";
                                                        }
                                                        
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-jumlah-sks">Jumlah SKS Semester</label>
                                                    <input type="text" id="jumlah_sks" class="form-control"
                                                        name="jumlah_sks" placeholder="Jumlah SKS">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-ip">IP Semester</label>
                                                    <input type="text" id="ip" class="form-control" name="ip"
                                                        placeholder="IP">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-ipk">IP Kumulatif</label>
                                                    <input type="text" id="ipk" class="form-control" name="ipk"
                                                        placeholder="IPK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form-sksk">Jumlah SKS Kumulatif</label>
                                                    <input type="text" id="sksk" class="form-control" name="sksk"
                                                        placeholder="SKS Kumulatif">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="scan-krs">Scan KHS</label>
                                                    <input type="file" id= "scan_khs" class="multiple-files-filepond"
                                                        name="scan_khs" multiple>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
