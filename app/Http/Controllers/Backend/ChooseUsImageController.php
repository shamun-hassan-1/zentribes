<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ChooseUsImage;
use Illuminate\Support\Str;
Use Image;
Use File;

class ChooseUsImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $chooseusimages = ChooseUsImage:: orderBy('id', 'asc')->get();
        return view('backend.pages.chooseusimage.manage', compact('chooseusimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.chooseusimage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $chooseusimage = new ChooseUsImage();
        $chooseusimage->serial_number         = $request->serial_number;
        $chooseusimage->title         = $request->title;
        $chooseusimage->paragraph         = $request->paragraph;
 
        if ($request->image) {
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/chooseus/' .$img);
            Image::make($image)->save($location);
            $chooseusimage->image = $img;
        }
        $chooseusimage->save();
        return redirect()->route('chooseusimage.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $chooseusimage = ChooseUsImage::find($id);
        if ( !is_null($chooseusimage)) {
            return view('backend.pages.chooseusimage.edit', compact('chooseusimage'));
            
        }
        else{

            return redirect()->route('chooseusimage.manage');

        }
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
       $chooseusimage = ChooseUsImage::find($id);
        $chooseusimage->serial_number         = $request->serial_number;
        $chooseusimage->title         = $request->title;
        $chooseusimage->paragraph         = $request->paragraph;
        
        

        if (!is_null($request->image))
         {
            if (File::exists('Backend/img/chooseus/' . $chooseusimage->image)) {
               File::delete('Backend/img/chooseus/' . $chooseusimage->image);
            }
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/chooseus/' .$img);
            Image::make($image)->save($location);
            $chooseusimage->image = $img;
        }
        $chooseusimage->save();
        return redirect()->route('chooseusimage.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $chooseusimage = ChooseUsImage::find($id);
        if (!is_null( $chooseusimage ))
         {
          if (File::exists('Backend/img/chooseus/' . $chooseusimage->image)) {
               File::delete('Backend/img/chooseus/' . $chooseusimage->image);
            }
            $chooseusimage->delete(); 
            return redirect()->route('chooseusimage.manage'); 
        }
        else{
            return redirect()->route('chooseusimage.manage');

        }
    }
}
