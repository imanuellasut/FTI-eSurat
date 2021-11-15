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
        <a href="/dosen/surat-keluar" class="mm-active">
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
        <ul>
            <li>
                <a href="/dosen/pengajuan-surat/surat-tugas">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Surat Keluar</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tgl.Pelaksanaan</th>
                                    <th>Jenis Surat</th>
                                    <th>Prihal</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12-01-2022</td>
                                    <td>Surat Tugas</td>
                                    <td>Kerja Praktek</td>
                                    <td>Untuk Memungkinkan bahwa kita dapat</td>
                                    <td>
                                        <div class="mb-2">
                                            <a href="" class="badge badge-secondary">
                                                <i class='bx bxs-show bx-xs'></i>
                                            </a>
                                        </div>
                                        <div class="mb-2">
                                            <a href="" class="badge badge-info">
                                                <i class='bx bxs-edit bx-xs'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection