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

        #title{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 19px;
            font-weight: bold;
        }

        .tabledatakaryawan{
            margin-top: 40px;
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
        <table class="tabledatakaryawan">
            <tr>
                <td>NIk</td>
                <td>:</td>
                <td>{{ $karyawan->nik }}</td>
            </tr>
        </table>
    </section>

</body>

</html>
