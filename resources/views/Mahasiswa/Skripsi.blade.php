@extends('components/mahasiswa/sidebar')
@section('section')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                        <p class="text-subtitle text-muted">Tambah skripsi Mahasiswa</p>
                    </div>

                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/mahasiswa/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data skripsi</li>
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

                                <form class="form" action="{{ route('skripsi.store', $skripsi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lulus">Tanggal Lulus</label>
                                                @if (isset($skripsi->tanggal_lulus))
                                                    <input type="date" id="tanggal_lulus" class="form-control"
                                                        name="tanggal_lulus" placeholder="Tanggal Lulus"
                                                        value="{{ $skripsi->tanggal_lulus }}" disabled>
                                                @else
                                                    <input type="date" id="tanggal_lulus" class="form-control"
                                                        name="tanggal_lulus" placeholder="Tanggal Lulus"
                                                        value="{{ $skripsi->tanggal_lulus }}">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nilai">Nilai Skripsi</label>
                                                @if (isset($skripsi->nilai))
                                                    <input type="text" id="nilai" class="form-control" name="nilai"
                                                        placeholder="Nilai" value="{{ $skripsi->nilai }}" disabled>
                                                @else
                                                    <input type="text" id="nilai" class="form-control" name="nilai"
                                                        placeholder="Nilai" value="{{ $skripsi->nilai }}">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            @if (isset($skripsi->scan_skripsi))
                                                <a href="{{ route('skripsi.download', ['id' => $skripsi->id]) }}">Lihat</a>
                                            @else
                                                <p>Belum ada file</p>
                                            @endif
                                            <div class="form-group">
                                                @if (isset($skripsi->scan_skripsi))
                                                    <label id="label_edit" for="scan_skripsi" hidden>Edit Scan
                                                        Skripsi</label>
                                                    <input type="file" id="scan_skripsi" class="form-control"
                                                        name="scan_skripsi" placeholder="Scan skripsi" disabled hidden>
                                                @else
                                                    <label for="scan_skripsi">Tambah Scan Skripsi</label>
                                                    <input type="file" id="scan_skripsi" class="form-control"
                                                        name="scan_skripsi" placeholder="Scan Skripsi">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            @if (isset($skripsi->scan_skripsi) && isset($skripsi->tanggal_lulus) && isset($skripsi->nilai))
                                                <button id="edit" type="submit" class="btn btn-primary me-1 mb-1"
                                                    hidden>Edit</button>
                                            @else
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                            @endif
                                            <button id="reset" type="reset"
                                                class="btn btn-light-secondary me-1 mb-1"hidden>Reset</button>
                                            @if (isset($skripsi->scan_skripsi) && isset($skripsi->tanggal_lulus) && isset($skripsi->nilai) && $skripsi->status == 0)
                                                <button id="toggleDisable" type="button"
                                                    class="btn btn-primary me-1 mb-1">Edit</button>
                                            @endif
                                        </div>

                                    </div>
                            </div>
                            </form>
                            @csrf
                            <script>
                                // Function to toggle input fields' disabled state
                                function toggleInputs() {
                                    // Select all input fields within the form
                                    var inputs = document.querySelectorAll('form.form input');
                                    var editButton = document.getElementById('edit');
                                    var resetButton = document.getElementById('reset');
                                    var toggleButton = document.getElementById('toggleDisable');
                                    var file = document.getElementById('scan_skripsi');
                                    var label = document.getElementById('label_edit');
                                    // Toggle the buttons' hidden state
                                    editButton.hidden = !editButton.hidden;
                                    resetButton.hidden = !resetButton.hidden;
                                    file.hidden = !file.hidden;
                                    label.hidden = !label.hidden;

                                    toggleButton.textContent = toggleButton.textContent === 'Edit' ?
                                        'Cancel' : 'Edit';

                                    // Loop through each input and toggle the disabled attribute
                                    inputs.forEach(function(input) {
                                        if (input.disabled) {
                                            input.removeAttribute('disabled');
                                        } else {
                                            input.setAttribute('disabled', 'true');
                                        }
                                    });
                                    var csrfTokenInput = document.querySelector('input[name="_token"]');
                                    if (csrfTokenInput.disabled) {
                                        csrfTokenInput.removeAttribute('disabled');
                                    } else {
                                        csrfTokenInput.setAttribute('disabled', 'true');
                                    }
                                }

                                // Add an event listener to the button to trigger the function
                                document.getElementById('toggleDisable').addEventListener('click', toggleInputs);
                            </script>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
