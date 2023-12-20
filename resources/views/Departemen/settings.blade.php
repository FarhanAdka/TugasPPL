@extends('components/departemen/template')
@section('section')
    <div id="main-content">
        <script src="{{ asset('regions.js') }}"></script>
        <div class="page-heading">
            <div class="page-title">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Profile</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                            <div class="col-md-6">
                                <form action="{{ route('dept.setpass') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-3">
                                        <h4>Ganti Password</h4>
                                    </div>

                                    <div class="mb-3">
                                        <label for="old_password">Password Lama</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password"
                                            required>
                                        <div class="form-text">Masukkan password lama anda.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password">Password Baru</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            required>
                                        <div class="form-text">Masukkan password baru yang akan dipakai.</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Ubah Password
                                        </button>
                                        <a class="btn btn-danger">
                                            <i class="fa fa-undo"></i>Reset
                                        </a>
                                    </div>
                                </form>

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
