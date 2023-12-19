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
                                <li class="breadcrumb-item"><a href="/user/mahasiswa/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data IRS</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data IRS</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Jumlah SKS</th>
                                    <th>Scan IRS</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($irs as $ir)
                                    <tr>
                                        <td>{{ $ir->semester_aktif }}</td>
                                        <td>{{ $ir->jumlah_sks }}</td>
                                        <td><a href="{{ route('irs.download', ['id' => $ir->id]) }}">Lihat</a>
                                        </td>
                                        <td>{{ $ir->status ? 'Sudah disetujui' : 'Belum disetujui' }}</td>
                                        <td>
                                            @if (!$ir->status)
                                                <!-- Check if status is not true -->
                                                <form action="{{ route('IRS.destroy', $ir->id) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('IRS.edit', $ir->id) }}">Edit</a>
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
