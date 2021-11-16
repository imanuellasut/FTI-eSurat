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
        <a href="/mahasiswa/surat-keluar" class="mm-active">
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
                                <?php $no=1; ?>
                                @foreach ($suratKeluar as $data )

                                @if($data->user->id === Auth::user()->id)
                                    <tr>
                                        <th scope="row">{{ $no++}}</th>
                                        <td>{{ $data->tgl_pelaksanaan }}</td>
                                        <td>{{ $data->nama_jenis_surat}}</td>
                                        <td>{{ $data->prihal }}</td>
                                        <td>{{ $data->keterangan }}</td>
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
                                            <div>
                                                <a href="" class="badge badge-danger">
                                                    <i class='bx bxs-trash bx-xs'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
