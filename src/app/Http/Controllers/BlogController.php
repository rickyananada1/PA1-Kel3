<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\KategoriBlog;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class BlogController extends Controller
{
    /**
     * THESE FUNCTIONS ARE ABOUT BLOG CATEGORIES
     */
    /** pages */
    function NewCategoryForm(){

    }
    function EditCategoryForm(){

    }

    /** actions */
    function PushCategory(Request $request){
        KategoriBlog::create([
            'nama_kategori' => $request->nama_kategori
        ]);
    }
    function UpdateCategory($id, Request $request){
        KategoriBlog::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
    }
    function DestroyCategory($id){
        KategoriBlog::where('id', $id)->delete();
    }

    /**
     * THESE FUNCTIONS ARE ABOUT BLOGS
     */

    /** pages */
    // public
    function showBlog($id){

    }

    function listBlog($id){

    }

    function listBlogPerAuthor($author){

    }

    function listBlogPerCategory($category){

    }

    // admin
    function NewBlogForm(){
        return view('.dashboard.unit.blog.write');
    }
    function UpdateBlogForm(){

    }

    /** actions */
    // admin
    function pushBlog(Request $request){
        $imageFile = $request->file('blog_thumbnail');

        $imageFileName = Str::random(40).$imageFile->extension();
        $judulBlog = $request->judul_blog;
        $content = $request->konten;
        $author = Unit::where('user_id', Auth::user()->id)->first()->id;
        $kategori = $request->kategori;

        // first we put the file to what we want to!
        // it will goes to /images/
        $imageFile->storeAs('images', $imageFileName);

        // and then we store the whole thing
        Blog::create([
            'judul_blog' => $judulBlog,
            'content' => $content,
            'image_header_url' => $imageFileName,
            'author'  => $author,
            'kategori' => $kategori
        ]);

        // back to the blog list!
    }

    function updateBlog($id, Request $request){
        $judulBlog = $request->judul_blog;
        $content = $request->konten;
        $kategori = $request->kategori;

        // and then we store the whole thing
        Blog::where('id', $id)->update([
            'judul_blog' => $judulBlog,
            'content' => $content,
            'kategori' => $kategori
        ]);

        // back to the blog list!

    }

    function destroyBlog($id){
        Blog::where('id', $id)->delete();
    }
}
