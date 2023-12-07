<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
</head>

<body>

    <script src="/assets/static/js/initTheme.js"></script>

    <div id="app">

        <x-mahasiswa.sidebar />

        <div id="main" class='layout-navbar navbar-fixed'>

            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>

                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ $UserName }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">Mahsiswa</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ $UserName }}!</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="/user/mahasiswa/profile"><i
                                                class="icon-mid bi bi-person me-2"></i> MyProfile</a></li>

                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>PKL</h3>
                                <p class="text-subtitle text-muted">Tambah PKL Mahasiswa</p>
                            </div>

                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data PKL</li>
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

                                        <form class="form" action="{{ route('PKL.store', $pkl->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="form-semester-aktif">Semester Seminar</label>
                                                        <select id="semester" class="form-control"
                                                            name="semester">
                                                            <option value="" disabled selected hidden>Pilih
                                                                Semester</option>

                                                            @foreach ($avail_semester as $s)
                                                                <option value="{{ $s }}" {{isset($pkl->semester) && $pkl->semester == $s ? 'selected' : '' }}>{{ $s }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_lulus">Tanggal Lulus</label>
                                                        @if (isset($pkl->tanggal_lulus))
                                                            <input type="date" id="tanggal_lulus"
                                                                class="form-control" name="tanggal_lulus"
                                                                placeholder="Tanggal Lulus"
                                                                value="{{ $pkl->tanggal_lulus }}" disabled>
                                                        @else
                                                            <input type="date" id="tanggal_lulus"
                                                                class="form-control" name="tanggal_lulus"
                                                                placeholder="Tanggal Lulus"
                                                                value="{{ $pkl->tanggal_lulus }}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="nilai">Nilai PKL</label>
                                                        @if (isset($pkl->nilai))
                                                            <input type="text" id="nilai" class="form-control"
                                                                name="nilai" placeholder="Nilai"
                                                                value="{{ $pkl->nilai }}" disabled>
                                                        @else
                                                            <input type="text" id="nilai" class="form-control"
                                                                name="nilai" placeholder="Nilai"
                                                                value="{{ $pkl->nilai }}">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    @if (isset($pkl->scan_pkl))
                                                        <a
                                                            href="{{ route('pkl.download', ['id' => $pkl->id]) }}">Lihat</a>
                                                    @else
                                                        <p>Belum ada file</p>
                                                    @endif
                                                    <div class="form-group">
                                                        @if (isset($pkl->scan_pkl))
                                                            <label id="label_edit" for="scan_pkl" hidden>Edit Scan
                                                                PKL</label>
                                                            <input type="file" id="scan_pkl" class="form-control"
                                                                name="scan_pkl" placeholder="Scan PKL" disabled
                                                                hidden>
                                                        @else
                                                            <label for="scan_pkl">Tambah Scan PKL</label>

                                                            <input type="file" id="scan_pkl" class="form-control"
                                                                name="scan_pkl" placeholder="Scan PKL">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    @if (isset($pkl->scan_pkl) && isset($pkl->tanggal_lulus) && isset($pkl->nilai))
                                                        <button id="edit" type="submit"
                                                            class="btn btn-primary me-1 mb-1" hidden>Edit</button>
                                                    @else
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Tambah</button>
                                                    @endif
                                                    <button id="reset" type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1"hidden>Reset</button>
                                                    @if (isset($pkl->scan_pkl) && isset($pkl->tanggal_lulus) && isset($pkl->nilai) && !($pkl->status))
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
                                            var file = document.getElementById('scan_pkl');
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

        </div>

    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>

</body>

</html>
