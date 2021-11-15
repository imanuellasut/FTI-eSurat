@extends('mahasiswa.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/mahasiswa/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/mahasiswa/surat-masuk" class="mm-active">
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
        <ul>
            <li>
                <a href="/mahasiswa/pengajuan-surat/surat-tugas">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/mahasiswa/pengajuan-surat/surat-kegiatan">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Surat Masuk</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Tgl.Pelaksanaan</th>
                                    <th>Prihal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>001/D/FTI/2022</td>
                                    <td>Surat Tugas</td>
                                    <td>12-01-2022</td>
                                    <td>Kerja Praktek</td>
                                    <td>
                                        <small class="badge badge-pill badge-success">Done</small>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <a href="" class="badge badge-danger">
                                                <i class='bx bxs-trash bx-xs'></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="" class="badge badge-success">
                                            <i class='bx bxs-download bx-xs'></i>
                                        </a>
                                        </div>
                                    </td>
                                    <td> - </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td> - </td>
                                    <td>Surat Tugas</td>
                                    <td>15-01-2022</td>
                                    <td>Studi Banding</td>
                                    <td>
                                        <small class="badge badge-pill badge-danger">Rejected</small>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <a href="" class="badge badge-danger">
                                                <i class='bx bxs-trash bx-xs'></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="" class="badge badge-success">
                                            <i class='bx bxs-download bx-xs'></i>
                                        </a>
                                        </div>
                                    </td>
                                    <td> Waktu Pelaksanaan terlalu mepet dengan kegiatan lain </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection