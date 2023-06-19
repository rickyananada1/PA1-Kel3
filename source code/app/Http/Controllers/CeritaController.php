<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\KategoriCerita;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class CeritaController extends Controller
{
    /**
     * THESE FUNCTIONS ARE ABOUT CERITA CATEGORIES
     */
    /** pages */
    function NewCategoryForm(){
        return view('dashboard.unit.cerita.kategori.add');
    }
    function EditCategoryForm($id){
        $ktgr = KategoriCerita::where('id', $id)->first();
        return view('dashboard.unit.cerita.kategori.edit', [
            'nama_kategori' => $ktgr->nama_kategori,
            'id' => $ktgr->id
        ]);
    }

    function listCategory(){
        $data = KategoriCerita::where('unit_id', (Unit::where('user_id', Auth::user()->id)->first()->id) )->get();

        return view('dashboard.unit.cerita.kategori.home', [
            'DaftarKategori' => $data
        ]);
    }

    /** actions */
    function PushCategory(Request $request){
        KategoriCerita::create([
            'nama_kategori' => $request->nama_kategori,
            'unit_id' => Unit::where('user_id', Auth::user()->id)->first()->id
        ]);

        return redirect(route('cerita.kategori.home'));
    }
    function UpdateCategory($id, Request $request){
        $kategori = KategoriCerita::where('id', $id);
        if($kategori->first()->unit_id == Unit::where('user_id', Auth::user()->id)->first()->id){
            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);
        }

        return redirect(route('cerita.kategori.home'));
    }
    function DestroyCategory($id){
        KategoriCerita::where('id', $id)->delete();
        return redirect(route('cerita.kategori.home'));
    }

    /**
     * THESE FUNCTIONS ARE ABOUT CERITAS
     */

    /** pages */
    // public
    function showCerita($id){
        $dataCerita = Cerita::where('id', $id)->firstOrFail();

        return view('.homepage.cerita.view', [
            'cerita' => $dataCerita,
            'author' => Unit::where('id', $dataCerita->author)->first()->nama_unit,
            'category' => KategoriCerita::where('id', $dataCerita->kategori)->first()->nama_kategori
        ]);
    }

    function listCerita(){

        $currentUnitID = Unit::where('user_id', Auth::user()->id)->first()->id;

        $daftarCerita = Cerita::where('author', $currentUnitID)->get();
        return view('dashboard.unit.cerita.home',[
            'daftarCerita' => $daftarCerita
        ]);
    }

    function HomepageListCerita(){
        return view('.homepage.cerita.all', [
            'title' => 'Daftar Cerita Kami',
            'ceritas' => Cerita::simplePaginate(15),
        ]);
    }

    function HomepageListCeritaPerAuthor(Request $request){
        if($request->has('selected')){
            $cerita = Cerita::where('author', $request->input('selected'));

            if($cerita->count() > 0){
                return view('.homepage.cerita.groupedperauthor', [
                    'title' => 'Daftar Cerita dari <b>'.Unit::where('id', $request->input('selected'))->first()->nama_unit.'</b>',
                    'ceritas' => $cerita->get(),
                ]);
            }
        }

        return view('.homepage.cerita.groupauthorlist', [
            'title' => 'Mau mencari cerita dari siapa hari ini?',
            'authors' => Unit::whereIn('id', function ($query){
                $query->select('author')->from('cerita');
            })->get()
        ]);
    }

    function HomepageListCeritaPerCategory(Request $request){
        if($request->has('selected')){
            $cerita = Cerita::where('kategori', $request->input('selected'));

            if($cerita->count() > 0){
                return view('.homepage.cerita.groupedpercategory', [
                    'title' => 'Cerita dalam <b>'. KategoriCerita::where('id', $request->input('selected'))->first()->nama_kategori.'<b>',
                    'ceritas' => $cerita->get(),
                ]);
            }
        }

        return view('.homepage.cerita.groupcategorylist', [
            'title' => 'Mau mencari cerita dari siapa hari ini?',
            'categories' => KategoriCerita::whereIn('id', function ($query){
                $query->select('kategori')->from('cerita');
            })->get()
        ]);
    }

    // admin
    function NewCeritaForm(){
        $DaftarKategori = KategoriCerita::where('unit_id', Unit::where('user_id', Auth::user()->id)->first()->id)->get();
        return view('.dashboard.unit.cerita.write', [
            'daftarKategori' => $DaftarKategori
        ]);
    }
    function UpdateCeritaForm($id){
        $DaftarKategori = KategoriCerita::where('unit_id', Unit::where('user_id', Auth::user()->id)->first()->id)->get();;
        $DataCerita = Cerita::where('id', $id)->firstOrFail();
        return view('dashboard.unit.cerita.edit', [
            'daftarKategori' => $DaftarKategori,
            'Cerita' => $DataCerita,
            'id' => $id
        ]);
    }

    /** actions */
    // admin
    function PushCerita(Request $request){
        $imageFile = $request->file('cerita_thumbnail');

        $imageFileName = Str::random(40).".".$imageFile->extension();
        $judulCerita = $request->judul_cerita;
        $content = $request->konten;
        $author = Unit::where('user_id', Auth::user()->id)->first()->id;
        $kategori = $request->kategori;

        // first we put the file to what we want to!
        // it will goes to /images/
        $imageFile->storeAs('images', $imageFileName);

        Storage::disk('imageStorage')->put($imageFileName, $imageFile->getContent());

        // and then we store the whole thing
        Cerita::create([
            'judul_cerita' => $judulCerita,
            'content' => $content,
            'image_header_url' => $imageFileName,
            'author'  => $author,
            'kategori' => $kategori
        ]);

        // back to the cerita list!
        return redirect(route('cerita.list'));
    }

    function updateCerita($id, Request $request){
        $judulCerita = $request->judul_cerita;
        $content = $request->konten;
        $kategori = $request->kategori;
        $imageFile = $request->file('cerita_thumbnail');


        // and then we store the whole thing
        $cerita = Cerita::where('id', $id);
        $cerita->update([
            'judul_cerita' => $judulCerita,
            'content' => $content,
            'kategori' => $kategori
        ]);

        // change the photo if the imagefile is filled
        if($request->hasFile('cerita_thumbnail')){
            if($imageFile->isValid()){
                // first remove the file
                Storage::disk('imageStorage')->delete($cerita->first()->image_header_url);

                // and... we uplaad the new one
                $imageFileName = Str::random(40).".".$imageFile->extension();
                Storage::disk('imageStorage')->put($imageFileName, $imageFile->getContent());

                // and push the new name
                $cerita->update([
                    'image_header_url' => $imageFileName
                ]);

                redirect(route('cerita.list'));
            }
        }

        return redirect(route('cerita.list'));

    }

    function DestroyCerita($id){

        $currentUnitID = Unit::where('user_id', Auth::user()->id)->firstOrFail()->id;
        $cerita = Cerita::where('id', $id);

        if($cerita->exists() && ($cerita->first()->author == $currentUnitID)){
            Storage::disk('imageStorage')->delete($cerita->first()->image_header_url);
            $cerita->delete();
        }

        return redirect(route('cerita.list'));
    }
}
