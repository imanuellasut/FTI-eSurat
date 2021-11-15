@extends('admin.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/admin/dashboard" class="mm-active">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/admin/surat">
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
        <ul class="">
            <li>
                <a href="/admin/buat-surat/surat-tugas">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-kegiatan">
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
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <i class="bx bxs-envelope bx-lg"></i>
                    <div class="widget-content-left ml-1">
                        <div class="widget-heading">Surat Tugas</div>
                        <div class="widget-subheading">Total Surat Tugas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">
                            <span>1896</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-4 ">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <i class="bx bxs-envelope bx-lg"></i>
                    <div class="widget-content-left ml-1">
                        <div class="widget-heading">Surat Kegiatan</div>
                        <div class="widget-subheading">Total Surat Kegiatan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>1896</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-4 ">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <i class="bx bxs-envelope bx-lg"></i>
                    <div class="widget-content-left ml-1">
                        <div class="widget-heading">Surat SK Dekan</div>
                        <div class="widget-subheading">Total Surat Kegiatan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>1896</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Buat Surat</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Tgl.Pelaksanaan</th>
                                    <th>Prihal</th>
                                    <th>Action</th>
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
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>001/E/FTI/2022</td>
                                    <td>Surat SK Dekan</td>
                                    <td>12-01-2022</td>
                                    <td>Kerja Praktek</td>
                                    <td>
                                        <small class="badge badge-pill badge-success">Done</small>
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