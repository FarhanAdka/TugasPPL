@extends('components/operator/sidebar')
@section('section')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/user/operator/kelolaMahasiswa">Kelola Mahasiswa</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('kelolamahasiswa.update', $mahasiswa->user_id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">NIM</label>
                                <input type="text" value="{{ $mahasiswa->nim }}" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" value="{{ $mahasiswa->name }}" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <select name="angkatan" class="form-select">
                                    <option value="">Pilih Angkatan</option>
                                    @for ($year = 2033; $year >= 2013; $year--)
                                        <option value="{{ $year }}"
                                            {{ $mahasiswa->angkatan == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                                {{-- <label for="angkatan" class="form-label">Angkatan</label>
                                        <input type="text" value="{{ old('angkatan') }}" name="angkatan"
                                            class="form-control"> --}}
                            </div>
                            <div class="mb-3">
                                <label for="doswal" class="form-label">Dosen Wali</label>
                                <select name="doswal" class="form-select">
                                    <option value="{{ $mahasiswa->doswal }}">Pilih Dosen Wali</option>
                                    @foreach ($doswal as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $mahasiswa->doswal == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{$mahasiswa->status == 'Aktif' ?  'selected' : ''}}>Aktif</option>
                                    <option value="2" {{$mahasiswa->status == 'Cuti' ?  'selected' : ''}}>Cuti</option>
                                    <option value="3" {{$mahasiswa->status == 'Mangkir' ?  'selected' : ''}}>Mangkir</option>
                                    <option value="4" {{$mahasiswa->status == 'Do' ?  'selected' : ''}} >DO</option>
                                    <option value="5" {{$mahasiswa->status == 'Undur_diri' ?  'selected' : ''}}>Undur Diri</option>
                                    <option value="6" {{$mahasiswa->status == 'Lulus' ?  'selected' : ''}}>Lulus</option>
                                    <option value="7" {{$mahasiswa->status == 'Meninggal_dunia' ?  'selected' : ''}}>Meninggal</option>
                                </select>
                            </div>
                            <div class="mb-3 d-grid">
                                <button name="submit" type="submit" class="btn btn-primary">Edit
                                    Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
