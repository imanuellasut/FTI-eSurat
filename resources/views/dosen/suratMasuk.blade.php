@extends('dosen.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/dosen/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/dosen/surat-masuk" class="mm-active">
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
        <ul>
            <li>
                <a href="/dosen/pengajuan-surat/surat-tugas">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/dosen/pengajuan-surat/surat-keterangan">
                    <i class="metismenu-icon"></i>
                    Surat Keterangan
                </a>
            </li>
            <li>
                <a href="/dosen/pengajuan-surat/berita-acara">
                    <i class="metismenu-icon"></i>
                    Berita Acara
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
                            <?php $no=1; ?>
                            @foreach ($suratMasuk as $data )
                            <tbody>
                            @if($data->user->id === Auth::user()->id && $data->tipe_surat == 'masuk')
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ $data->nama_jenis_surat }}</td>
                                    <td>{{ $data->tgl_pelaksanaan }}</td>
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
                                    <td>
                                        <div class="mb-1">
                                            <button type="button" class="btn badge badge-secondary border-0" data-toggle="modal" data-target="#lihatSurat">
                                                <i class='bx bxs-show bx-xs'></i>
                                            </button>
                                        </div>

                                        @if($data->id_jenis_surats == 'B' && $data->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat-masuk/surat-keterangan/cetak-{{ $data->id}}" class="badge badge-success" title="Surat Keterangan">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($data->id_jenis_surats == 'D' && $data->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat-masuk/surat-tugas/cetak-{{ $data->id}}" class="badge badge-success" title="Surat Tugas">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($data->id_jenis_surats == 'E' && $data->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat-masuk/berita-acara/cetak-{{ $data->id}}" class="badge badge-success" title="Berita Acara">
                                                    <i class='bx bxs-download bx-xs' title="Berita Acara"></i>
                                                </a>
                                            </div>
                                        @endif
                                        <div class="mt-1">
                                            <button type="button" class="btn badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal">
                                                <i class='bx bxs-trash bx-xs'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ $data->pesan }}</td>
                                </tr>
                            @endif
                            </tbody>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Info Lihat Surat Keluar -->
    @foreach ($suratMasuk as $data )
    @if($data->user->id === Auth::user()->id)
        <div class="modal fade" id="lihatSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
                    </div>
                    <div class="modal-bodys">
                        <p class="mb-2 ml-2">
                            Jenis Surat  : {{ $data->nama_jenis_surat }}
                            <br/>Prihal  : {{ $data->prihal }}
                            <br/>Jam     : {{ $data->waktu_pelaksanaan }}
                            <br/>Tanggal : {{ $data->tgl_pelaksanaan }}
                            <br/>Keterangan : {{ $data->keterangan }}
                            </p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
<!-- End Info Lihat Surat Keluar -->
