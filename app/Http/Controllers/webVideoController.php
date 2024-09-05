<?php

namespace App\Http\Controllers;

use App\Models\webVideo;
use App\Models\Category;
use App\Models\WebGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class webVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $video = DB::table('web_videos') 
    //    ->join('categories','web_videos.category','=','categories.id')
    //    ->where('type','video')
    //    ->select('web_videos.*','categories.*','web_videos.id as webid','web_videos.status as webstatus')
    //    ->get();
        $video = webVideo::all();
        return view('admin/pages/videos/indexvideo',get_defined_vars());
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =DB::table('categories')->where('type','Video')->get();
        return view('admin/pages/videos/showvideo',get_defined_vars());
    }


    public function fontindex()
    {
        $videoget=webVideo::where('status',1)->get();
        // dd($videoget->all());
        return view('frontend/pages/video',get_defined_vars());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'video' => 'required',
            'image' => 'required',
            // 'video' => 'required|mimes:video/mp4,video/x-flv,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv'
        ]);
        
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $fileName = time() . '-' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
            $data = [
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'video' => $request->input('video'),
                'image' => $fileName,
            ];
            webVideo::create($data);
        }

                // $fileModal = new webVideo();
                // $fileModal->category = $request->category_id;
                // $fileModal->video =$request->video;
             
                // $fileModal->save();
     
      
        return back()->with('success', 'File has successfully uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($status,$id)
    {
        // dd($status,$id);
        $changestatus="";
        if($status == 1){
        $changestatus='0';
         } elseif($status == 0){
            $changestatus='1'; 
         }
         
        //  dd($changestatus);
        
         $video=webVideo::find($id);
         $video->status=$changestatus;
         $video->save();
         return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        webVideo::find($id)->delete();
        return back()->with('succes','Video Delete Successfully');
    }
    
}