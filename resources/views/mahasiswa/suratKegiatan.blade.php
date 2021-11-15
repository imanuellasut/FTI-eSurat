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
                <a href="/mahasiswa/pengajuan-surat/surat-kegiatan" class="mm-active">
                    <i class="metismenu-icon"></i>
                    Surat Kegiatan
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
        <div class="card-body"><h5 class="card-title">Form Surat Kegiatan</h5>
            <form class="">
                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Surat</label>
                    <input name="address" id="prihal" placeholder="Prihal Surat" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="id_user" class="">NIM</label>
                            <input name="id_user" id="id_user" placeholder="NIM" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nama</label>
                            <input name="password" id="examplePassword11" placeholder="Nama" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="mitra" class="">Penyelengara Kegiatan</label>
                    <input name="mitra" id="mitra" placeholder="Penyelengara kegiatan" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="id_user" class="">Tempat</label>
                            <input name="id_user" id="id_user" placeholder="Tempat" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name" class="">Tanggal Pelaksanaan</label>
                            <input name="password" id="examplePassword11" placeholder="Nama" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="mitra" class="">Keterangan</label>
                    <textarea name="text" id="mitra" class="form-control"></textarea>
                </div>
                <button class="mt-2 btn btn-primary">Buat</button>
                <button class="mt-2 btn btn-primary">Batal</button>
            </form>
        </div>
    </div>
@endsection