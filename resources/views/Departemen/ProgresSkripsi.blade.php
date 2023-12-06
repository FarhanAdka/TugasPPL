@extends('components/Departemen/template')
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

                        @foreach ($skripsi as $skrip)
                            <tr>
                                <td>{{ $skrip->mahasiswa->nama }}</td>
                                <td>{{ $skrip->mahasiswa->nim }}</td>
                                <td>{{ $skrip->mahasiswa->doswal }}</td>
                                <td>{{ $skrip->mahasiswa->angkatan }}</td>
                                <td>
                                    <form action="/user/departemen/DataMahasiswa{{ $skrip->mahasiswa->user_id }}"
                                        method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('dept.studi', $skrip->mahasiswa->user_id) }}">Detil</a>
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
