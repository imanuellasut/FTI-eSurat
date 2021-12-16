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

    @section('pejabat')
        <a href="/admin/pejabat">
            <i class='metismenu-icon bx bxs-user-plus'></i>
            Pejabat
        </a>
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
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <!-- Surat Berhasil -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="main-card mb-3 card">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status')  }}
                    </div>
                @endif
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
                                    <!-- Button Validasi -->
                                        @if ($surat->id_jenis_surats == 'A')
                                            <div class="">
                                                <a href="#" class="badge badge-info" data-toggle="modal" data-target="#suratkeputusan{{ $surat->id }}">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Keputusan"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'B')
                                            <div class="">
                                                <a href="#" class="badge badge-info" data-toggle="modal" data-target="#suratketerangan{{ $surat->id }}">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Keterangan"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'C')
                                            <div class="">
                                                <a href="#" class="badge badge-info" data-toggle="modal" data-target="#suratundangan{{ $surat->id }}">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Undangan"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'D')
                                            <div class="">
                                                <a href="#" class="badge badge-info" data-toggle="modal" data-target="#surattugas{{ $surat->id }}">
                                                    <i class='bx bxs-edit bx-xs' title="Surat Tugas"></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'E')
                                            <div class="">
                                                <a href="#" class="badge badge-info" data-toggle="modal" data-target="#beritaacara{{ $surat->id }}">
                                                    <i class='bx bxs-edit bx-xs' title="Berita Acara"></i>
                                                </a>
                                            </div>
                                        @endif
                                    <!-- End Button Edit -->

                                    <!-- Button Download -->
                                        @if ($surat->id_jenis_surats == 'A' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/surat-keputusan/cetak-{{ $surat->id}}" class="badge badge-success" title="Surat Keputusan">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'B' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/surat-keterangan/cetak-{{ $surat->id}}" class="badge badge-success" title="Surat Keterangan">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'C' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/surat-undangan/cetak-{{ $surat->id}}" class="badge badge-success" title="Surat Undangan">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'D' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/surat-tugas/cetak-{{ $surat->id}}" class="badge badge-success" title="Surat Tugas">
                                                    <i class='bx bxs-download bx-xs'></i>
                                                </a>
                                            </div>
                                        @elseif($surat->id_jenis_surats == 'E' && $surat->status == 'diterima' )
                                            <div class="mt-1">
                                                <a href="surat/berita-acara/cetak-{{ $surat->id}}" class="badge badge-success" title="Berita Acara">
                                                    <i class='bx bxs-download bx-xs' title="Berita Acara"></i>
                                                </a>
                                            </div>
                                        @endif
                                    <!-- End Button Download -->

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


<!-- Pup Up Validasi Surat Keputusan-->
    @foreach ($allSurats as $surat )
    <div class="modal fade" id="suratkeputusan{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="ssuratkeputusanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ssuratkeputusanLabel">Validasi Surat Keputusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>: {{ $surat->nama_jenis_surat }}</td>
                        </tr>
                        <tr>
                            <th>Prihal</th>
                            <td>: {{ $surat->prihal }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>: {{ $surat->nama_mitra }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $surat->tgl_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $surat->keterangan }}</td>
                        </tr>
                    </table>

                    <form method="post" action="{{ url('admin/surat/validasi', $surat->id) }}">
                        @csrf

                        <!--Hidden Inputan -->
                            <input type="hidden" name="tipe_surat" value="Masuk">
                            <input type="hidden" name="no_surat" value="{{ $validasiA }}/{{ $surat->id_jenis_surats }}/FTI/<?php echo date("Y") ?>">
                            <input type="hidden" name="tgl_validasi" id="tgl_validasi" placeholder="tgl_validasi" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                        <!--End Hidden Inputan -->

                        <label for="status" class="">Status Surat</label>
                        <select onchange="checkAlert(event)" name="status" id="status" class="form-control">
                            <option value="">--- Pilih Status Surat ---</option>
                            <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                            <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                        </select>

                        <label for="pesan_status" class="mt-1" style="color: red">Berikan Pesan Jika Pengajuan Ditolak</label>
                        <input name="pesan_status" id="pesan_status" placeholder="Pesan Ditolak" type="text" class="form-control">

                        <label for="id_validasi" class="mt-1">Tanda Tangan</label>
                        <select name="id_validasi" id="id_validasi" class="form-control">
                            <option value="0">--- Pilih Pejabat ---</option>
                            <option value="1" {{ $surat->validasi->id_validasi == '1' ? 'selected' : '' }}>Ir. Henry Feriadi, M.Sc., Ph.D. - Rektor</option>
                            <option value="2" {{ $surat->validasi->id_validasi == '2' ? 'selected' : '' }}>Restyandito, S.Kom., MSIS, Ph.D. - Dekan</option>
                            <option value="3" {{ $surat->validasi->id_validasi == '3' ? 'selected' : '' }}>Drs. Jong Jek Siang, M.Sc. - Ka.Prodi</option>
                            <option value="4" {{ $surat->validasi->id_validasi == '4' ? 'selected' : '' }}>Drs. Wimmie Handiwidjojo, MIT - Kepala Biro 1</option>
                            <option value="5" {{ $surat->validasi->id_validasi == '5' ? 'selected' : '' }}>Budi Sutedjo DO, S.Kom, MM. - Wali Studi</option>
                        </select>

                        <button type="submit" class="mt-2 btn btn-primary">Validasi</button>
                        <a href="#" class="mt-2 btn btn-secondary" data-dismiss="modal">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- End Pup Up Validasi -->

<!-- Pup Up Validasi Surat Keterangan-->
    @foreach ($allSurats as $surat )
    <div class="modal fade" id="suratketerangan{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="suratketeranganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suratketeranganLabel">Validasi Surat Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>: {{ $surat->nama_jenis_surat }}</td>
                        </tr>
                        <tr>
                            <th>Prihal</th>
                            <td>: {{ $surat->prihal }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>: {{ $surat->nama_mitra }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $surat->tgl_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $surat->keterangan }}</td>
                        </tr>
                    </table>

                    <form method="post" action="{{ url('admin/surat/validasi', $surat->id) }}">
                        @csrf

                        <!--Hidden Inputan -->
                            <input type="hidden" name="tipe_surat" value="Masuk">
                            <input type="hidden" name="no_surat" value="{{ $validasiB }}/{{ $surat->id_jenis_surats }}/FTI/<?php echo date("Y") ?>">
                            <input type="hidden" name="tgl_validasi" id="tgl_validasi" placeholder="tgl_validasi" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                        <!--End Hidden Inputan -->

                        <label for="status" class="">Status Surat</label>
                        <select onchange="checkAlert(event)" name="status" id="status" class="form-control">
                            <option value="">--- Pilih Status Surat ---</option>
                            <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                            <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                        </select>

                        <label for="pesan_status" class="mt-1" style="color: red">Berikan Pesan Jika Pengajuan Ditolak</label>
                        <input name="pesan_status" id="pesan_status" placeholder="Pesan Ditolak" type="text" class="form-control">

                        <label for="id_validasi" class="mt-1">Tanda Tangan</label>
                        <select name="id_validasi" id="id_validasi" class="form-control">
                            <option value="0">--- Pilih Pejabat ---</option>
                            <option value="1" {{ $surat->validasi->id_validasi == '1' ? 'selected' : '' }}>Ir. Henry Feriadi, M.Sc., Ph.D. - Rektor</option>
                            <option value="2" {{ $surat->validasi->id_validasi == '2' ? 'selected' : '' }}>Restyandito, S.Kom., MSIS, Ph.D. - Dekan</option>
                            <option value="3" {{ $surat->validasi->id_validasi == '3' ? 'selected' : '' }}>Drs. Jong Jek Siang, M.Sc. - Ka.Prodi</option>
                            <option value="4" {{ $surat->validasi->id_validasi == '4' ? 'selected' : '' }}>Drs. Wimmie Handiwidjojo, MIT - Kepala Biro 1</option>
                            <option value="5" {{ $surat->validasi->id_validasi == '5' ? 'selected' : '' }}>Budi Sutedjo DO, S.Kom, MM. - Wali Studi</option>
                        </select>

                        <button type="submit" class="mt-2 btn btn-primary">Validasi</button>
                        <a href="#" class="mt-2 btn btn-secondary" data-dismiss="modal">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- End Pup Up Validasi -->

<!-- Pup Up Validasi Surat undangan-->
    @foreach ($allSurats as $surat )
    <div class="modal fade" id="suratundangan{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="suratundanganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suratundanganLabel">Validasi Surat Undangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>: {{ $surat->nama_jenis_surat }}</td>
                        </tr>
                        <tr>
                            <th>Prihal</th>
                            <td>: {{ $surat->prihal }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>: {{ $surat->nama_mitra }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $surat->tgl_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $surat->keterangan }}</td>
                        </tr>
                    </table>

                    <form method="post" action="{{ url('admin/surat/validasi', $surat->id) }}">
                        @csrf

                        <!--Hidden Inputan -->
                            <input type="hidden" name="tipe_surat" value="Masuk">
                            <input type="hidden" name="no_surat" value="{{ $validasiC }}/{{ $surat->id_jenis_surats }}/FTI/<?php echo date("Y") ?>">
                            <input type="hidden" name="tgl_validasi" id="tgl_validasi" placeholder="tgl_validasi" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                        <!--End Hidden Inputan -->

                        <label for="status" class="">Status Surat</label>
                        <select onchange="checkAlert(event)" name="status" id="status" class="form-control">
                            <option value="">--- Pilih Status Surat ---</option>
                            <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                            <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                        </select>

                        <label for="pesan_status" class="mt-1" style="color: red">Berikan Pesan Jika Pengajuan Ditolak</label>
                        <input name="pesan_status" id="pesan_status" placeholder="Pesan Ditolak" type="text" class="form-control">

                        <label for="id_validasi" class="mt-1">Tanda Tangan</label>
                        <select name="id_validasi" id="id_validasi" class="form-control">
                            <option value="0">--- Pilih Pejabat ---</option>
                            <option value="1" {{ $surat->validasi->id_validasi == '1' ? 'selected' : '' }}>Ir. Henry Feriadi, M.Sc., Ph.D. - Rektor</option>
                            <option value="2" {{ $surat->validasi->id_validasi == '2' ? 'selected' : '' }}>Restyandito, S.Kom., MSIS, Ph.D. - Dekan</option>
                            <option value="3" {{ $surat->validasi->id_validasi == '3' ? 'selected' : '' }}>Drs. Jong Jek Siang, M.Sc. - Ka.Prodi</option>
                            <option value="4" {{ $surat->validasi->id_validasi == '4' ? 'selected' : '' }}>Drs. Wimmie Handiwidjojo, MIT - Kepala Biro 1</option>
                            <option value="5" {{ $surat->validasi->id_validasi == '5' ? 'selected' : '' }}>Budi Sutedjo DO, S.Kom, MM. - Wali Studi</option>
                        </select>

                        <button type="submit" class="mt-2 btn btn-primary">Validasi</button>
                        <a href="#" class="mt-2 btn btn-secondary" data-dismiss="modal">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- End Pup Up Validasi -->

<!-- Pup Up Validasi Surat Tugas-->
    @foreach ($allSurats as $surat )
    <div class="modal fade" id="surattugas{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="suratketeranganlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="suratketeranganlLabel">Validasi Surat Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>: {{ $surat->nama_jenis_surat }}</td>
                        </tr>
                        <tr>
                            <th>Prihal</th>
                            <td>: {{ $surat->prihal }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>: {{ $surat->nama_mitra }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $surat->tgl_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $surat->keterangan }}</td>
                        </tr>
                    </table>

                    <form method="post" action="{{ url('admin/surat/validasi', $surat->id) }}">
                        @csrf

                        <!--Hidden Inputan -->
                            <input type="hidden" name="tipe_surat" value="Masuk">
                            <input type="hidden" name="no_surat" value="{{ $validasiD }}/D/FTI/<?php echo date("Y") ?>">
                            <input type="hidden" name="tgl_validasi" id="tgl_validasi" placeholder="tgl_validasi" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                        <!--End Hidden Inputan -->

                        <label for="status" class="mt-1">Status Surat</label>
                        <select onchange="checkAlert(event)" name="status" id="status" class="form-control">
                            <option value="">--- Pilih Status Surat ---</option>
                            <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                            <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                        </select>

                        <label for="pesan_status" class="mt-1" style="color: red">Berikan Pesan Jika Pengajuan Ditolak</label>
                        <input name="pesan_status" id="pesan_status" placeholder="Pesan Ditolak" type="text" class="form-control">

                        <label for="id_validasi" class="mt-1">Tanda Tangan</label>
                        <select name="id_validasi" id="id_validasi" class="form-control">
                            <option value="">--- Pilih Pejabat ---</option>
                            <option value="1" {{ $surat->validasi->id_validasi == '1' ? 'selected' : '' }}>Ir. Henry Feriadi, M.Sc., Ph.D. - Rektor</option>
                            <option value="2" {{ $surat->validasi->id_validasi == '2' ? 'selected' : '' }}>Restyandito, S.Kom., MSIS, Ph.D. - Dekan</option>
                            <option value="3" {{ $surat->validasi->id_validasi == '3' ? 'selected' : '' }}>Drs. Jong Jek Siang, M.Sc. - Ka.Prodi</option>
                            <option value="4" {{ $surat->validasi->id_validasi == '4' ? 'selected' : '' }}>Drs. Wimmie Handiwidjojo, MIT - Kepala Biro 1</option>
                            <option value="5" {{ $surat->validasi->id_validasi == '5' ? 'selected' : '' }}>Budi Sutedjo DO, S.Kom, MM. - Wali Studi</option>
                        </select>

                        <button type="submit" class="mt-2 btn btn-primary">Validasi</button>
                        <a href="#" class="mt-2 btn btn-secondary" data-dismiss="modal">Kembali</a>
                        <p></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- End Pup Up Validasi -->

<!-- Pup Up Validasi Berita Acara-->
    @foreach ($allSurats as $surat )
    <div class="modal fade" id="beritaacara{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="beritaacaraLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="beritaacaraLabel">Validasi Berita Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>: {{ $surat->nama_jenis_surat }}</td>
                        </tr>
                        <tr>
                            <th>Prihal</th>
                            <td>: {{ $surat->prihal }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>: {{ $surat->nama_mitra }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ $surat->tgl_pelaksanaan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $surat->keterangan }}</td>
                        </tr>
                    </table>

                    <form method="post" action="{{ url('admin/surat/validasi', $surat->id) }}">
                        @csrf

                        <!--Hidden Inputan -->
                            <input type="hidden" name="tipe_surat" value="Masuk">
                            <input type="hidden" name="no_surat" value="{{ $validasiE }}/E/FTI/<?php echo date("Y") ?>">
                            <input type="hidden" name="tgl  _validasi" id="tgl_validasi" placeholder="tgl_validasi" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>">
                        <!--End Hidden Inputan -->

                        <label for="status" class="">Status Surat</label>
                        <select onchange="checkAlert(event)" name="status" id="status" class="form-control">
                            <option value="">--- Pilih Status Surat ---</option>
                            <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                            <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                        </select>

                        <label for="pesan_status" class="mt-1" style="color: red">Berikan Pesan Jika Pengajuan Ditolak</label>
                        <input name="pesan_status" id="pesan_status" placeholder="Pesan Ditolak" type="text" class="form-control">

                        <label for="id_validasi" class="mt-1">Tanda Tangan</label>
                        <select name="id_validasi" id="id_validasi" class="form-control">
                            <option value="0">--- Pilih Pejabat ---</option>
                            <option value="1" {{ $surat->validasi->id_validasi == '1' ? 'selected' : '' }}>Ir. Henry Feriadi, M.Sc., Ph.D. - Rektor</option>
                            <option value="2" {{ $surat->validasi->id_validasi == '2' ? 'selected' : '' }}>Restyandito, S.Kom., MSIS, Ph.D. - Dekan</option>
                            <option value="3" {{ $surat->validasi->id_validasi == '3' ? 'selected' : '' }}>Drs. Jong Jek Siang, M.Sc. - Ka.Prodi</option>
                            <option value="4" {{ $surat->validasi->id_validasi == '4' ? 'selected' : '' }}>Drs. Wimmie Handiwidjojo, MIT - Kepala Biro 1</option>
                            <option value="5" {{ $surat->validasi->id_validasi == '5' ? 'selected' : '' }}>Budi Sutedjo DO, S.Kom, MM. - Wali Studi</option>
                        </select>

                        <button type="submit" class="mt-2 btn btn-primary">Validasi</button>
                        <a href="#" class="mt-2 btn btn-secondary" data-dismiss="modal">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- End Pup Up Validasi -->
