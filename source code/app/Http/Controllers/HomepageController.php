<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\Homepage;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomepageController extends Controller
{

    public function ShowHomepage()
    {
        return view(".homepage.index", [
            "head" => json_decode(Homepage::where('id', 'head')->first()->value, true),
            "contenta" => json_decode(Homepage::where('id', 'content-a')->first()->value, true),
            "contentb" => json_decode(Homepage::where('id', 'content-b')->first()->value, true),
            "contentc" => json_decode(Homepage::where('id', 'content-c')->first()->value, true),
            "contentd" => json_decode(Homepage::where('id', 'content-d')->first()->value, true),
            "cerita_section_title" => Homepage::where('id', 'cerita-section-title')->first()->value, true,
            "currentCerita" => Cerita::orderBy('created_at', 'DESC')->take(6)->get(),
        ]);
    }

    function showBankSampahInfos(){
        $daftarUnit = Unit::where('aktif', 1)->simplePaginate(5);

        return view('.homepage.unitlists', [
            'title' => 'Daftar Bank Sampah dalam website ini',
            'units' => $daftarUnit
        ]);
    }

    function ShowEditHomepage(Request $request){
        return view('dashboard.admin.misc.updatehomepage', [
                'request' => $request,
                "head" => json_decode(Homepage::where('id', 'head')->first()->value, true),
                "contenta" => json_decode(Homepage::where('id', 'content-a')->first()->value, true),
                "contentb" => json_decode(Homepage::where('id', 'content-b')->first()->value, true),
                "contentc" => json_decode(Homepage::where('id', 'content-c')->first()->value, true),
                "contentd" => json_decode(Homepage::where('id', 'content-d')->first()->value, true),
                "cerita_section_title" => Homepage::where('id', 'cerita-section-title')->first()->value, true,
                "currentCerita" => Cerita::orderBy('created_at', 'DESC')->take(6)->get(),
                "judul_website" => Homepage::where('id', 'judul_website')->first()->value,
                "footer" => json_decode(Homepage::where('id', 'footer')->first()->value, true)
            ]);
    }

    function pushHomepageUpdate(Request $request, $section){
        switch($section){
            case 'website_title' :
                if($request->judul_website != null){
                    Homepage::where('id', 'judul_website')->update([
                        'value' => $request->judul_website
                    ]);
                }
                break;

            case 'header' :
                if($request->has('bgheader') && $request->judul_header != null && $request->subjudul_header != null){
                    $imagefile = $request->file('bgheader');
                    $imageFileName = Str::random(40) . "." . $imagefile->extension();
                    Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                    /**
                     * {"title":"","subtitle":"","background-image":""}
                     */

                    Homepage::where('id', 'head')->update([
                        'value' => json_encode([
                            'title' => $request->judul_header,
                            'subtitle' => $request->subjudul_header,
                            'background-image' => $imageFileName
                        ])
                    ]);
                }
                break;

            case 'footer' :

                /**
                 * {
                 *      "judul":"Tarhilala",
                 *      "subjudul":"Membantu toba lebih",
                 *      "profil":{
                 *          "alamat":"Jl. Lintas Balige - Siantar, Desa Tambunan, Lumban Pea",
                 *          "no_phone":"+1 234 567890",
                 *          "email_addr":"email@example.com"
                 *      },
                 *      "social_media_url":{
                 *          "facebook":"#",
                 *          "twitter":"#",
                 *          "instagram":"#",
                 *          "linkedin":"#"
                 *      },
                 *      "catatan_hakcipta":""
                 *  }
                 */

                Homepage::where('id', 'footer')->update([

                    'value' => json_encode([
                        'judul' => $request->judul_footer,
                        'subjudul' => $request->subjudul_footer,
                        'profil' => [
                            'alamat' => $request->alanat,
                            'no_phone' => $request->no_phone,
                            'email_addr' => $request->email_addr,
                        ],
                        'social_media_url' => [
                            'facebook' => $request->fb,
                            'twitter' => $request->twitter,
                            'instagram' => $request->insta,
                            'linkedin' => $request->linkedin,
                        ],
                        'catatan_hakcipta' => $request->catatan_hakcipta
                    ])
                ]);



                break;

            case 'bagian_1' :
                if($request->has('gambar_bagian_1') && $request->judul_kecil_bagian_1 != null && $request->judul_bagian_1 != null && $request->konten_bagian_1) {

                    // store the image first
                    $imagefile = $request->file('gambar_bagian_1');
                    $imageFileName = Str::random(40) . "." . $imagefile->extension();
                    Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                    Homepage::where('id', 'content-a')->update([
                        'value' => json_encode([
                            'picture' => $imageFileName,
                            'minititle' => $request->judul_kecil_bagian_1,
                            'title' => $request->judul_bagian_1,
                            'content' => $request->konten_bagian_1
                        ])
                    ]);
                }

                break;

            case 'bagian_2' :

                if($request->judul_konten_bagian_2 != null && $request->judul_kecil_bagian_2 != null && $request->judul_bagian_2 != null && $request->has('gambar_konten_bagian_2')){

                    $temp = [];

                    foreach ($request->judul_konten_bagian_2 as $key => $isi){
                        $images = $request->file('gambar_konten_bagian_2')[$key];
                        // first store the name (in a variable)
                        $imageFileName = Str::random(40).".".$images->extension();

                        // second store the content that want to be stored
                        Storage::disk('homepageImages')->put($imageFileName, $images->getContent());

                        // and then store the file image name in db...
                        // "pict":"a.jpg","title":"REDUCE","content"
                        $temp[] = [
                            'pict' => $imageFileName,
                            'title' => $request->judul_konten_bagian_2[$key],
                            'content' => $request->isi_konten_bagian_2[$key]
                        ];
                    }

                    Homepage::where('id', 'content-b')->update(['value' => json_encode([
                        'minititle' => $request->judul_kecil_bagian_2,
                        'title' => $request->judul_bagian_2,
                        'cards' => $temp
                    ])]);

                }

                break;

            case 'bagian_3' :

                if($request->konten_bagian_3 != null && $request->judul_bagian_3 != null){
                    Homepage::where('id', 'content-c')->update(['value' => json_encode([
                        'title' => $request->judul_bagian_3,
                        'content' => $request->konten_bagian_3
                    ])]);
                }

                break;

            case 'bagian_4' :

                if($request->judul_bagian_4 != null && $request->isi_konten_bagian_4 != null && $request->judul_konten_bagian_4 != null){
                    $judul_web = $request->judul_bagian_4;
                    $cards = [];

                    foreach($request->isi_konten_bagian_4 as $key => $isi){
                        $cards[] = [
                            'title' => $request->judul_konten_bagian_4[$key],
                            'content' => $request->isi_konten_bagian_4[$key]
                        ];
                    }

                    Homepage::where('id', 'content-d')->update(['value' => json_encode([
                            'title' => $judul_web,
                            'cards' => $cards
                        ])
                    ]);
                }

                break;

            case 'judul_bagian_cerita' :

                if($request->nama_judul_bagian_cerita != null){
                    Homepage::where('id', 'cerita-section-title')->update([
                        'value' => $request->nama_judul_bagian_cerita
                    ]);
                }

                break;
        }

        return redirect(route('admin.homepage.update.form'));
    }

}
