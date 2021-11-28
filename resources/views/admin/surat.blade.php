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
                                <td>{{ $surat->user->name}}<br/>{{ $surat->user->id_user}}</td>
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
                                <td>
                                    <!-- Button Edit -->
                                        @if ($surat->id_jenis_surats == 'A')
                                            <div class="">
                                                <a href="surat/edit-surat/id-{{ $surat->id }}" class="badge badge-info">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Personalia"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'B')
                                            <div class="">
                                                <a href="surat/edit-surat-kegiatan/id-{{ $surat->id }}" class="badge badge-info">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Kegiatan Mahasiswa"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'C')
                                            <div class="">
                                                <a href="surat/edit-surat-undangan/id-{{ $surat->id }}" class="badge badge-info">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Undangan"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'D')
                                            <div class="">
                                                <a href="surat/edit-surat-tugas/id-{{ $surat->id }}" class="badge badge-info">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Tugas"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'E')
                                            <div class="">
                                                <a href="surat/edit-surat/id-{{ $surat->id }}" class="badge badge-info">
                                                    <i class='bx bxs-edit bx-xs' title="Berita Acara"></i>
                                                </a>
                                            </div>
                                        @endif
                                    <!-- End Button Edit -->

                                    <!-- Button Download -->
                                        @if ($surat->id_jenis_surats == 'A' && $surat->status == 'diterima' )
                                            <div class="">
                                                <a href="surat/cetak-{{ $surat->id}}" class="badge badge-success">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'B' && $surat->status == 'diterima' )

                                        @elseif($surat->id_jenis_surats == 'C' && $surat->status == 'diterima' )

                                        @elseif($surat->id_jenis_surats == 'D' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/cetak-{{ $surat->id}}" class="badge badge-success">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'E' && $surat->status == 'diterima' )

                                        @endif
                                    <!-- End Button Download -->

                                    {{-- @if($surat->status == 'diterima')
                                    <div class="mt-1">
                                        <a href="surat/cetak-{{ $surat->id}}" class="badge badge-success">
                                            <i class='bx bxs-download bx-xs'></i>
                                        </a>
                                    </div>
                                    @endif --}}

                                    <div class="mt-1">
                                        <a href="surat/hapus-surat/id-{{ $surat->id }}" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Surat?')">
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
