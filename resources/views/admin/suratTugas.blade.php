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
                <a href="/admin/buat-surat/surat-tugas" class="mm-active">
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

        <div class="card-body"><h5 class="card-title">Form Surat Tugas</h5>
            <form class="" action="{{ route('admin-simpan-surat-tugas') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="D">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Tugas">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->
                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal Surat</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control">
                </div>

                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="id_pengaju" class="">ID (NIK/NIK)</label>
                            <input name="id_pengaju[]" id="id_pengaju" placeholder="NIM/NIK" type="text" class="form-control" value="{{ old('id_user') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="nama_pengaju" class="">Nama</label>
                            <input name="nama_pengaju[]" id="nama_pengaju" placeholder="Nama" type="text" class="form-control" value="{{ old('id_user') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="nama_pengaju" class="">Action</label>
                            <a href="#" class="tambahPengaju btn btn-info form-control">Tambah</a>
                        </div>
                    </div>
                </div>

                {{-- <table class="table" id="multiForm">
                    <tr>
                        <th>ID (NIK / NIM)</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="multiInput[0][id_pengaju]" class="form-control"/></td>
                        <td><input type="text" name="multiInput[0][nama_pengaju]" class="form-control"/></td>
                        <td><input type="button" name="add" value="Tambah" id="addRemoveIp" class="btn btn-outline-dark"></td>
                    </tr>
                </table> --}}

                <div class="suratTugas"></div>

                <div class="position-relative form-group">
                    <label for="nama_mitra" class="">Mitra</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra" type="text" class="form-control">
                </div>

                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal Pelaksanaan</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="tgl_pelaksanaan" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="position-relative form-group">
                            <label for="lokasi" class="">Tempat</label>
                            <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="position-relative form-group">
                    <label for="keterangan" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
                <button class="mt-2 btn btn-primary" type="submit">Buat</button>
                <a href="/admin/surat" class="mt-2 btn btn-secondary">Batal</a>
            </form>

            {{-- <!-- JavaScript -->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                    var url = "{{ url('add-remove-input-fields') }}";
                    var i=1;
                    $('#add').click(function(){
                        i++;
                        $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="id_pengaju[]" placeholder="Masukan NIK / NIM" class="form-control name_list" id="title"></td><td><input type="text" name="nama_pengaju[]" placeholder="Masuk Nama" class="form-control name_list" id="title"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });
                    $(document).on('click', '.btn_remove', function(){
                        var button_id = $(this).attr("id");
                        $('#row'+button_id+'').remove();
                    });
                });
                </script>
            <!--End JavaScript --> --}}

            <!-- JavaScript -->
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
                <script type="text/javascript">

                    $(' .tambahPengaju').on('click', function() {
                        tambahPengaju();
                    });

                    function tambahPengaju(){
                        var suratTugas = '<div><div class="form-row"><div class="col-md-4"><div class="position-relative form-group"><input name="id_pengaju[]" id="id_pengaju" placeholder="NIM/NIK" type="text" class="form-control" value="{{ old('id_pengaju') }}"></div></div><div class="col-md-6"><div class="position-relative form-group"><input name="nama_pengaju[]" id="nama_pengaju" placeholder="Nama" type="text" class="form-control" value="{{ old('nama_pengaju') }}"></div></div><div class="col-md2"><div class="position-relative form-group"><a href="#" class="hapus btn btn-danger form-control">Hapus</a></div></div></div></div>';
                        $(' .suratTugas').append(suratTugas);
                    };

                    $(' .hapus').live('click', function(){
                        $(this).parent().parent().parent().remove();
                    });

                </script>
            <!--End JavaScript -->

            {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                var i = 0;
                $("#addRemoveIp").click(function () {
                    ++i;
                    $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][id_pengaju]" class="form-control" /></td><td><input type="text" name="multiInput['+i+'][nama_pengaju]" class="form-control" /></td><td><button type="button" class="remove-item btn btn-danger">Hapus</button></td></tr>');
                });
                $(document).on('click', '.remove-item', function () {
                    $(this).parents('tr').remove();
                });
            </script> --}}

        </div>
    </div>
@endsection


<div class="row"> <div class="col-4"><input type="text" class="form-control " id="no_induk" name="no_induk"  placeholder="Masukkan Nomor Induk" ></div><div class="col-6"><input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" ></div><div class="col-2"><div ><a href="#" class="hapus btn btn-info form-control">Hapus</a></div></div> </div>
