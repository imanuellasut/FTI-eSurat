@extends('mahasiswa.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/mahasiswa/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/mahasiswa/surat-masuk">
            <i class="metismenu-icon bx bxs-envelope"></i>
            Surat Masuk
        </a>
    @endsection

    @section('suratKeluar')
        <a href="/mahasiswa/surat-keluar">
            <i class="metismenu-icon bx bxs-paper-plane"></i>
            Surat Keluar
        </a>
    @endsection

    @section('pengajuanSurat')
        <a href="#">
            <i class="metismenu-icon bx bxs-message-square-add"></i>
            Pengajuan Surat
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul class="mm-show">
            <li>
                <a href="/mahasiswa/pengajuan-surat/surat-tugas" class="mm-active">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/mahasiswa/pengajuan-surat/surat-keterangan">
                    <i class="metismenu-icon"></i>
                    Surat Keterangan
                </a>
            </li>
        </ul>
    @endsection

    @section('arsipSurat')
        <a href="/mahasiswa/arsip-surat">
            <i class="metismenu-icon bx bxs-bookmarks"></i>
            Arsip Surat
        </a>
    @endsection

<!-- End Menu SideBar -->

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Surat Tugas</h5>
            <form class="" action="{{ route('simpan-surat-tugas') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="D">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Tugas">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="id_pengaju" class="">ID (NIK/NIK)</label>
                            <input name="idPengaju[]" onkeyup="isi_otomatis()" id="id_pengaju" placeholder="NIM/NIK" type="text" class="form-control" value="{{ old('id_user') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nama_pengaju" class="">Nama</label>
                            <input name="namaPengaju[]" id="name" placeholder="Nama" type="text" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="nama_pengaju" class="">Action</label>
                            <a href="#" class="tambahPengaju btn btn-info form-control">Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="suratTugas"></div>

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Tugas</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Tugas" type="text" class="form-control">
                </div>

                <div class="position-relative form-group">
                    <label for="nama_mitra" class="">Mitra</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra" type="text" class="form-control">
                </div>

                <div class="form-row">
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <label for="lokasi" class="">Tempat</label>
                            <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal Pelaksanaan</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="tgl_pelaksanaan" type="date" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="position-relative form-group">
                    <label for="keterangan" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
                <button class="mt-2 btn btn-primary" type="submit">Buat</button>
                <a href="/mahasiswa/surat-keluar" class="mt-2 btn btn-secondary">Kembali</a>
            </form>
            <!-- JavaScript -->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
                <script type="text/javascript">

                    $(' .tambahPengaju').on('click', function() {
                        tambahPengaju();
                    });

                    function tambahPengaju(){
                        var suratTugas = '<div><div class="form-row"><div class="col-md-4"><div class="position-relative form-group"><input name="idPengaju[]" id="id_pengaju" placeholder="NIM/NIK" type="text" class="form-control" value="{{ old('idPengaju[]') }}"></div></div><div class="col-md-6"><div class="position-relative form-group"><input name="namaPengaju[]" id="nama_pengaju" placeholder="Nama" type="text" class="form-control" value="{{ old('namaPengaju[]') }}"></div></div><div class="col-md2"><div class="position-relative form-group"><a href="#" class="hapus btn btn-danger form-control">Hapus</a></div></div></div></div>';
                        $(' .suratTugas').append(suratTugas);
                    };

                    $(' .hapus').live('click', function(){
                        $(this).parent().parent().parent().remove();
                    });
                </script>
            <!--End JavaScript -->
        </div>
    </div>
@endsection
