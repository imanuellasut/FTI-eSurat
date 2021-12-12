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
        </ul>
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
    @endsection
    @section('arsipSurat')
        <a href="/admin/arsip-surat">
            <i class="metismenu-icon bx bxs-bookmarks"></i>
            Arsip Surat
        </a>
    @endsection

<!-- End Menu SideBar -->

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Surat Tugas</h5>
            <form method="post" action="{{ url('admin/surat/update-surat-tugas', $surat->id) }}">
                @csrf

                <!--Hidden Inputan -->
                    <input type="hidden" name="tipe_surat" value="Masuk">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Surat</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control"
                    value="{{ $surat->prihal }}" disabled>
                <div class="position-relative form-group mt-2">
                    <label for="nama_mitra" class="">Pelaksana Tugas</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Pelaksana Tugas" type="text" class="form-control"
                    value="{{ $surat->nama_mitra }}" disabled>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="lokasi" class="">Tempat</label>
                            <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control"
                            value="{{ $surat->lokasi }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal Pelaksanaan</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tanggal Pelaksanaan" type="date" class="form-control"
                            value="{{ $surat->tgl_pelaksanaan }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="keterangan" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" value="" disabled>{{ $surat->keterangan }}</textarea>
                </div>
                <div class="position-relative form-group">
                    <label for="status" class="">Validasi Surat</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">--- Pilih ---</option>
                        <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                        <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }} >diterima</option>
                    </select>
                </div>
                <div class="position-relative form-group" id="ditolak">
                    <script>
                    function checkAlert(evt) {
                        if (evt.target.value === "ditolak") {
                            alert('Hello');
                        }
                    }
                </script>
                </div>

                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                <a href="/admin/surat" class="mt-2 btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
