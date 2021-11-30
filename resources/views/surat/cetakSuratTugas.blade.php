<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

</head>
<body>
    <table>
            <tr>
                <td width="60px">
                    <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="60" height="80"/>
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
        <h2><u>{{ $cetak->nama_jenis_surat}}</u></h2>
        <h3>No. : 000/A.00/FTI/2021 </h3>
        <!--System-->
    </div>

    <br>

    <div class="col-sm; ml-10; mr-10;" align="justify">
        <div style="font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Dengan ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana memberikan tugas kepada :
        </div><br>
        <div class="col-sm">
            <?php $no = 1; ?>
            <table border="1" align="center">
                <tr>
                    <th width="30px">NO</th>
                    <th width="200px">Nama</th>
                    <th width="150px">NIM</th>
                </tr>
                <tr style="text-align: center">
                    <td>{{$no++}}</td>
                    <td>{{ $cetak->user->name}}</td>
                    <td>{{ $cetak->user->id_user}}</td>
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
            <div style="font-size: 16px">24 Januari 2020</div>
            <div style="font-size: 16px">Dekan,</div><br><br><br><br><br><br>
            <div style="font-size: 16px"><b><u>Restyandito, S.Kom., MSIS., Ph.D.</u></b></div>
            <!--Nama Pengirim-->
            <div style="font-size: 16px">NIK : 004 E 289</div>
            <!--NIK Pengirim-->
        </div>

</body>

</html>

