<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\testimonial;
use Illuminate\Support\Str;
Use Image;
Use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = testimonial:: orderBy('id', 'asc')->get();
        return view('backend.pages.testimonial.manage', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new testimonial();
        $testimonial->author_title         = $request->author_title;
        $testimonial->author_position         = $request->author_position;
        $testimonial->description         = $request->description;
        
 
        if ($request->image) {
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/testimonial/' .$img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }
        $testimonial->save();
        return redirect()->route('testimonial.manage');
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
        $testimonial = testimonial::find($id);
        if ( !is_null($testimonial)) {
            return view('backend.pages.testimonial.edit', compact('testimonial'));
            
        }
        else{

            return redirect()->route('testimonial.manage');

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
        $testimonial = testimonial::find($id);
        $testimonial->author_title         = $request->author_title;
        $testimonial->author_position         = $request->author_position;
        $testimonial->description         = $request->description;
        
        

        if (!is_null($request->image))
         {
            if (File::exists('Backend/img/testimonial/' . $testimonial->image)) {
               File::delete('Backend/img/testimonial/' . $testimonial->image);
            }
            $image = $request->file('image');
            $img = rand() .'.' .$image->getClientOriginalExtension();
            $location = public_path('Backend/img/testimonial/' .$img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }
        $testimonial->save();
        return redirect()->route('testimonial.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = testimonial::find($id);
        if (!is_null( $testimonial ))
         {
          if (File::exists('Backend/img/testimonial/' . $testimonial->image)) {
               File::delete('Backend/img/testimonial/' . $testimonial->image);
            }
            $testimonial->delete(); 
            return redirect()->route('testimonial.manage'); 
        }
        else{
            return redirect()->route('testimonial.manage');

        }
    }
}
