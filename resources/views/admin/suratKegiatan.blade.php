@extends('admin.main')


<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/admin/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/admin/surat" class="">
            <i class="metismenu-icon bx bxs-envelope"></i>
            Data Surat
        </a>
    @endsection

    @section('buatSurat')
        <a href="#">
            <i class="metismenu-icon bx bxs-message-square-add"></i>
            Buat Surat
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul class="mm-show">
            <li>
                <a href="/admin/buat-surat/surat-tugas" class="">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-kegiatan" class="mm-active">
                    <i class="metismenu-icon"></i>
                    Surat Kegiatan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/SK-Dekan">
                    <i class="metismenu-icon"></i>
                    Surat SK Dekan
                </a>
            </li>
        </ul>
    @endsection

    @section('arsipSurat')
        <a href="/admin/arsip-surat">
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
                            <label for="id_user" class="">ID (NIK/NIK)</label>
                            <input name="id_user" id="id_user" placeholder="NIM/NIK" type="text" class="form-control">
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
                    <label for="mitra" class="">Pelaksana Tugas</label>
                    <input name="mitra" id="mitra" placeholder="Pelaksana Tugas" type="text" class="form-control">
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