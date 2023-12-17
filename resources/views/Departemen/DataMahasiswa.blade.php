@extends('components/departemen/template')
@section('section')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ $Title }}
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>ID</th>
                            <th>Dosen Wali</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $mhs->name }}</td>
                                <td>{{ $mhs->id }}</td>
                                <td>{{ $mhs->doswal }}</td>
                                <td>{{ $mhs->mahasiswa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $mhs->id }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('dept.studi', $mhs->id) }}">Detil</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
