<?php

namespace Database\Seeders;

use App\Models\Homepage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageConfigTemplateKV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // purge the data first
        Homepage::truncate();

        // and insert the datas
        Homepage::insert([
            ['id' => 'judul_website', 'value' => 'Tarhilala'],
            ['id' => 'judul_header', 'value' => 'Selamat datang di Bank Sampah TARHILALA'],
            ['id' => 'subjudul_header', 'value' => 'Tempat yang tepat untuk memulai perubahan kecil namun signifikan bagi Lingkungan sekitar!'],
            ['id' => 'gambar_konten', 'value' => '1.png'],

            ['id' => 'judul_konten_1', 'value' => 'HI TEMAN TARHILALA'],
            ['id' => 'subjudul_konten_1', 'value' => 'Yuk, mari kita bergabung untuk menabung sampah di bank sampah! Dengan menabung sampah, kita bisa membantu mengurangi jumlah sampah di lingkungan sekitar kita dan memberikan kontribusi positif bagi lingkungan serta bumi yang kita tempati.'],
            ['id' => 'subjudul_konten_1_sub_a', 'value' => 'Dengan menabung sampah, kita dapat membantu mendorong pengelolaan sampah yang lebih efektif dan berkelanjutan, sehingga sampah-sampah yang seharusnya berakhir di tempat pembuangan akhir dapat diolah menjadi bahan baku yang berguna untuk industri lainnya. Jadi, mari kita bersama-sama menjadi bagian dari solusi untuk mengatasi masalah sampah dan menjaga lingkungan kita agar tetap bersih dan sehat. Ayo, mulai menabung sampah di bank sampah sekarang juga!'],
            ['id' => 'gambar_konten_1', 'value' => '2.png'],

            ['id' => 'judul_konten_2_a', 'value' => '3R'],
            ['id' => 'judul_konten_2_b', 'value' => 'REDUCE, REUSE, & RECYCLE'],

            ['id' => 'gambar_konten_2_sub_a', 'value' => '3.jpg'],
            ['id' => 'judul_konten_2_sub_a', 'value' => 'REDUCE'],
            ['id' => 'subjudul_konten_2_sub_a', 'value' => 'Mengurangi jumlah limbah yang dihasilkan dengan mengurangi penggunaan sumber daya alam dan bahan-bahan yang tidak dapat didaur ulang.'],

            ['id' => 'gambar_konten_2_sub_b', 'value' => '4.jpg'],
            ['id' => 'judul_konten_2_sub_b', 'value' => 'REUSE'],
            ['id' => 'subjudul_konten_2_sub_b', 'value' => 'Menggunakan kembali barang atau bahan yang masih bisa digunakan, bukan membuangnya setelah satu kali pemakaian.'],

            ['id' => 'gambar_konten_2_sub_c', 'value' => '5.jpg'],
            ['id' => 'judul_konten_2_sub_c', 'value' => 'RECYCLE'],
            ['id' => 'subjudul_konten_2_sub_c', 'value' => 'Mengubah sampah menjadi produk baru. Daur ulang adalah cara penting untuk menghemat sumber daya alam dan mengurangi polusi.'],

            ['id' => 'judul_konten_3', 'value' => 'Jenis - Jenis Sampah'],
            ['id' => 'judul_konten_3_sub_a', 'value' => 'Sampah organik'],
            ['id' => 'judul_konten_3_sub_b', 'value' => 'Sampah plastik'],
            ['id' => 'judul_konten_3_sub_c', 'value' => 'Sampah kaca'],
            ['id' => 'judul_konten_3_sub_d', 'value' => 'Sampah kertas'],
            ['id' => 'judul_konten_3_sub_e', 'value' => 'Sampah logam'],
            ['id' => 'judul_konten_3_sub_f', 'value' => 'Sampah elektronik'],

            ['id' => 'judul_konten_4', 'value' => 'Mekanisme Bank Sampah'],
            ['id' => 'judul_konten_4_sub_a', 'value' => 'Memilah sampah'],
            ['id' => 'sub_konten_4_sub_a', 'value' => 'Pisahkan sampah yang dapat didaur ulang dari sampah yang tidak dapat didaur ulang. Misalnya, pisahkan sampah organik, sampah plastik, sampah kertas, sampah logam, dan sebagainya.'],
            ['id' => 'judul_konten_4_sub_b', 'value' => 'Membersihkan Sampah'],
            ['id' => 'sub_konten_4_sub_b', 'value' => 'Sebelum mengirim sampah ke bank sampah, pastikan untuk membersihkannya terlebih dahulu, terutama untuk sampah organik yang mudah membusuk.'],
            ['id' => 'judul_konten_4_sub_c', 'value' => 'Memilah Berdasarkan Jenis'],
            ['id' => 'sub_konten_4_sub_c', 'value' => 'Setelah membersihkan sampah, pisahkan lagi berdasarkan jenisnya. Misalnya, pisahkan botol plastik dari kantong plastik. Hal ini juga akan memudahkan proses daur ulang sampah.'],
            ['id' => 'judul_konten_4_sub_d', 'value' => 'Mengompres Sampah'],
            ['id' => 'sub_konten_4_sub_d', 'value' => 'Jika memungkinkan, sebaiknya mengompres sampah terlebih dahulu agar ukuran sampah menjadi lebih kecil dan mudah untuk ditransportasi karena sampah yang sudah dikompresi akan meminimalkan kemungkinan tumpahan dan kebocoran saat diangkut.'],
            ['id' => 'judul_konten_4_sub_e', 'value' => 'Menghubungi Bank Sampah'],
            ['id' => 'sub_konten_4_sub_e', 'value' => 'Sebelum mengirim sampah ke bank sampah, pastikan untuk menghubungi pihak bank sampah terlebih dahulu. Hal ini penting untuk mengetahui jenis sampah yang diterima dan jam operasionalnya agar proses pengiriman sampah berjalan dengan lancar.'],
            ['id' => 'judul_konten_4_sub_f', 'value' => 'Pemberian insentif'],
            ['id' => 'sub_konten_4_sub_f', 'value' => 'Setelah sampah diterima oleh pihak bank sampah maka sampah akan ditimbang dan dicatat, setelah itu akan diberikan insentif berupa uang atau hadiah sebagai bentuk apresiasi atas partisipasi mereka dalam program pengelolaan sampah yang baik.'],

            ['id' => 'judul_daftar_blog', 'value' => 'Daftar Cerita Kami'],

            ['id' => 'judul_brand_footer', 'value' => 'Tarhilala'],
            ['id' => 'subjudul_brand_footer', 'value' => 'Membantu toba menjadi lebih bersih'],

            ['id' => 'profil_footer_alamat', 'value' => 'Jl. Lintas Balige - Siantar, Desa Tambunan, Lumban Pea'],
            ['id' => 'profil_footer_nophone', 'value' => '+1 5589 55488 55'],
            ['id' => 'profil_footer_alamat_email', 'value' => 'TARHILALA@gmail.com'],

            ['id' => 'paragraf_hak_cipta', 'value' => 'Hak Cipta  Bank Sampah Tarhilala  &copy; 2023']
        ]);
    }
}
