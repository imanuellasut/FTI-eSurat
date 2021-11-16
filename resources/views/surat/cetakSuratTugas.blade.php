<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .halaman {
            width: 800;
            height: 842px;;
            background-color: #ffffff;
        }
        #h2 {
            color:black;
        }

        #isi {
            width: auto;
            height: auto;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 40px
            background-color: #ffffff;
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }

        #coeg {
            color: black;
        }

        #td {
            width: 200;
        }

        .upper { text-transform: uppercase; }
        .lower { text-transform: lowercase; }
        .cap   { text-transform: capitalize; }
        .small { font-variant:   small-caps; }

        .left    { text-align: left;}
        .right   { text-align: right;}
        .center  { text-align: center;}
        .justify { text-align: justify;}

        #justify { text-align: justify;}

    </style>
</head>
<body class="halaman">
     <div id="isi" style="border-radius: 10px;border: 10px solid #ffffff">
        <h2 id="h2"  style="text-transform: uppercase;" class="upper center">
            <b><u>{{ $cetak->nama_jenis_surat}}</u></b>
        </h2>
        <br>
        <br>
        <p id="justify">
        Dengan ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta
        memberikan Tugas kepada para mahasiswa dibawah ini :</p>
        <?php $no=1; ?>
        <table id="coeg" align="center" >
            <tr>
                <th width="30px">NO</th>
                <th width="200px">Nama</th>
                <th width="150px">NIM</th>
            </tr>
            <tr>
                <td>1 </td>
                <td>{{ $cetak->user->name}}</td>
                <td>{{ $cetak->user->id_user}}</td>
            </tr>
        </table>
        <p id="justify">
        Untuk Mengikuti {{ $cetak->prihal }} yang dilakukan PENYELENGARA ke MITRA, Kunjugan akan dilakukan pada
        Hari [ ], Tanggal [ ].</p>

        <p id="justify">
        Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya 
        kepada penerima tugas menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas</p>

        <br><br>
        <p>
            Dekan,
        </p>
        <br><br><br>
        <p><b><u>Restyandito, S.Kom., MSIS, Ph.D.</u></b></p>
        <p>NIK:400 E 289</p>
    </div>
</body>
</html>