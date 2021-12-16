<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table>
        <tr>
            <td width="60px">
                <img src="{{ public_path("/img/logo/logo-ukdw.png")}}" width="60" height="80" />
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <font size="2" style="letter-spacing:1.2px">
                    UNIVERSITAS KRISTEN DUTA WACANA
                </font>
                <br>
                <font size="3">
                    <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                </font>
                <br>
                <font size="3">
                    <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                </font>
                <br>
                <font size="1">
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI INFORMATIKA
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI SISTEM INFORMASI </li>
                </font>
            </td>
        </tr>
    </table>
    <div class="row" align="center">
        <h4>SURAT KEPUTUSAN<br>
            FAKULTAS TEKNOLOGI INFORMASI <br>
            UNIVERSITAS KRISTEN DUTA WACANA <br>
            No. : {{ $cetak->no_surat}}</h4>
    </div>
    <div class="row" align="center">
        <h4>Tentang:</h4>
    </div>
    <div class="row" align="center" style="font-size: 16px; margin-left: 150px; margin-right: 150px; text-transform: uppercase;">
        <h4>{{  $cetak->prihal }} <br>
        FAKULTAS TEKNOLOGI INFORMASI <br>
        UNIVERSITAS KRISTEN DUTA WACAN </h4>
    </div>
    <br>
    <div class="col-sm; ml-30; mr-30;" align="justify" style="margin-left: 75px; margin-right: 75px">
        {{ $cetak->validasi->jabatan}} Fakultas Teknologi Informasi Universitas Kristen Duta Wacara <br>

        Menimbang :
        <?php $no = 1; ?>
        @foreach ($cetakJson->menimbang as $data)
        <div class="col-sm; ml-30; mr-30;" align="justify" style="margin-left: 75px; margin-right: 75px">
            {{$no++}}. {{ $data }}
        </div>
        @endforeach
        <br>

        Meningat :
        <?php $no = 1; ?>
        @foreach ($cetakJson->mengingat as $data)
        <div class="col-sm; ml-30; mr-30;" align="justify" style="margin-left: 75px; margin-right: 75px">
            {{$no++}}. {{ $data }}
        </div>
        @endforeach

        <br>

        <div class="row" align="center">
        MEMUTUSKAN:
        </div>
        <br>

        Menetapkan:
        <?php $no = 1; ?>
        @foreach ($cetakJson->menetapkan as $data)
        <div class="col-sm; ml-30; mr-30;" align="justify" style="margin-left: 75px; margin-right: 75px">
            {{$no++}}. {{ $data }}
        </div>
        @endforeach

        <br>
        <br>
        <br>
        <div align="left">
            <div style="font-size: 16px">{{ \Carbon\Carbon::parse($cetak->tgl_validasi)->isoformat('dddd, D-MMMM-Y') }}</div>
            <div style="font-size: 16px">{{ $cetak->validasi->jabatan}}</div>
            <div><img src="{{ public_path("/validasi/". $cetak->validasi->tanda_tangan. ".png")}}" alt="{{ $cetak->validasi->tanda_tangan}}.png"  width="100" height="100"/></div>
            <div style="font-size: 16px"><b><u>{{ $cetak->validasi->nama_pejabat}}</u></b></div>
            <!--Nama Pengirim-->
            <div style="font-size: 16px">NIK : {{ $cetak->validasi->tanda_tangan}}"</div>
            <!--NIK Pengirim-->
        </div>
    </div>
</body>
</html>

