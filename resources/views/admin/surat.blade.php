@extends('admin.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/admin/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/admin/surat" class="mm-active">
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
        <ul>
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
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Data surat</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <tr>
                                <th>#</th>
                                <th>Pengaju</th>
                                <th>Jenis Surat</th>
                                <th>Tgl.Pelaksanaan</th>
                                <th>Prihal</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Pesan</th>
                            </tr>
                        <?php $no=1; ?>
                        @foreach ($allSurats as $surat )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $surat->user->id_user}}</td>
                                <td>{{ $surat->nama_jenis_surat}}</td>
                                <td>{{ $surat->tgl_pelaksanaan }}</td>
                                <td>{{ $surat->prihal }}</td>
                                <td>
                                    @if($surat->status == 'diterima')
                                        <small class="badge badge-pill badge-success">diTerima</small>
                                    @elseif ($surat->status == 'ditolak')
                                        <small class="badge badge-pill badge-danger">ditolak</small>
                                    @else
                                        <small class="badge badge-pill badge-warning">diproses</small>
                                    @endif
                                </td>
                                <td class="row">
                                    <div class="col-1">
                                        <a href="surat/edit-surat/id-{{ $surat->id }}" class="badge badge-info">
                                            <i class='bx bxs-edit bx-xs'></i>
                                        </a>
                                    </div>
                                    <div class="col-2 ml-3 mr-0">
                                        <a href="surat/cetak-{{ $surat->id}}" class="badge badge-success">
                                            <i class='bx bxs-download bx-xs'></i>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="" class="badge badge-danger">
                                            <i class='bx bxs-trash bx-xs'></i>
                                        </a>
                                    </div>
                                </td>
                                <td> {{ $surat->pesan_status }}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
