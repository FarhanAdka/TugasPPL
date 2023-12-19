<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        {{-- <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css"> --}}
        <style>
        body {
            font-family: Arial, sans-serif; /* Example font-family */
            /* Add other styles as needed */
        }

        /* Define styles for the table and its cells */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            text-align: center;
        }
        p {
            text-align: center;
        }
    </style>
</head>

<body>
    <p><b>Daftar Belum Lulus PKL Mahasiswa Informatika Angkatan {{$tahun}}</b></p>
    <p><b>Fakultas Sains dan Matematika UNDIP Semarang</b></p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($pkl) && count($pkl) > 0)
                @foreach ($pkl as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->angkatan }}</td>
                    <td>{{ $mahasiswa->nilai }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="border-bottom: 1px solid #000;">&nbsp;</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
