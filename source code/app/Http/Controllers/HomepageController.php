<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Homepage;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomepageController extends Controller
{

    private function GetHomepageDatas(){
        return [
            'jw' => Homepage::find('judul_website')->value,
            'jh' => Homepage::find('judul_header')->value,
            'sjh' => Homepage::find('subjudul_header')->value,
            'gk' => Homepage::find('gambar_konten')->value,

            'jk1' => Homepage::find('judul_konten_1')->value,
            'sjk1' => Homepage::find('subjudul_konten_1')->value,
            'sjk1sa' => Homepage::find('subjudul_konten_1_sub_a')->value,
            'gk1' => Homepage::find('gambar_konten_1')->value,

            'jk2a' => Homepage::find('judul_konten_2_a')->value,
            'jk2b' => Homepage::find('judul_konten_2_b')->value,

            'gk2sa' => Homepage::find('gambar_konten_2_sub_a')->value,
            'jk2sa' => Homepage::find('judul_konten_2_sub_a')->value,
            'sjk2sa' => Homepage::find('subjudul_konten_2_sub_a')->value,

            'gk2sb' => Homepage::find('gambar_konten_2_sub_b')->value,
            'jk2sb' => Homepage::find('judul_konten_2_sub_b')->value,
            'sjk2sb' => Homepage::find('subjudul_konten_2_sub_b')->value,

            'gk2sc' => Homepage::find('gambar_konten_2_sub_c')->value,
            'jk2sc' => Homepage::find('judul_konten_2_sub_c')->value,
            'sjk2sc' => Homepage::find('subjudul_konten_2_sub_c')->value,

            'jk3' => Homepage::find('judul_konten_3')->value,
            'jk3sa' => Homepage::find('judul_konten_3_sub_a')->value,
            'jk3sb' => Homepage::find('judul_konten_3_sub_b')->value,
            'jk3sc' => Homepage::find('judul_konten_3_sub_c')->value,
            'jk3sd' => Homepage::find('judul_konten_3_sub_d')->value,
            'jk3se' => Homepage::find('judul_konten_3_sub_e')->value,
            'jk3sf' => Homepage::find('judul_konten_3_sub_f')->value,

            'jk4' => Homepage::find('judul_konten_4')->value,
            'jk4sa' => Homepage::find('judul_konten_4_sub_a')->value,
            'sk4sa' => Homepage::find('sub_konten_4_sub_a')->value,
            'jk4sb' => Homepage::find('judul_konten_4_sub_b')->value,
            'sk4sb' => Homepage::find('sub_konten_4_sub_b')->value,
            'jk4sc' => Homepage::find('judul_konten_4_sub_c')->value,
            'sk4sc' => Homepage::find('sub_konten_4_sub_c')->value,
            'jk4sd' => Homepage::find('judul_konten_4_sub_d')->value,
            'sk4sd' => Homepage::find('sub_konten_4_sub_d')->value,
            'jk4se' => Homepage::find('judul_konten_4_sub_e')->value,
            'sk4se' => Homepage::find('sub_konten_4_sub_e')->value,
            'jk4sf' => Homepage::find('judul_konten_4_sub_f')->value,
            'sk4sf' => Homepage::find('sub_konten_4_sub_f')->value,

            'jdb' => Homepage::find('judul_daftar_blog')->value,

            'jbf' => Homepage::find('judul_brand_footer')->value,
            'sjbf' => Homepage::find('subjudul_brand_footer')->value,

            'pfa' => Homepage::find('profil_footer_alamat')->value,
            'pfnp' => Homepage::find('profil_footer_nophone')->value,
            'pfae' => Homepage::find('profil_footer_alamat_email')->value,
        ];
    }

    function showHomepage(){
        $homepage_data = $this->GetHomepageDatas();
        $currentBlog = Blog::orderBy('created_at', 'DESC')->take(6)->get();
        return view('.homepage.index', array_merge($homepage_data, [
            'currentBlog' => $currentBlog
        ]));
    }  

    function showBankSampahInfos(){
        $daftarUnit = Unit::where('aktif', 1)->simplePaginate(5);

        return view('.homepage.unitlists', [
            'title' => 'Daftar Bank Sampah dalam website ini',
            'units' => $daftarUnit
        ]);
    }

    function ShowEditHomepage(){
        $currentHomepageData = $this->GetHomepageDatas();
       return view('.dashboard.admin.misc.updatehomepage', $currentHomepageData);
    }

    public function pushHomepageUpdate(Request $request)
    {
        // Group 1
        if ($request->input('judul_website') != "") {
            Homepage::where('id', 'judul_website')->update(['value' => $request->input('judul_website')]);
        }

        // Group 2
        if ($request->input('judul_header') != "") {
            Homepage::where('id', 'judul_header')->update(['value' => $request->input('judul_header')]);
        }
        if ($request->input('subjudul_header') != "") {
            Homepage::where('id', 'subjudul_header')->update(['value' => $request->input('subjudul_header')]);
        }

        // Group 3
        if ($request->input('judul_konten_1') != "") {
            Homepage::where('id', 'judul_konten_1')->update(['value' => $request->input('judul_konten_1')]);
        }
        if ($request->input('subjudul_konten_1') != "") {
            Homepage::where('id', 'subjudul_konten_1')->update(['value' => $request->input('subjudul_konten_1')]);
        }
        if ($request->input('subjudul_konten_1_sub_a') != "") {
            Homepage::where('id', 'subjudul_konten_1_sub_a')->update(['value' => $request->input('subjudul_konten_1_sub_a')]);
        }

        //Group 4
        if ($request->input('judul_konten_2_a') != "") {
            Homepage::where('id', 'judul_konten_2_a')->update(['value' => $request->input('judul_konten_2_a')]);
        }
        if ($request->input('judul_konten_2_b') != "") {
            Homepage::where('id', 'judul_konten_2_b')->update(['value' => $request->input('judul_konten_2_b')]);
        }

        //Group 4a
        if ($request->input('judul_konten_3') != "") {
            Homepage::where('id', 'judul_konten_3')->update(['value' => $request->input('judul_konten_3')]);
        }
        if ($request->input('judul_konten_3_sub_a') != "") {
            Homepage::where('id', 'judul_konten_3_sub_a')->update(['value' => $request->input('judul_konten_3_sub_a')]);
        }
        if ($request->input('judul_konten_3_sub_b') != "") {
            Homepage::where('id', 'judul_konten_3_sub_b')->update(['value' => $request->input('judul_konten_3_sub_b')]);
        }
        if ($request->input('judul_konten_3_sub_c') != "") {
            Homepage::where('id', 'judul_konten_3_sub_c')->update(['value' => $request->input('judul_konten_3_sub_c')]);
        }
        if ($request->input('judul_konten_3_sub_d') != "") {
            Homepage::where('id', 'judul_konten_3_sub_d')->update(['value' => $request->input('judul_konten_3_sub_d')]);
        }
        if ($request->input('judul_konten_3_sub_e') != "") {
            Homepage::where('id', 'judul_konten_3_sub_e')->update(['value' => $request->input('judul_konten_3_sub_e')]);
        }
        if ($request->input('judul_konten_3_sub_f') != "") {
            Homepage::where('id', 'judul_konten_3_sub_f')->update(['value' => $request->input('judul_konten_3_sub_f')]);
        }


        // Group 5
        if ($request->input('judul_konten_2_sub_a') != "") {
            Homepage::where('id', 'judul_konten_2_sub_a')->update(['value' => $request->input('judul_konten_2_sub_a')]);
        }
        if ($request->input('subjudul_konten_2_sub_a') != "") {
            Homepage::where('id', 'subjudul_konten_2_sub_a')->update(['value' => $request->input('subjudul_konten_2_sub_a')]);
        }

        // Group 5a
        if ($request->input('judul_konten_4') != "") {
            Homepage::where('id', 'judul_konten_4')->update(['value' => $request->input('judul_konten_4')]);
        }
        if ($request->input('judul_konten_4_sub_a') != "") {
            Homepage::where('id', 'judul_konten_4_sub_a')->update(['value' => $request->input('judul_konten_4_sub_a')]);
        }
        if ($request->input('sub_konten_4_sub_a') != "") {
            Homepage::where('id', 'sub_konten_4_sub_a')->update(['value' => $request->input('sub_konten_4_sub_a')]);
        }
        if ($request->input('judul_konten_4_sub_b') != "") {
            Homepage::where('id', 'judul_konten_4_sub_b')->update(['value' => $request->input('judul_konten_4_sub_b')]);
        }
        if ($request->input('sub_konten_4_sub_b') != "") {
            Homepage::where('id', 'sub_konten_4_sub_b')->update(['value' => $request->input('sub_konten_4_sub_b')]);
        }
        if ($request->input('judul_konten_4_sub_c') != "") {
            Homepage::where('id', 'judul_konten_4_sub_c')->update(['value' => $request->input('judul_konten_4_sub_c')]);
        }
        if ($request->input('sub_konten_4_sub_c') != "") {
            Homepage::where('id', 'sub_konten_4_sub_c')->update(['value' => $request->input('sub_konten_4_sub_c')]);
        }
        if ($request->input('judul_konten_4_sub_d') != "") {
            Homepage::where('id', 'judul_konten_4_sub_d')->update(['value' => $request->input('judul_konten_4_sub_d')]);
        }
        if ($request->input('sub_konten_4_sub_d') != "") {
            Homepage::where('id', 'sub_konten_4_sub_d')->update(['value' => $request->input('sub_konten_4_sub_d')]);
        }
        if ($request->input('judul_konten_4_sub_e') != "") {
            Homepage::where('id', 'judul_konten_4_sub_e')->update(['value' => $request->input('judul_konten_4_sub_e')]);
        }
        if ($request->input('sub_konten_4_sub_e') != "") {
            Homepage::where('id', 'sub_konten_4_sub_e')->update(['value' => $request->input('sub_konten_4_sub_e')]);
        }
        if ($request->input('judul_konten_4_sub_f') != "") {
            Homepage::where('id', 'judul_konten_4_sub_f')->update(['value' => $request->input('judul_konten_4_sub_f')]);
        }
        if ($request->input('sub_konten_4_sub_f') != "") {
            Homepage::where('id', 'sub_konten_4_sub_f')->update(['value' => $request->input('sub_konten_4_sub_f')]);
        }


        // Group 6
        if ($request->input('judul_konten_2_sub_b') != "") {
            Homepage::where('id', 'judul_konten_2_sub_b')->update(['value' => $request->input('judul_konten_2_sub_b')]);
        }
        if ($request->input('subjudul_konten_2_sub_b') != "") {
            Homepage::where('id', 'subjudul_konten_2_sub_b')->update(['value' => $request->input('subjudul_konten_2_sub_b')]);
        }

        // Group 7
        if ($request->input('judul_konten_2_sub_c') != "") {
            Homepage::where('id', 'judul_konten_2_sub_c')->update(['value' => $request->input('judul_konten_2_sub_c')]);
        }
        if ($request->input('subjudul_konten_2_sub_c') != "") {
            Homepage::where('id', 'subjudul_konten_2_sub_c')->update(['value' => $request->input('subjudul_konten_2_sub_c')]);
        }

        // Grupe 6a
        if($request->input('judul_daftar_blog') != "") {
            Homepage::where('id', 'judul_daftar_blog')->update(['value' => $request->input('judul_daftar_blog')]);
        }

        // Groupe 6b
        if($request->input('judul_brand_footer') != "") {
            Homepage::where('id', 'judul_brand_footer')->update(['value' => $request->input('judul_brand_footer')]);
        }
        if($request->input('subjudul_brand_footer') != "") {
            Homepage::where('id', 'subjudul_brand_footer')->update(['value' => $request->input('subjudul_brand_footer')]);
        }

        // Groupe 7
        if ($request->input('profil_footer_alamat') != "") {
            Homepage::where('id', 'profil_footer_alamat')->update(['value' => $request->input('profil_footer_alamat')]);
        }
        if ($request->input('profil_footer_nophone') != "") {
            Homepage::where('id', 'profil_footer_nophone')->update(['value' => $request->input('profil_footer_nophone')]);
        }
        if ($request->input('profil_footer_alamat_email') != "") {
            Homepage::where('id', 'profil_footer_alamat_email')->update(['value' => $request->input('profil_footer_alamat_email')]);
        }

        if ($request->hasFile('gambar_konten')) {

            $imagefile = $request->file('gambar_konten');

            if ($imagefile->isValid()) {
                Storage::disk('homepageImages')->delete($this->GetHomepageDatas()['gk']);

                $imageFileName = Str::random(40) . "." . $imagefile->extension();
                Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                Homepage::where('id', 'gambar_konten')->update(['value' => $imageFileName]);
            }
        }

        if ($request->hasFile('gambar_konten_1')) {

            $imagefile = $request->file('gambar_konten_1');

            if($imagefile->isValid()){
                Storage::disk('homepageImages')->delete($this->GetHomepageDatas()['gk1']);

                $imageFileName = Str::random(40).".".$imagefile->extension();
                Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                Homepage::where('id', 'gambar_konten_1')->update(['value' => $imageFileName]);
            }
        }

        if ($request->hasFile('gambar_konten_2_sub_a')) {

            $imagefile = $request->file('gambar_konten_2_sub_a');

            if($imagefile->isValid()){
                Storage::disk('homepageImages')->delete($this->GetHomepageDatas()['gk2sa']);

                $imageFileName = Str::random(40).".".$imagefile->extension();
                Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                Homepage::where('id', 'gambar_konten_2_sub_a')->update(['value' => $imageFileName]);
            }

        }

        if ($request->hasFile('gambar_konten_2_sub_b')) {

            $imagefile = $request->file('gambar_konten_2_sub_b');

            if($imagefile->isValid()){
                Storage::disk('homepageImages')->delete($this->GetHomepageDatas()['gk2sb']);

                $imageFileName = Str::random(40).".".$imagefile->extension();
                Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                Homepage::where('id', 'gambar_konten_2_sub_b')->update(['value' => $imageFileName]);
            }
        }

        if ($request->hasFile('gambar_konten_2_sub_c')) {

            $imagefile = $request->file('gambar_konten_2_sub_c');

            if($imagefile->isValid()){
                Storage::disk('homepageImages')->delete($this->GetHomepageDatas()['gk2sc']);

                $imageFileName = Str::random(40).".".$imagefile->extension();
                Storage::disk('homepageImages')->put($imageFileName, $imagefile->getContent());

                Homepage::where('id', 'gambar_konten_2_sub_c')->update(['value' => $imageFileName]);
            }
        }

        return redirect(route('admin.homepage.update.form'));
    }
}
