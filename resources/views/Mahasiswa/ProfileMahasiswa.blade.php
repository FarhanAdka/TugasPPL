<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>




    <link rel="shortcut icon" href="/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">
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
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
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
                                        <h6 class="dropdown-header">Hello, John!</h6>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-person me-2"></i> MyProfile</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                    </li>
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
                                <h3>Profile</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <section class="section">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <div class="avatar avatar-2xl">
                                                <img src="/assets/compiled/jpg/1.jpg" alt="Avatar">
                                            </div>

                                            <h3 class="mt-3">John Doe</h3>
                                            <p class="text-small">Junior Software Engineer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($userMhs as $user)
                                                @csrf
                                                <div class="form-group">
                                                    <label for="NIM">NIM</label>
                                                    <input type="text" class="form-control" id="NIM"
                                                        value="{{ $user->username }}" placeholder="Enter email"
                                                        disabled>
                                                </div>


                                                <div class="form-group">
                                                    <label for="Nama">Nama</label>
                                                    <input type="text" class="form-control" id="Nama"
                                                        value="{{ $user->name }}" placeholder="Enter your name . . ."
                                                        required>
                                                </div>
                                            @endforeach


                                            @foreach ($mahasiswa as $mhs)
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Email">Email</label>
                                                    <input type="text" class="form-control" id="Email"
                                                        value="{{ $mhs->email }}"placeholder="Enter your email . . ."
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="No Telepon">No Telepon</label>
                                                    <input type="text" class="form-control" id="No Telepon"
                                                        value="{{ $mhs->no_hp }}"placeholder="Enter your No Telepon . . ."
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Jalur Masuk">Jalur Masuk</label>
                                                    <select name="Jalur masuk" id="Jalur Masuk"
                                                                class="form-control" required>
                                                                <option value="male">SNMPTN</option>
                                                                <option value="female">SBMPTN</option>
                                                                <option value="female">Mandiri</option>
                                                                <option value="female">Lainnya</option>
                                                            </select>                                                    
                                                </div>

                                                {{-- <div class="form-group">
                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                    <select name="gender" id="gender" class="form-control"
                                                        required>
                                                        <option value="male">Laki-Laki</option>
                                                        <option value="female">Perempuan</option>
                                                    </select>
                                                </div> --}}

                                                <div class="row">
                                                    <div class = "col-12 col-md-6">
                                                        <div class="form-group">

                                                            <label for="Provinsi" class="form-label">Provisnsi</label>
                                                            <select name="Provinsi" id="Provinsi"
                                                                class="form-control" required>
                                                                <option value="male">Laksff</option>
                                                                <option value="female">csn</option>
                                                                <option value="male">Laksff</option>
                                                                <option value="female">sf</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class = "col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="Kabupaten" class="form-label">Kabupaten
                                                                Kota</label>
                                                            <select name="Kabupaten" id="Kabupaten"
                                                                class="form-control" required>
                                                                <option value="male">Lzzc</option>
                                                                <option value="female">vxc</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- 
                                                <div class="row">
                                                    <div class = "col-12 col-md-6">
                                                        <div class="form-group">

                                                            <label for="Tempat Lahir" class="form-label">Tempat
                                                                Lahir</label>
                                                            <select name="Tempat Lahir" id="Provinsi"
                                                                value="{{ $mhs->tempat_lahir }}" class="form-control"
                                                                required>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class = "col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="Tanggal Lahir" class="form-label">Tanggal
                                                                Lahir
                                                            </label>
                                                            <input type="date" name="birthday" id="birthday"
                                                                class="form-control" placeholder="Your Birthday">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}



                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Program Studi">Program Studi</label>
                                                <input type="text" class="form-control" id="Program Studi"
                                                    value="INFORMATIKA" placeholder="Disabled Text" disabled required>
                                            </div>


                                            <div class="form-group">
                                                <label for="Angkatan">Angkatan</label>
                                                <input type="text" class="form-control" id="Angkatan"
                                                    value="{{ $mhs->angkatan }}" placeholder="Angkatan Mhs" disabled
                                                    required>
                                            </div>


                                            <div class="form-group">
                                                <label for="Status">Status</label>
                                                <input type="text" class="form-control" id="Status"
                                                    value="{{ $mhs->status }}" placeholder="Status mahasiswa"
                                                    disabled required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Status">Alamat</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <img id="#model-preview" scr="https://via.placeholder.com/150"
                                                    alt="preview">
                                            </div>

                                            <div class="form-group">
                                                <label for="Foto">Foto</label>
                                                <input type="file" class="form-control" name="File"
                                                    aceppt ="image/*" placeholder="Foto" required>
                                            </div>
                                            @endforeach





                                            {{-- // 'user_id',
                                            // 'alamat',
                                            // 'kab_kota',
                                            // 'provinsi',
                                            // 'no_hp',
                                            // 'email',
                                            // 'angkatan',
                                            // 'jalur_masuk',
                                            // 'status',
                                            // 'doswal', --}}

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Save Changes
                                                </button>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fa fa-undo"></i>Kembali
                                                </a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input, id) {
            id = id || '#modal-preview';
            if (input.files && input.files[0]) {
                var read = new FileReader();

                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('#modeal-preview').removeClass('hidden');
                $('#start').hide();

            }
        }
    </script>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>

</body>

</html>
