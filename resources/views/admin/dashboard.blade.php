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
                <a href="/admin/buat-surat/surat-keterangan">
                    <i class="metismenu-icon"></i>
                    Surat keterangan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-sk-dekan">
                    <i class="metismenu-icon"></i>
                    Surat SK Dekan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-undangan">
                    <i class="metismenu-icon"></i>
                    Surat Undangan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/berita-acara">
                    <i class="metismenu-icon"></i>
                    Berita Acara
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
                        <div class="widget-numbers text-info">
                            <span>{{ $validasiD }}</span>
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
                        <div class="widget-heading">Surat Keterangan Kegiatan</div>
                        <div class="widget-subheading">Total Surat Keterangan Kegiatan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>{{ $validasiB }}</span>
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
                        <div class="widget-heading">Surat keputusan Dekan</div>
                        <div class="widget-subheading">Total Surat keputusan Dekan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>{{ $validasiA }}</span>
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
                        <div class="widget-heading">Surat Undangan</div>
                        <div class="widget-subheading">Total Surat Undangan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>{{ $validasiC }}</span>
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
                        <div class="widget-heading">Surat Undangan</div>
                        <div class="widget-subheading">Total Surat Undangan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>{{ $validasiE }}</span>
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
                        <div class="widget-heading">Total Surat</div>
                        <div class="widget-subheading">Seluruh Surat</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">
                            <span>{{ $totalsurat }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Data Surat</h5>
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
                            <?php $no=1; ?>
                            <tbody>
                                @foreach ($allSurats as $surat )
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $surat->no_surat }}</td>
                                    <td>{{ $surat->nama_jenis_surat }}</td>
                                    @if(is_null($surat->tgl_pelaksanaan))
                                        <td>{{ $surat->tgl_mulai }} - {{ $surat->tgl_selesai }}</td>
                                    @else
                                        <td>{{ $surat->tgl_pelaksanaan }}</td>
                                    @endif
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
