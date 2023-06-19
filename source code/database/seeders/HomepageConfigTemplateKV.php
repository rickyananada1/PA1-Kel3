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
            [
                'id' => 'head',
                'value' => json_encode([
                    'title' => 'Selamat datang di Bank Sampah TARHILALA',
                    'subtitle' => 'Tempat yang tepat untuk memulai perubahan kecil namun signifikan bagi Lingkungan sekitar!',
                    'background-image' => 'a.jpeg'
                ])
            ],
            [
                'id' => 'content-a',
                'value' => json_encode([
                    'picture' => 'hello.jpeg',
                    'minititle' => 'HI TEMAN TARHILALA',
                    'title' => 'Yuk, mari kita bergabung untuk menabung sampah di bank sampah! Dengan menabung sampah, kita bisa membantu mengurangi jumlah sampah di lingkungan sekitar kita dan memberikan kontribusi positif bagi lingkungan serta bumi yang kita tempati.',
                    'content' => 'Dengan menabung sampah, kita dapat membantu mendorong pengelolaan sampah yang lebih efektif dan berkelanjutan, sehingga sampah-sampah yang seharusnya berakhir di tempat pembuangan akhir dapat diolah menjadi bahan baku yang berguna untuk industri lainnya. Jadi, mari kita bersama-sama menjadi bagian dari solusi untuk mengatasi masalah sampah dan menjaga lingkungan kita agar tetap bersih dan sehat. Ayo, mulai menabung sampah di bank sampah sekarang juga!'
                ])
            ],
            [
                'id' => 'content-b',
                'value' => json_encode([
                    'minititle' => '3R',
                    'title' => 'REDUCE, REUSE, & RECYCLE',
                    'cards' => [
                        [
                            'pict' => 'a.jpg',
                            'title' => 'REDUCE',
                            'content' => 'Mengurangi jumlah limbah yang dihasilkan dengan mengurangi penggunaan sumber daya alam dan bahan-bahan yang tidak dapat didaur ulang.'
                        ],
                        [
                            'pict' => 'b.jpg',
                            'title' => 'REUSE',
                            'content' => 'Menggunakan kembali barang atau bahan yang masih bisa digunakan, bukan membuangnya setelah satu kali pemakaian.'
                        ],
                        [
                            'pict' => 'c.jpg',
                            'title' => 'RECYCLE',
                            'content' => 'Mengubah sampah menjadi produk baru. Daur ulang adalah cara penting untuk menghemat sumber daya alam dan mengurangi polusi.'
                        ],
                    ]
                ])
            ],
            [
                'id' => 'content-c',
                'value' => json_encode([
                    'title' => 'Jenis - Jenis Sampah',
                    'content' => [ 'Sampah organik', 'Sampah plastik', 'Sampah kaca', 'Sampah kertas', 'Sampah logam', 'Sampah elektronik']
                ])
            ],
            [
                'id' => 'content-d',
                'value' => json_encode([
                    'title' => 'Mekanisme Bank Sampah',
                    'cards' => [
                        [
                            'title' => 'Memilah Sampah',
                            'content' => 'Pisahkan sampah yang dapat didaur ulang dari sampah yang tidak dapat didaur ulang. Misalnya, pisahkan sampah organik, sampah plastik, sampah kertas, sampah logam, dan sebagainya.'
                        ],
                        [
                            'title' => 'Membersihkan Sampah',
                            'content' => 'Sebelum mengirim sampah ke bank sampah, pastikan untuk membersihkannya terlebih dahulu, terutama untuk sampah organik yang mudah membusuk.'
                        ],
                        [
                            'title' => 'Memilah Berdasarkan Jenis',
                            'content' => 'Setelah membersihkan sampah, pisahkan lagi berdasarkan jenisnya. Misalnya, pisahkan botol plastik dari kantong plastik. Hal ini juga akan memudahkan proses daur ulang sampah.'
                        ],
                        [
                            'title' => 'Mengompres Sampah',
                            'content' => 'Jika memungkinkan, sebaiknya mengompres sampah terlebih dahulu agar ukuran sampah menjadi lebih kecil dan mudah untuk ditransportasi karena sampah yang sudah dikompresi akan meminimalkan kemungkinan tumpahan dan kebocoran saat diangkut.'
                        ],
                        [
                            'title' => 'Menghubungi Bank Sampah',
                            'content' => 'Sebelum mengirim sampah ke bank sampah, pastikan untuk menghubungi pihak bank sampah terlebih dahulu. Hal ini penting untuk mengetahui jenis sampah yang diterima dan jam operasionalnya agar proses pengiriman sampah berjalan dengan lancar.'
                        ],
                        [
                            'title' => 'Pemberian insentif',
                            'content' => 'Setelah sampah diterima oleh pihak bank sampah maka sampah akan ditimbang dan dicatat, setelah itu akan diberikan insentif berupa uang atau hadiah sebagai bentuk apresiasi atas partisipasi mereka dalam program pengelolaan sampah yang baik.'
                        ],
                    ]
                ])
            ],
            [
                'id' => 'cerita-section-title',
                'value' => 'Daftar Cerita Kami'
            ],
            [
                'id' => 'judul_website',
                'value' => 'Tarhilala'
            ],
            [
                'id' => 'footer',
                'value' => json_encode([
                    'judul' => 'Tarhilala',
                    'subjudul' => 'Membantu toba lebih',
                    'profil' => [
                        'alamat' => 'Jl. Lintas Balige - Siantar, Desa Tambunan, Lumban Pea',
                        'no_phone' => '+1 234 567890',
                        'email_addr' => 'email@example.com'
                    ],
                    'social_media_url' => [
                        'facebook' => '#',
                        'twitter' => '#',
                        'instagram' => '#',
                        'linkedin' => '#'
                    ],
                    'catatan_hakcipta' => 'Hak Cipta &copy; 2023'
                ])
            ]
        ]);
    }z
}
