@extends('components/mahasiswa/sidebar')
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
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data KHS</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data KHS</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Jumlah SKS</th>
                                    <th>IP Semester</th>
                                    <th>IP Kumulatif</th>
                                    <th>Scan KHS</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khs as $kh)
                                    <tr>
                                        <td>{{ $kh->semester_aktif }}</td>
                                        <td>{{ $kh->jumlah_sks }}</td>
                                        <td>{{ $kh->ip }}</td>
                                        <td>{{ $kh->ipk }}</td>
                                        <td><a href="{{ route('khs.download', ['id' => $kh->id]) }}">Lihat</a>
                                        </td>
                                        <td>{{ $kh->status ? 'Sudah disetujui' : 'Belum disetujui' }}</td>
                                        <td>
                                            @if (!$kh->status)
                                                <!-- Check if status is not true -->
                                                <form action="{{ route('KHS.destroy', $kh->id) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('KHS.edit', $kh->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
