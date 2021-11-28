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
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Edit Surat Kegiatan Mahasiswa</h5>
            <form method="post" action="{{ url('mahasiswa/surat-keluar/update-surat-kegiatan', $surat->id) }}">
                @csrf

                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="B">
                    <input type="hidden" name="nama_jenis_surat" value="Surat kegiatan Mahasiswa">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Surat</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control"
                    value="{{ $surat->prihal }}">
                <div class="position-relative form-group mt-2">
                    <label for="nama_mitra" class="">Nama Mitra</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Pelaksana Tugas" type="text" class="form-control"
                    value="{{ $surat->nama_mitra }}">
                </div>
                <div class="position-relative form-group">
                    <label for="lokasi" class="">Tempat</label>
                    <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control"
                    value="{{ $surat->lokasi }}">
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="waktu_pelaksanaan" class="">Waktu Pelaksanaan</label>
                            <input name="waktu_pelaksanaan" id="waktu_pelaksanaan" placeholder="Waktu Pelaksanaan" type="time" class="form-control"
                            value="{{ $surat->waktu_pelaksanaan }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal Pelaksanaan</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tanggal Pelaksanaan" type="date" class="form-control"
                            value="{{ $surat->tgl_pelaksanaan }}">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="keterangan" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" value="">{{ $surat->keterangan }}</textarea>
                </div>
                <button type="submit" class="mt-2 btn btn-primary">Update</button>
                <a href="/mahasiswa/surat-keluar" class="mt-2 btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

@endsection
