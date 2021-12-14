@extends('admin.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/admin/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/admin/surat" class="">
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
        <ul class="mm-show">
            <li>
                <a href="/admin/buat-surat/surat-tugas" >
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
                <a href="/admin/buat-surat/surat-sk-dekan" class="mm-active">
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
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Surat Keputusan Dekan</h5>
            <form class="" action="{{ route('admin-simpan-surat-tugas') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="D">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Keputusan">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="tema" class="">Tentang</label>
                    <input name="tema" id="tema" placeholder="Tentang" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <label for="menimbang" class="">Menimbang</label>
                            <textarea name="menimbang[]" onkeyup="isi_otomatis()" id="menimbang" placeholder="Menimbang" type="text" class="form-control" value="{{ old('menimbang') }}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="nama_pengaju" class="">Action</label>
                            <a href="#" class="tambahMenimbang btn btn-info form-control">Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="menimbang"></div>

                <div class="form-row">
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <label for="mengingat" class="">Mengingat</label>
                            <textarea name="mengingat[]" onkeyup="isi_otomatis()" id="mengingat" placeholder="Mengingat" type="text" class="form-control" value="{{ old('mengingat') }}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="Action" class="">Action</label>
                            <a href="#" class="tambahMengingat btn btn-info form-control">Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="mengingat"></div>

                <div class="form-row">
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <label for="menetapkan" class="">Menetapkan</label>
                            <textarea name="menetapkan[]" onkeyup="isi_otomatis()" id="menetapkan" placeholder="Menetapkan" type="text" class="form-control" value="{{ old('menetapkan') }}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="Action" class="">Action</label>
                            <a href="#" class="tambahMenetapkan btn btn-info form-control">Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="menetapkan"></div>

                <button class="mt-2 btn btn-primary" type="submit">Buat</button>
                <a href="/admin/surat" class="mt-2 btn btn-secondary">Batal</a>
            </form>

            <!-- JavaScript -->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
                <script type="text/javascript">


                    $(' .tambahMenimbang').on('click', function() {
                        tambahMenimbang();
                    });

                    function tambahMenimbang(){
                        var menimbang = '<div class="form-row"><div class="col-md-10"><div class="position-relative form-group"><textarea name="menimbang[]" onkeyup="isi_otomatis()" id="menimbang" placeholder="Menimbang" type="text" class="form-control" value="{{ old('menimbang') }}"></textarea></div></div><div class="col-md-2"><div class="position-relative form-group"><a href="#" class="hapus btn btn-danger form-control">Hapus</a></div></div></div>';
                        $(' .menimbang').append(menimbang);
                    };

                    $(' .tambahMengingat').on('click', function() {
                        tambahMengingat();
                    });

                    function tambahMengingat(){
                        var mengingat = '<div class="form-row"><div class="col-md-10"><div class="position-relative form-group"><textarea name="mengingat[]" onkeyup="isi_otomatis()" id="mengingat" placeholder="Mengingat" type="text" class="form-control" value="{{ old('mengingat') }}"></textarea></div></div><div class="col-md-2"><div class="position-relative form-group"><a href="#" class="hapus btn btn-danger form-control">Hapus</a></div></div></div>';
                        $(' .mengingat').append(mengingat);
                    };

                    $(' .tambahMenetapkan').on('click', function() {
                        tambahMenetapkan();
                    });

                    function tambahMenetapkan(){
                        var menetapkan = '<div class="form-row"><div class="col-md-10"><div class="position-relative form-group"><textarea name="menetapkan[]" onkeyup="isi_otomatis()" id="menetapkan" placeholder="Menetapkan" type="text" class="form-control" value="{{ old('menetapkan') }}"></textarea></div></div><div class="col-md-2"><div class="position-relative form-group"><a href="#" class="hapus btn btn-danger form-control">Hapus</a></div></div></div>';
                        $(' .menetapkan').append(menetapkan);
                    };

                    $(' .hapus').live('click', function(){
                        $(this).parent().parent().parent().remove();
                    });

                </script>
            <!--End JavaScript -->
        </div>
    </div>
@endsection

