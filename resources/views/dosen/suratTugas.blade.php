@extends('dosen.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/dosen/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/dosen/surat-masuk">
            <i class="metismenu-icon bx bxs-envelope"></i>
            Surat Masuk
        </a>
    @endsection

    @section('suratKeluar')
        <a href="/dosen/surat-keluar">
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
                <a href="/dosen/pengajuan-surat/surat-tugas" class="mm-active">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
        </ul>
    @endsection

    @section('arsipSurat')
        <a href="/dosen/arsip-surat">
            <i class="metismenu-icon bx bxs-bookmarks"></i>
            Arsip Surat
        </a>
    @endsection

<!-- End Menu SideBar -->

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Surat Tugas</h5>
            <form class="" action="{{ route('simpan-surat-tugasDosen') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="D">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Tugas">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Surat</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control">
                </div>
                <div class="position-relative form-group mt-1">
                    <label for="nama_mitra" class="">Pelaksana Tugas</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Pelaksana Tugas" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group mt-1">
                            <label for="lokasi" class="">Tempat</label>
                            <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal Pelaksanaan</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tanggal Pelaksanaan" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="keterangan" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
                <button type="submit" class="mt-2 btn btn-primary">Buat</button>
                <a href="/dosen/surat-keluar" class="mt-2 btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

@endsection
