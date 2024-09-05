<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;

class SliderController extends Controller {

    public function sliders() {
        $allSliders = Slider::all();
        return view('admin.pages.slider.sliders', get_defined_vars());
    }

    public function addslider() {
        return view('admin.pages.slider.addslider', get_defined_vars());
    }

    public function storesliders(Request $request) {
        
        $this->validate($request, [
            'title' => 'required|max:50',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:500|',
            'image' => 'dimensions:width=1000,height=600'
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('slider'), $image);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->type = $request->type;
        $slider->image = $image;
        $slider->save();
        session()->flash('success', 'Slider Image  Updated Successfully.');

        return redirect('/addslider');
    }

    public function sliderStatusChange(Request $request) {

        $data['status'] =  $request->input('status');
        $id =  $request->input('id');
        Slider::where('id', $id)->update($data);
      
    }

    public function destroy($id) {

      Slider::where('id',$id)->delete();
      return back()->with('delete','Slider Delete Successfully');
      
    }

}
