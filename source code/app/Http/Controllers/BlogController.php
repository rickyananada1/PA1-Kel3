<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\KategoriBlog;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class BlogController extends Controller
{
    /**
     * THESE FUNCTIONS ARE ABOUT BLOG CATEGORIES
     */
    /** pages */
    function NewCategoryForm(){
        return view('dashboard.unit.blog.kategori.add');
    }
    function EditCategoryForm($id){
        $ktgr = KategoriBlog::where('id', $id)->first();
        return view('dashboard.unit.blog.kategori.edit', [
            'nama_kategori' => $ktgr->nama_kategori,
            'id' => $ktgr->id
        ]);
    }

    function listCategory(){
        $data = KategoriBlog::where('unit_id', (Unit::where('user_id', Auth::user()->id)->first()->id) )->get();

        return view('dashboard.unit.blog.kategori.home', [
            'DaftarKategori' => $data
        ]);
    }

    /** actions */
    function PushCategory(Request $request){
        KategoriBlog::create([
            'nama_kategori' => $request->nama_kategori,
            'unit_id' => Unit::where('user_id', Auth::user()->id)->first()->id
        ]);

        return redirect(route('blog.kategori.home'));
    }
    function UpdateCategory($id, Request $request){
        $kategori = KategoriBlog::where('id', $id);
        if($kategori->first()->unit_id == Unit::where('user_id', Auth::user()->id)->first()->id){
            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);
        }

        return redirect(route('blog.kategori.home'));
    }
    function DestroyCategory($id){
        KategoriBlog::where('id', $id)->delete();
        return redirect(route('blog.kategori.home'));
    }

    /**
     * THESE FUNCTIONS ARE ABOUT BLOGS
     */

    /** pages */
    // public
    function showBlog($id){
        $dataBlog = Blog::where('id', $id)->firstOrFail();

        return view('.homepage.blog.view', [
            'blog' => $dataBlog,
            'author' => Unit::where('id', $dataBlog->author)->first()->nama_unit,
            'category' => KategoriBlog::where('id', $dataBlog->kategori)->first()->nama_kategori
        ]);
    }

    function listBlog(){

        $currentUnitID = Unit::where('user_id', Auth::user()->id)->first()->id;

        $daftarBlog = Blog::where('author', $currentUnitID)->get();
        return view('dashboard.unit.blog.home',[
            'daftarBlog' => $daftarBlog
        ]);
    }

    function HomepageListBlog(){
        return view('.homepage.blog.all', [
            'title' => 'Daftar Cerita Kami',
            'blogs' => Blog::simplePaginate(15),
        ]);
    }

    function HomepageListBlogPerAuthor(Request $request){
        if($request->has('selected')){
            $blog = Blog::where('author', $request->input('selected'));

            if($blog->count() > 0){
                return view('.homepage.blog.groupedperauthor', [
                    'title' => 'Daftar Cerita dari <b>'.Unit::where('id', $request->input('selected'))->first()->nama_unit.'</b>',
                    'blogs' => $blog->get(),
                ]);
            }
        }

        return view('.homepage.blog.groupauthorlist', [
            'title' => 'Mau mencari cerita dari siapa hari ini?',
            'authors' => Unit::whereIn('id', function ($query){
                $query->select('author')->from('blog');
            })->get()
        ]);
    }

    function HomepageListBlogPerCategory(Request $request){
        if($request->has('selected')){
            $blog = Blog::where('kategori', $request->input('selected'));

            if($blog->count() > 0){
                return view('.homepage.blog.groupedpercategory', [
                    'title' => 'Cerita dalam <b>'.KategoriBlog::where('id', $request->input('selected'))->first()->nama_kategori.'<b>',
                    'blogs' => $blog->get(),
                ]);
            }
        }

        return view('.homepage.blog.groupcategorylist', [
            'title' => 'Mau mencari cerita dari siapa hari ini?',
            'categories' => KategoriBlog::whereIn('id', function ($query){
                $query->select('kategori')->from('blog');
            })->get()
        ]);
    }

    // admin
    function NewBlogForm(){
        $DaftarKategori = KategoriBlog::where('unit_id', Unit::where('user_id', Auth::user()->id)->first()->id)->get();
        return view('.dashboard.unit.blog.write', [
            'daftarKategori' => $DaftarKategori
        ]);
    }
    function UpdateBlogForm($id){
        $DaftarKategori = KategoriBlog::where('unit_id', Unit::where('user_id', Auth::user()->id)->first()->id)->get();;
        $DataBlog = Blog::where('id', $id)->firstOrFail();
        return view('dashboard.unit.blog.edit', [
            'daftarKategori' => $DaftarKategori,
            'Blog' => $DataBlog,
            'id' => $id
        ]);
    }

    /** actions */
    // admin
    function PushBlog(Request $request){
        $imageFile = $request->file('blog_thumbnail');

        $imageFileName = Str::random(40).".".$imageFile->extension();
        $judulBlog = $request->judul_blog;
        $content = $request->konten;
        $author = Unit::where('user_id', Auth::user()->id)->first()->id;
        $kategori = $request->kategori;

        // first we put the file to what we want to!
        // it will goes to /images/
        $imageFile->storeAs('images', $imageFileName);

        Storage::disk('imageStorage')->put($imageFileName, $imageFile->getContent());

        // and then we store the whole thing
        Blog::create([
            'judul_blog' => $judulBlog,
            'content' => $content,
            'image_header_url' => $imageFileName,
            'author'  => $author,
            'kategori' => $kategori
        ]);

        // back to the blog list!
        return redirect(route('blog.list'));
    }

    function updateBlog($id, Request $request){
        $judulBlog = $request->judul_blog;
        $content = $request->konten;
        $kategori = $request->kategori;
        $imageFile = $request->file('blog_thumbnail');


        // and then we store the whole thing
        $blog = Blog::where('id', $id);
        $blog->update([
            'judul_blog' => $judulBlog,
            'content' => $content,
            'kategori' => $kategori
        ]);

        // change the photo if the imagefile is filled
        if($request->hasFile('blog_thumbnail')){
            if($imageFile->isValid()){
                // first remove the file
                Storage::disk('imageStorage')->delete($blog->first()->image_header_url);

                // and... we uplaad the new one
                $imageFileName = Str::random(40).".".$imageFile->extension();
                Storage::disk('imageStorage')->put($imageFileName, $imageFile->getContent());

                // and push the new name
                $blog->update([
                    'image_header_url' => $imageFileName
                ]);

                redirect(route('blog.list'));
            }
        }

        return redirect(route('blog.list'));

    }

    function DestroyBlog($id){

        $currentUnitID = Unit::where('user_id', Auth::user()->id)->firstOrFail()->id;
        $blog = Blog::where('id', $id);

        if($blog->exists() && ($blog->first()->author == $currentUnitID)){
            Storage::disk('imageStorage')->delete($blog->first()->image_header_url);
            $blog->delete();
        }

        return redirect(route('blog.list'));
    }
}
