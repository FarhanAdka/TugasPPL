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
                            <th>NIM</th>
                            <th>Dosen Wali</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pkl as $pk)
                            <tr>
                                <td>{{ $pk->mahasiswa->nama }}</td>
                                <td>{{ $pk->mahasiswa->nim }}</td>
                                <td>{{ $pk->mahasiswa->doswal }}</td>
                                <td>{{ $pk->mahasiswa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $pk->id }}" method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('dept.studi', $pk->mahasiswa->user_id) }}">Detil</a>
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
