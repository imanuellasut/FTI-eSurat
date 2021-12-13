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
                <a href="/mahasiswa/pengajuan-surat/surat-tugas">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/mahasiswa/pengajuan-surat/surat-keterangan" class="mm-active">
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
        <div class="card-body"><h5 class="card-title">Form Surat Keterangan</h5>
            <form class="" action="{{ route('simpan-surat-keterangan') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="B">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Keterangan">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="tema" class="">Tema </label>
                    <input name="tema" id="isi_surat" placeholder="Tema Surat" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="nama_mitra" class="">Mitra</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="lokasi" class="">Tempat</label>
                    <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="waktu_mulai" class="">Jam Mulai</label>
                            <input name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="waktu_selesai" class="">Jam Selesai</label>
                            <input name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tgl Pelaksanan" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="isi_surat" class="">Isi Surat</label>
                    <textarea name="isi_surat" id="isi_surat" class="form-control"></textarea>
                </div>
                <button type="submit" class="mt-2 btn btn-primary">Buat</button>
                <a href="/mahasiswa/surat-keluar" class="mt-2 btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

