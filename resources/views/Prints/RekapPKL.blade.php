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
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            /* Example font-family */
            /* Add other styles as needed */
        }

        /* Define styles for the table and its cells */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
    <p><b>Rekap Progres PKL Mahasiswa Informatika</b></p>
    <p><b>Fakultas Sains dan Matematika UNDIP Semarang</b></p>

    <table>
        <thead>
            <tr>
                <th> Tahun </th>
                @foreach ($tahun as $thn)
                    <th colspan="2">{{ $thn }}</th>
                @endforeach
            </tr>
            <tr>
                <th>Status PKL</th>
                @foreach ($tahun as $thn)
                    <th>Belum</th>
                    <th>Sudah</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total</td>
                @foreach ($tahun as $thn)
                    <td>
                        <p>
                            {{$pkl[$thn]['belum']}}
                        </p>
                    </td>
                    <td>
                        <p>
                            {{$pkl[$thn]['sudah']}}
                        </p>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>

</html>
