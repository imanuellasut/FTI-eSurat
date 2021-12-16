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
    <hr>
    <table>
        <tr>
            <td>No </td>
            <td>: {{ $cetak->no_surat}}</td>
        </tr>
        <tr>
            <td>Hal </td>
            <td>: {{ $cetak->prihal }}</td>
        </tr>
        <tr>
            <td>Lampiran </td>
            <td>: -</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Kepada Yth : </td>
        </tr>
        <tr>
            <td>{{ $cetak->nama_mitra}}</td>
        </tr>
    </table>
    <br>
    <div class="col-sm; ml-10; mr-10;" align="justify">
        <div style="font-size: 16px">
            Dengan Hormat
        </div>
        <br>
        <div style="font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ $cetak->isi_surat }}
        </div>
        <br>
        <table>
            <tr>
                <td>Hari, Tanggal </td>
                <td>: {{ \Carbon\Carbon::parse($cetak->tgl_pelaksanaan)->isoformat('dddd') }}, {{ \Carbon\Carbon::parse($cetak->tgl_pelaksanaan)->isoformat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>: {{ \Carbon\Carbon::parse($cetak->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($cetak->waktu_selesai)->format('H:i') }} WIB</td>
            </tr>
            <tr>
                <td>Tempat </td>
                <td>: {{ $cetak->lokasi }}</td>
            </tr>
            <tr>
                <td>Tema </td>
                <td>: {{ $cetak->tema }}</td>
            </tr>
        </table>
        <br>
        <div style="font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ $cetak->keterangan }}. Demikian undangan ini kami sampaikan. mengingat pentingnya {{ $cetak->prihal }} maka {{ $cetak->nama_mitra }} dimohon
            hadir tepat pada waktunya. Atas perhatiannya, kami ucapkan terima kasih.
        </div>
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

