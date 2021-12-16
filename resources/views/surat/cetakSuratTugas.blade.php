<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style>
        .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    grid-gap: 10px;
    background-color: #2196F3;
    padding: 10px;
    }

    .grid-container > div {
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    padding: 20px 0;
    font-size: 30px;
    }

    .item1 {
    grid-column-start: 1;
    grid-column-end: 3;
    }
    </style>
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
        <h2><u>{{ $cetak->nama_jenis_surat}}</u></h2>
        <h3>No. : {{ $cetak->no_surat}} </h3>
    </div>
    <br>

    <div class="col-sm; ml-10; mr-10;" align="justify">
        <div style="font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Dengan ini {{ $cetak->validasi->jabatan}} Fakultas Teknologi Informasi Universitas Kristen Duta Wacana memberikan tugas kepada :
        </div><br>
        @if(is_null($cetak->idPengaju) && $cetak->user->role === '2')
            <?php $no = 1; ?>
            <table width="60%" align="center">
            <tr>
                <td width="25%">
                    <font size="15px"><b>Nama</b></font>
                </td>
                <td width="5%"><b>:</b></td>
                <td><b>{{ $cetak->user->name }}</b></td>
            </tr>
            <tr>
                <td>
                    <font size="15px"><b>Nomer Induk</b></font>
                </td>
                <td><b>:</b></td>
                <td><b>{{ $cetak->user->id_user }}</b></td>
            </tr>
            </table>
        @elseif (is_null($cetak->idPengaju) && $cetak->user->role === '3')
            <?php $no = 1; ?>
            @foreach ($cetak as $data )
            <table align="center" style="border-collapse: collapse, border: 1px solid black">
                <tr >
                    <th width="30px" style="border: 1px solid black">NO</th>
                    <th width="200px" style="border: 1px solid black">Nama</th>
                    <th width="150px" style="border: 1px solid black">NIM</th>
                </tr>
                <tr style="text-align: center">
                    <td style="border: 1px solid black">{{$no++}}</td>
                        <td>{{ $data->user->name}}</td>
                        <td>{{ $data->user->id_user}}</td>
                </tr>
            </table>
            @endforeach
        @else
        <div>
            <div style="float:center">
                    <?php $no = 1; ?>
                <table  style="float: left;" border="1">
                    <tr >
                        <th width="50px" >NO</th>
                        <th width="250px" >Nama</th>
                    </tr>
                    @foreach ($namaPengaju as $namaPengaju )
                    <tr style="text-align: center">
                            <td >{{$no++}}</td>
                            <td>{{ $namaPengaju }}</td>
                    @endforeach
                    </tr>
                </table></div>
                <table  style="float: left;" border="1">
                <tr >
                        <th width="100px" >Nim</th>
                    </tr>
                    @foreach ($idPengaju as $idPengaju )
                    <tr style="text-align: center">
                        <td>{{ $idPengaju }}</td>
                    @endforeach
                    </tr>
                </table></div>
            </div>
            <div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        @endif
        </div>
            <div style="font-size: 16px;">Untuk mengikuti {{$cetak->perihal}} yang dilaksanakan oleh Mitra {{$cetak->nama_mitra}},
            pada tanggal {{ \Carbon\Carbon::parse($cetak->tgl_pelaksanaan)->isoformat('dddd, D-MMMM-Y') }}</div>
            <br>
            <div style="font-size: 16px;">Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya.
                Kepada penerima tugas setelah menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas.</div>
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
