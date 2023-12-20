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
            font-family:"Times New Roman", Times, serif;
            font-size: 20px;
            /* Example font-family */
            /* Add other styles as needed */
        }
        
        .header {
            text-align: center;
        }


        .container1 {
            position: absolute;
            top: 540px;
            left: 30px;
            /* Adjust width as needed */
        }

        .container2 {
            position: absolute;
            top: 600px;
            left: 30px;
            /* Adjust width as needed */
        }

        .container3 {
            position: absolute;
            top: 660px;
            left: 30px;
            /* Adjust width as needed */
        }

        .container4 {
            position: absolute;
            top: 720px;
            left: 20px;
            /* Adjust width as needed */
        }


        .blue-box {
            box-sizing: border-box;
            width: 100px;
            height: 20px;
            border-radius: 5px;
            background: solid #237bff;
            text-align: center;
            margin: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .green-box {
            box-sizing: border-box;
            width: 100px;
            height: 20px;
            border-radius: 5px;
            background: solid #33dc0d;
            text-align: center;
            margin: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .yellow-box {
            box-sizing: border-box;
            width: 100px;
            height: 20px;
            border-radius: 5px;
            background: solid #fded03;
            text-align: center;
            margin: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .red-box {
            box-sizing: border-box;
            width: 100px;
            height: 20px;
            border-radius: 5px;
            background: solid #fc4235;
            text-align: center;
            margin: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }

        .profile {
            position: absolute;
            top: 110px;
            right: 20px;
            width: 190px;
            /* Adjust width as needed */
            height: 190px;
            /* Adjust height as needed */
        }

        .red-circle {
            position: relative;
            top: 4px;
            display: inline-block;
            width: 20px;
            /* Adjust size as needed */
            height: 20px;
            /* Adjust size as needed */
            border-radius: 50%;
            background-color: #fc4235;
            /* Change color as needed */
        }
        .blue-circle {
            position: relative;
            top: 4px;
            display: inline-block;
            width: 20px;
            /* Adjust size as needed */
            height: 20px;
            /* Adjust size as needed */
            border-radius: 50%;
            background-color: #237bff;
            /* Change color as needed */
        }
        .yellow-circle {
            position: relative;
            top: 4px;
            display: inline-block;
            width: 20px;
            /* Adjust size as needed */
            height: 20px;
            /* Adjust size as needed */
            border-radius: 50%;
            background-color: #fded03;
            /* Change color as needed */
        }
        .green-circle {
            position: relative;
            top: 4px;
            display: inline-block;
            width: 20px;
            /* Adjust size as needed */
            height: 20px;
            /* Adjust size as needed */
            border-radius: 50%;
            background-color: #33dc0d;
            /* Change color as needed */
        }
    </style>
</head>

<body>
    <p class="header"><b>Progres Studi Mahasiswa Informatika</b></p>
    <p class="header"><b>Fakultas Sains dan Matematika UNDIP Semarang</b></p>
    <img class="profile" src="{{ public_path('/assets/compiled/jpg/1.jpg') }}" />
    {{-- <p>Nama: {{ $data['nama'] }}</p>
    <p>NIM: {{ $data['nim'] }}</p>
    <p>Angkatan: {{ $data['angkatan'] }}</p>
    <p>Dosen Wali:{{ $data['dosen_wali'] }}</p> --}}
    <table>
            <tr>
                <td>
                    <h4>Nama</h4>
                </td>
                <td>
                    &nbsp;:&nbsp;
                </td>
                <td>
                    <p>{{ $data['nama'] }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>NIM</h4>
                </td>
                <td>
                    &nbsp;:&nbsp;
                </td>
                <td>
                    <p>{{ $data['nim'] }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Angkatan</h4>
                </td>
                <td>
                    &nbsp;:&nbsp;
                </td>
                <td>
                    <p>{{ $data['angkatan'] }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Dosen Wali</h4>
                </td>
                <td>
                    &nbsp;:&nbsp;
                </td>
                <td>
                    <p>{{ $data['dosen_wali'] }}</p>
                </td>
            </tr>
    </table>
    <p class="header"><b>Semester</b></p>
    <div class="container1">
        <div class="row">
            @for  ($i = 1; $i <= 6; $i++) 
            <span class="{{$data['semester'][$i]['khs'] && $data['semester'][$i]['irs']? ($data['semester'][$i]['pkl'] ? 'yellow-box' : ($data['semester'][$i]['skripsi'] ? 'green-box' : 'blue-box')) : 'red-box'}}">0{{$i}}</span>
            @endfor
        </div>
    </div>
    <div class="container2">
        <div class="row">
            @for  ($i = 7; $i <= 12; $i++) 
            <span class="{{$data['semester'][$i]['khs'] && $data['semester'][$i]['irs']? ($data['semester'][$i]['pkl'] ? 'yellow-box' : ($data['semester'][$i]['skripsi'] ? 'green-box' : 'blue-box')) : 'red-box'}}">{{$i > 9 ? $i : '0'.$i }}</span>
            @endfor
        </div>
    </div>
    <div class="container3">
        <div class="row">
            @for  ($i = 13; $i <= 14; $i++) 
            <span class="{{$data['semester'][$i]['khs'] && $data['semester'][$i]['irs']? ($data['semester'][$i]['pkl'] ? 'yellow-box' : ($data['semester'][$i]['skripsi'] ? 'green-box' : 'blue-box')) : 'red-box'}}">{{$i > 9 ? $i : '0'.$i }}</span>
            @endfor
        </div>
    </div>
    <div class="container4">
        <p>
            Keterangan
        </p>
        <ul>
            <li style="list-style: none"><span class="red-circle"></span> Tidak ada Progres Studi (IRS dan KHS).</li>
            <li style="list-style: none"><span class="blue-circle"></span> Progres Studi (IRS dan KHS) telah diisikan.</li>
            <li style="list-style: none"><span class="yellow-circle"></span> Progres Studi (IRS dan KHS) dan PKL telah diisikan. </li>
            <li style="list-style: none"><span class="green-circle"></span> Progres Studi (IRS dan KHS) dan Skripsi telah diisikan.</li>
        </ul>

    </div>


</body>

</html>
