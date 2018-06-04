<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

class ImageController extends Controller
{
    //
    public function resizeImage(){
        return view('resizeImage');
    }
    public function resizeImagePost(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            //Lấy ảnh từ request
        $image = $request->file('image');
        $input['imagename'] = $request['title'].'.'.$image->getClientOriginalExtension();
            //xác định thư mục chứa sau khi resize
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function($constraint){
            $constraint ->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath,$input['imagename']);

        return back()->with('success','Image Upload successful')
        ->with('imageName',$input['imagename']);
    }
}
