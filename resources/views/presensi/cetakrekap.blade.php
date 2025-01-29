<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A4</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

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
            width: 90%; /* Adjusted width */
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabelpresensi th {
            border: 1px solid #000000;
            padding: 5px; /* Adjusted padding */
            background: #dbdbdb;
            font-size: 15px;
        }

        .tabelpresensi td {
            border: 1px solid #000000;
            padding: 3px; /* Adjusted padding */
        }

        .foto {
            width: 40px;
            height: 30px;
        }
    </style>
</head>

<body class="A4 landscape">

    <?php
    function selisih($jam_masuk, $jam_keluar)
    {
        [$h, $m, $s] = explode(':', $jam_masuk);
        $dtAwal = mktime($h, $m, $s, '1', '1', '1');
        [$h, $m, $s] = explode(':', $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode('.', $totalmenit / 60);
        $sisamenit = $totalmenit / 60 - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ':' . round($sisamenit2);
    }
    ?>

    <section class="sheet padding-10mm">

        <table style="width: 100%">
            <tr>
                <td style="width: 30px">
                    <img src="{{ asset('assets/img/logoInet.png') }}" alt="">
                </td>
                <td>
                    <span id="title">
                        REKAP PRESENSI<br>
                        PERIODE {{ strtoupper($namabulan[intval($bulan)]) }} {{ $tahun }} <br>
                        PT. INET GLOBAL INDO<br>
                    </span>
                    <span><i>Jln. Sudirman</i></span>
                </td>
            </tr>
        </table>

        <table class="tabelpresensi">
            <tr>
                <th rowspan="2">Nik</th>
                <th rowspan="2">Nama Karyawan</th>
                <th colspan="31">Tanggal</th>
                <th rowspan="2">TH</th>
                <th rowspan="2">TT</th>
            </tr>
            <tr>
                <?php
                for ($i=1; $i<=31; $i++){
                ?>
                <th>{{ $i }}</th>
                <?php
                }
                ?>
            </tr>
            @foreach ($rekap as $d)
                <tr>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->nama_lengkap }}</td>

                    <?php
                    $totalhadir = 0;
                    $totalterlambat = 0;
                    for ($i=1; $i<=31; $i++){
                        $tgl = "tgl_".$i;
                        if(empty($d->$tgl)){
                            $hadir = ['',''];
                            $totalhadir += 0;
                        }else{
                            $hadir = explode("-",$d->$tgl);
                            $totalhadir += 1;
                            if($hadir[0] > "08:00:00"){
                                $totalterlambat += 1;
                            }
                        }
                    ?>

                    <td>
                        <span style="color:{{ $hadir[0] > '08:00:00' ? 'red' : '' }} ">{{ $hadir[0] }}</span><br>
                        <span style="color:{{ $hadir[1] > '16:00:00' ? 'red' : '' }} ">{{ $hadir[1] }}</span>
                    </td>

                    <?php
                    }
                    ?>
                    <td>{{ $totalhadir }}</td>
                    <td>{{ $totalterlambat }}</td>
                </tr>
            @endforeach

        </table>

        <table width="100%" style="margin-top: 100px">
            <tr>
                <td></td>
                <td style="text-align: center">Bandung, {{ date('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align: bottom;" height="100px">
                    <u>Andreana</u><br>
                    <i><b>HRD Manager</b></i>
                </td>
                <td style="text-align: center; vertical-align: bottom;">
                    <u>Khoirul</u><br>
                    <i><b>Direktur</b></i>
                </td>
            </tr>
        </table>
    </section>

</body>

</html>
