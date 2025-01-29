<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A4</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }

        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 19px;
            font-weight: bold;
        }

        .tabeldatakaryawan {
            margin-top: 40px;
        }

        .tabeldatakaryawan td {
            padding: 5px;

        }

        .tabelpresensi {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabelpresensi th {
            border: 1px solid #000000;
            padding: 8px;
            background: #dbdbdb
        }

        .tabelpresensi td {
            border: 1px solid #000000;
            padding: 5px;
        }

        .foto {
            width: 40px;
            height: 30px;
        }


    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <table style="width: 100%">
            <tr>
                <td style="width: 30px">
                    <img src="{{ asset('assets/img/logoInet.png') }}" alt="">
                </td>
                <td>
                    <span id="title">
                        LAPORAN PRESENSI<br>
                        PERIODE {{ strtoupper($namabulan[intval($bulan)]) }} {{ $tahun }} <br>
                        PT. INET GLOBAL INDO<br>
                    </span>
                    <span><i>Jln. Sudirman</i></span>
                </td>
            </tr>
        </table>
        <table class="tabeldatakaryawan">
            <tr>
                <td rowspan="6">
                    @php
                        $path = Storage::url('uploads/foto/' . $karyawan->foto);
                    @endphp
                    <img src="{{ url($path) }}" alt="" width=150px" height="200px">
                </td>
            </tr>
            <tr>
                <td>NIk</td>
                <td>:</td>
                <td>{{ $karyawan->nik }}</td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td>{{ $karyawan->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $karyawan->jabatan }}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>:</td>
                <td>{{ $karyawan->nama_dept }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{ $karyawan->no_hp }}</td>
            </tr>
        </table>
        <table class="tabelpresensi">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Foto</th>
                <th>Waktu Pulang</th>
                <th>Foto</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($presensi as $d)
                @php
                    $path_in = Storage::url('uploads/absensi/' . $d->poto_in);
                    $path_out = Storage::url('uploads/absensi/' . $d->poto_out);
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($d->tgl_absensi)) }}</td>
                    <td>{{ $d->jam_in }}</td>
                    <td><img src="{{ url($path_in) }}" alt="" class="foto"></td>
                    <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Pulang' }}</td>
                    <td><img src="{{ url($path_out) }}" alt="" class="foto"></td>
                    <td>
                        @if ($d->jam_in>'07:00')
                        Terlambat
                        @else
                        Tepat Waktu
                        @endif
                    </td>

                </tr>
            @endforeach
        </table>
    </section>

</body>

</html>
