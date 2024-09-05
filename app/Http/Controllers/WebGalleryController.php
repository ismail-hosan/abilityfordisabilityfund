<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\WebGallery;
use App\Models\User;
use Illuminate\Support\Facades\DB; 

class WebGalleryController extends Controller {

    public function gallery() {
        $categorys = DB::table('categories')->where('type','Gallery')->get();
        return view('admin.pages.gallery', get_defined_vars());
    }

    public function viewall() {
        // rabbi 
        $galleriImages = DB::table('web_galleries')
                ->join('categories','categories.id', '=', 'web_galleries.category')
                ->select('web_galleries.*','web_galleries.created_at as create','web_galleries.id as webid','categories.*')
                ->get();
                // dd($galleriImages);

        return view('admin.pages.viewgallery', get_defined_vars());
    }

    public function store(Request $req) {

        $req->validate([
            'category_id' => 'required',
            // 'image' => 'dimensions:width=510,height=340'
        ]);
        
//        dd($req);
        if ($req->hasfile('image')) {
            foreach ($req->file('image') as $key => $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/uploads/gallery/', $name);
                $imgData[] = $name;
                $fileModal = new WebGallery();
                $fileModal->category = $req->category_id;
                $fileModal->images = $imgData[$key];
                $fileModal->save();
            }
        }
        return back()->with('success', 'File has successfully uploaded!');
    }

    public function deleteImage($id) {
        // dd($id);
        DB::table('web_galleries')->where('id', $id)->delete();
         return back()->with('success', 'Image Deleted successfully uploaded!');
    }

}
