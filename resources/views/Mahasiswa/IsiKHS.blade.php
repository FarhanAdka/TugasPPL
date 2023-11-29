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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                  <li>
                    <h6 class="dropdown-header">Hello, John!</h6>
                  </li>
                  
                  <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> MyProfile</a></li>
                  
                  <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i> Settings</a></li>
                  
                  <li><hr class="dropdown-divider"></li>
                  
                  <li><a class="dropdown-item" href="/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
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
                  
                    <form class="form" action="{{route('KHS.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-body">
                        <div class="row">
                          
                          <div class="col-12">
                            <div class="form-group">
                              <label for="form-semester-aktif">Semester Aktif</label>
                              <select id="semester_aktif" class="form-control" name="semester_aktif">
                                <option value="" disabled selected hidden>Pilih Semester</option>
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
                              <input type="text" id="jumlah_sks" class="form-control" name="jumlah_sks" placeholder="Jumlah SKS">
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="form-group">
                              <label for="form-ip">IP Semester</label>
                              <input type="text" id="ip" class="form-control" name="ip" placeholder="IP">
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="form-group">
                              <label for="form-ipk">IP Kumulatif</label>
                              <input type="text" id="ipk" class="form-control" name="ipk" placeholder="IPK">
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="form-group">
                              <label for="form-sksk">Jumlah SKS Kumulatif</label>
                              <input type="text" id="sksk" class="form-control" name="sksk" placeholder="SKS Kumulatif">
                            </div>
                          </div>
                          
                          <div class="col-12">
                            <div class="form-group">
                              <label for="scan-krs">Scan KHS</label>
                              <input type="file" id= "scan_khs" class="multiple-files-filepond" name="scan_khs" multiple> 
                            </div>
                          </div>
                          
                          <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
      
    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>

</body>

</html>