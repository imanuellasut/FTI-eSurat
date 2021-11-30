@extends('mahasiswa.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/dashboard" class="mm-active">
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
        <ul class="">
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

        <div class="col-lg-6 col-xl-6">
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

        <div class="col-lg-6 col-xl-6 ">
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

        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Pengajuan Surat</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Tgl.Pelaksanaan</th>
                                    <th>Jam</th>
                                    <th>Prihal</th>
                                    <th>Status</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>

                            <?php $no=1; ?>
                            @foreach ($surat as $data )
                            @if($data->user->id === Auth::user()->id)

                            <tbody>
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td></td>
                                    <td>{{ $data->nama_jenis_surat }}</td>
                                    <td>{{ $data->tgl_pelaksanaan }}</td>
                                    <td>{{ $data->waktu_pelaksanaan }}</td>
                                    <td>{{ $data->prihal }}</td>
                                    <td>
                                        @if($data->status == 'diterima')
                                            <small class="badge badge-pill badge-success">diTerima</small>
                                        @elseif ($data->status == 'ditolak')
                                            <small class="badge badge-pill badge-danger">ditolak</small>
                                        @else
                                            <small class="badge badge-pill badge-warning">diproses</small>
                                        @endif
                                    </td>
                                    <td>{{ $data->pesan }}</td>
                                </tr>
                            </tbody>

                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
