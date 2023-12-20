@extends('components/dosen_wali/sidebar')
@section('section')
    <div id="main-content">
        <script src="{{ asset('regions.js') }}"></script>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Profile</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/dosenWali/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    {{-- <div class="col-12">
                        <x-doswal.foto-profil :foto="$foto" :nama="$userDoswal->name"/>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('doswal.update') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="NIP">NIM</label>
                                            <input type="text" class="form-control" id="NIP"
                                                value="{{ $userDoswal->username }}" placeholder="Enter email" disabled>
                                        </div>


                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <input type="text" class="form-control" id="Nama" name="nama"
                                                value="{{ $userDoswal->name }}" placeholder="Enter your name . . ." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="text" class="form-control" id="Email" name="email"
                                                value="{{ $doswal->email }}"placeholder="Enter your email . . ."
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp">No Telepon</label>
                                            <input type="text" class="form-control" id="no_telp" name="no_hp"
                                                value="{{ $doswal->no_hp }}"placeholder="Enter your No Telepon . . ."
                                                required>
                                        </div>


                                        {{-- <div class="form-group">
                                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                                <province name="gender" id="gender" class="form-control"
                                                required>
                                                <option value="male">Laki-Laki</option>
                                                <option value="female">Perempuan</option>
                                            </province>
                                        </div> --}}

                                        <div class="row">
                                            <div class = "col-12 col-md-6">
                                                <div class="form-group">

                                                    <label for="Provinsi" class="form-label">Provinsi</label>
                                                    <select name="provinsi" id="Provinsi" class="form-control"
                                                        value="{{ $doswal->provinsi }}" required>
                                                        <option value="">Pilih Provinsi</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class = "col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="Kabupaten" class="form-label">Kabupaten
                                                        Kota</label>
                                                    <select name="kab_kota" id="Kabupaten" class="form-control" required>
                                                        <!-- Add other options here -->
                                                        <option value="">Pilih Kabupaten/Kota</option>
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
                                                                <province name="Tempat Lahir" id="Provinsi"
                                                                value="{{ $mhs->tempat_lahir }}" class="form-control"
                                                                required>
                                                                
                                                                
                                                            </province>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class = "col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="Tanggal Lahir" class="form-label">Tanggal
                                                                Lahir
                                                            </label>
                                                            <input type="date" name="birthday" id="birthday"
                                                            class="form-control" placeholder="Your Birthday">
                                                            
                                                        </province>
                                                    </div>
                                                </div>
                                            </div> --}}



                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Status">Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" required>{{ $doswal->alamat }}</textarea>
                                    </div>
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
                                        <a href="/user/dosenWali" class="btn btn-danger">
                                            <i class="fa fa-undo"></i>Kembali
                                        </a>
                                    </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div {{$hidden}}>
                        <x-doswal.ganti-password />
                    </div> --}}
            </section>

        </div>
    </div>
    </div>
    </div>
    <script>
        //console.log(allProvinsi)
        //console.log(regions)
        //console.log($userMhs)
        const province = document.getElementById("Provinsi");
        const kota = document.getElementById("Kabupaten");
        
        // Loop through allProvinsi and create an option for each entry
        allProvinsi.forEach(provinsi => {
            const option = document.createElement("option");
            option.value = provinsi;
            option.text = provinsi;
            if (provinsi === '{{ $doswal->provinsi }}') {
                option.selected = true;
            }
            province.appendChild(option);
        });
        allKota.forEach(kabupaten => {
            const option = document.createElement("option");
            option.value = kabupaten;
            option.text = kabupaten;
            if (kabupaten === '{{ $doswal->kab_kota }}') {
                option.selected = true;
            }
            kota.appendChild(option);
        });
        // Update Kabupaten based on Province
        province.addEventListener("change", updateKabupaten);

        function updateKabupaten() {
            const currentProvince = province.value;
            //console.log(currentProvince)
            kota.innerHTML = "";
            regions.findIndex(prov => {
                console.log(prov)
                if (prov.provinsi === currentProvince) {
                    prov.kota.forEach(kabupaten => {
                        const option = document.createElement("option");
                        option.value = kabupaten;
                        option.text = kabupaten;
                        kota.appendChild(option);
                    });
                }
            });
            // regions.forEach(kabupaten => {
            //     const option = document.createElement("option");
            //     option.value = kabupaten;
            //     option.text = kabupaten;
            //     kota.appendChild(option);
            // });
        }

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#Kabupaten').select2({
                placeholder: 'Search for Kabupaten',
                allowClear: true,
                tags: true,
                tokenSeparators: [',', ' '],
                dropdownParent: $('#Kabupaten').parent()
            });
        });
    </script> --}}
@endsection