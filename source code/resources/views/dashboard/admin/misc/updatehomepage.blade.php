@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                Ubah Informasi di Halaman Beranda
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" enctype="multipart/form-data" method="post" action="{{ route('admin.homepage.update.push') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="judul_website">Judul Website</label>
                        <input type="text" value="{{ $jw }}" min="0" name="judul_website" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_header">Isi Header</label>
                        <input type="text" value="{{ $jh }}" min="0" name="judul_header" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_header">Isi sub-Header</label>
                        <input type="text" value="{{ $sjh }}" min="0" name="subjudul_header" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <p>
                            <span>Gambar Header</span><br>
                            <img src="{{ __('/homepage/'.$gk) }}" height="200px">
                        </p>
                        <input type="file" min="0" name="gambar_konten" class="form-control">
                    </div>


                    <div class="mb-5">
                        <label for="judul_konten_1">Judul Konten Pertama</label>
                        <input type="text" min="0" value="{{ $jk1 }}" name="judul_konten_1" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_konten_1">Subjudul Konten Pertama</label>
                        <input type="text" value="{{ $sjk1 }}" min="0" name="subjudul_konten_1" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_konten_1_sub_a">Isi Konten Pertama</label>
                        <input type="text" value="{{ $sjk1sa }}" min="0" name="subjudul_konten_1_sub_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <p>
                            <span>Gambar Konten Pertama</span><br>
                            <img src="{{ __('/homepage/'.$gk1) }}" height="200px">
                        </p>
                        <input type="file" min="0" name="gambar_konten_1" class="form-control">
                    </div>


                    <div class="mb-5">
                        <label for="judul_konten_2_a">Judul kecil konten Kedua </label>
                        <input type="text" value="{{ $jk2a }}" min="0" name="judul_konten_2_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_2_b">Judul besar konten kedua</label>
                        <input type="text" value="{{ $jk2b }}" min="0" name="judul_konten_2_b" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <p>
                            <span>Gambar sub-Konten kedua yang sebelah kiri</span><br>
                            <img src="{{ __('/homepage/'.$gk2sa) }}" height="200px">
                        </p>
                        <input type="file" min="0" name="gambar_konten_2_sub_a" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_2_sub_a">Judul sub-Konten kedua yang sebelah kiri</label>
                        <input type="text" value="{{ $jk2sa }}" min="0" name="judul_konten_2_sub_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_konten_2_sub_a">Isi sub-Konten kedua yang sebelah kiri</label>
                        <input type="text" value="{{ $sjk2sa }}" min="0" name="subjudul_konten_2_sub_a" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <p>
                            <span>Gambar sub-Konten kedua yang di tengah</span><br>
                            <img src="{{ __('/homepage/'.$gk2sb) }}" height="200px">
                        </p>
                        <input type="file" min="0" name="gambar_konten_2_sub_b" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_2_sub_b">Judul sub-Konten kedua di tengah</label>
                        <input type="text" value="{{ $jk2sb }}" min="0" name="judul_konten_2_sub_b" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_konten_2_sub_b">Isi sub-Konten kedua di tengah</label>
                        <input type="text" value="{{ $sjk2sb }}" min="0" name="subjudul_konten_2_sub_b" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <p>
                            <span>Gambar sub-Konten kedua di kanan</span><br>
                            <img src="{{ __('/homepage/'.$gk2sc) }}" height="200px">
                        </p>
                        <input type="file" min="0" name="gambar_konten_2_sub_c" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_2_sub_c">Judul sub-Konten kedua di kanan</label>
                        <input type="text" value="{{ $jk2sc }}" min="0" name="judul_konten_2_sub_c" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_konten_2_sub_c">Isi sub-Konten kedua di kanan</label>
                        <input type="text" value="{{ $sjk2sc }}" min="0" name="subjudul_konten_2_sub_c" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <label for="judul_konten_3">Judul Konten keempat</label>
                        <input type="text" value="{{ $jk3 }}" min="0" name="judul_konten_3" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_a">judul sub-Konten keempat yang pertama</label>
                        <input type="text" value="{{ $jk3sa }}" min="0" name="judul_konten_3_sub_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_b">judul sub-Konten keempat yang kedua</label>
                        <input type="text" value="{{ $jk3sb }}" min="0" name="judul_konten_3_sub_b" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_c">judul sub-Konten keempat yang ketiga</label>
                        <input type="text" value="{{ $jk3sc }}" min="0" name="judul_konten_3_sub_c" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_d">judul sub-Konten keempat yang keempat</label>
                        <input type="text" value="{{ $jk3sd }}" min="0" name="judul_konten_3_sub_d" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_e">judul sub-Konten keempat yang kelima</label>
                        <input type="text" value="{{ $jk3se }}" min="0" name="judul_konten_3_sub_e" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_3_sub_f">judul sub-Konten keempat yang keenam</label>
                        <input type="text" value="{{ $jk3sf }}" min="0" name="judul_konten_3_sub_f" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <label for="judul_konten_4">Judul Konten bagian kelima</label>
                        <input type="text" value="{{ $jk4 }}" min="0" name="judul_konten_4" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_a">judul sub-Konten kelima yang pertama</label>
                        <input type="text" value="{{ $jk4sa }}" min="0" name="judul_konten_4_sub_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_a">isi sub-Konten bagian kelima yang pertama</label>
                        <input type="text" value="{{ $sk4sa }}" min="0" name="sub_konten_4_sub_a" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_b">judul sub-Konten kelima yang kedua</label>
                        <input type="text" value="{{ $jk4sb }}" min="0" name="judul_konten_4_sub_b" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_b">isi sub-Konten bagian kelima yang kedua</label>
                        <input type="text" value="{{ $sk4sb }}" min="0" name="sub_konten_4_sub_b" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_c">judul sub-Konten kelima yang ketiga</label>
                        <input type="text" value="{{ $jk4sc }}" min="0" name="judul_konten_4_sub_c" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_c">isi sub-Konten bagian kelima yang ketiga</label>
                        <input type="text" value="{{ $sk4sc }}" min="0" name="sub_konten_4_sub_c" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_d">judul sub-Konten kelima yang keempat</label>
                        <input type="text" value="{{ $jk4sd }}" min="0" name="judul_konten_4_sub_d" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_d">isi sub-Konten bagian kelima yang keempat</label>
                        <input type="text" value="{{ $sk4sd }}" min="0" name="sub_konten_4_sub_d" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_e">judul sub-Konten kelima yang kelima</label>
                        <input type="text" value="{{ $jk4se }}" min="0" name="judul_konten_4_sub_e" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_e">isi sub-Konten bagian kelima yang kelima</label>
                        <input type="text" value="{{ $sk4se }}" min="0" name="sub_konten_4_sub_e" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="judul_konten_4_sub_f">judul sub-Konten kelima yang keenam</label>
                        <input type="text" value="{{ $jk4sf }}" min="0" name="judul_konten_4_sub_f" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="sub_konten_4_sub_f">isi sub-Konten bagian kelima yang keenam</label>
                        <input type="text" value="{{ $sk4sf }}" min="0" name="sub_konten_4_sub_f" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <label for="judul_daftar_blog">Judul Daftar Blog</label>
                        <input type="text" value="{{ $jdb }}" min="0" name="judul_daftar_blog" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <label for="judul_brand_footer">Judul Bagian Footer</label>
                        <input type="text" value="{{ $jbf }}" min="0" name="judul_brand_footer" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="subjudul_brand_footer">Subjudul Bagian Footer</label>
                        <input type="text" value="{{ $sjbf }}" min="0" name="subjudul_brand_footer" class="form-control" required>
                    </div>


                    <div class="mb-5">
                        <label for="profil_footer_alamat">Alamat Untuk Bagian Footer</label>
                        <input type="text" value="{{ $pfa }}" min="0" name="profil_footer_alamat" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="profil_footer_nophone">Nomor Telepon Untuk Bagian Footer</label>
                        <input type="text" value="{{ $pfnp }}" min="0" name="profil_footer_nophone" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="profil_footer_alamat_email">Alamat Surel Untuk Bagian Footer</label>
                        <input type="text" value="{{ $pfae }}" min="0" name="profil_footer_alamat_email" class="form-control" required>
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Update Data" class="btn btn-success">
                        <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
