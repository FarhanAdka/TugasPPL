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
                                <li class="breadcrumb-item"><a href="/user/operator">Dashboard</a></li>
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
                        <form action="{{ route('mahasiswa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">NIM</label>
                                <input type="text" value="{{ old('username') }}" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <select name="angkatan" class="form-select">
                                    <option value="">Pilih Angkatan</option>
                                    @for ($year = 2033; $year >= 2013; $year--)
                                        <option value="{{ $year }}"
                                            {{ old('angkatan') == $year ? 'selected' : '' }}>
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
                                    <option value="">Pilih Dosen Wali</option>
                                    @foreach ($doswal as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-grid">
                                <button name="submit" type="submit" class="btn btn-primary">Buat
                                    Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
