<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\WriterImage;
use Illuminate\Support\Str;
Use Image;
Use File;

class WriterImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WriterImages = WriterImage:: orderBy('id', 'asc')->get();
        return view('backend.pages.WriterImage.manage', compact('WriterImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.WriterImage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $WriterImage = new WriterImage();
        $WriterImage->title         = $request->title;
 
        if ($request->image) {
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/writerimage/' .$img);
            Image::make($image)->save($location);
            $WriterImage->image = $img;
        }
        $WriterImage->save();
        return redirect()->route('writerimage.manage');
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
      $WriterImage = WriterImage::find($id);
        if ( !is_null($WriterImage)) {
            return view('backend.pages.WriterImage.edit', compact('WriterImage'));
            
        }
        else{

            return redirect()->route('writerimage.manage');

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
       
        $WriterImage = WriterImage::find($id);
        $WriterImage->title         = $request->title;
        
        

        if (!is_null($request->image))
         {
            if (File::exists('Backend/img/writerimage/' . $WriterImage->image)) {
               File::delete('Backend/img/writerimage/' . $WriterImage->image);
            }
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/writerimage/' .$img);
            Image::make($image)->save($location);
            $WriterImage->image = $img;
        }
        $WriterImage->save();
        return redirect()->route('writerimage.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $WriterImage = WriterImage::find($id);
        if (!is_null( $WriterImage ))
         {
          if (File::exists('Backend/img/writerimage/' . $WriterImage->image)) {
               File::delete('Backend/img/writerimage/' . $WriterImage->image);
            }
            $WriterImage->delete(); 
            return redirect()->route('writerimage.manage'); 
        }
        else{
            return redirect()->route('writerimage.manage');

        }
    }
}
