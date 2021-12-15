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

    <br>
    <div class="row" align="center">
        {{-- <h2><u>{{ $cetakSuratJson->nama_jenis_surat}}</u></h2>
        <h3>No. : {{ $cetakSuratJson->no_surat}} </h3> --}}
    </div>
    <br>

    <div class="col-sm; ml-10; mr-10;" align="justify">
        <div style="font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Dengan ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana memberikan tugas kepada :
        </div><br>
        <div class="col-sm">
            <?php $no = 1; ?>
            <table align="center" style="border-collapse: collapse, border: 1px solid black">
                <tr >
                    <th width="30px" style="border: 1px solid black">NO</th>
                    <th width="200px" style="border: 1px solid black">Nama</th>
                    <th width="150px" style="border: 1px solid black">NIM</th>
                </tr>
                <tr style="text-align: center">
                    <td style="border: 1px solid black">{{$no++}}</td>
                    @foreach ($pengaju as $data )
                    <td style="border: 1px solid black">{{ $data }}</td>
                    @endforeach

                    {{-- <td>{{ $cetak->id_pengaju }}</td>
                    <td>{{ $cetak->nama_pengaju }}</td>
                    <td>{{ $cetak->user->name}}</td>
                    <td>{{ $cetak->user->id_user}}</td> --}}
                </tr>
            </table>
        </div>

        <br>

        <div class="col-sm">
            <div style="font-size: 16px;">Untuk mengikuti {{$cetak->perihal}} yang dilaksanakan oleh Mitra {{$cetak->nama_mitra}},
                yang diselenggarakan oleh LPPM UKDW, pada tanggal {{$cetak->tgl_pelaksanaan}}.</div>
            <!---->
            <br>
            <div style="font-size: 16px;">Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya.
                Kepada penerima tugas setelah menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas.</div>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div align="left">
            <div style="font-size: 16px">{{ $cetak->tgl_validasi}}</div>
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

