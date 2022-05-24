<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ChosseUs;
use App\Models\Backend\ChooseUsImage;
use App\Models\Backend\FirstSection;
use App\Models\Backend\TeamImage;
use App\Models\Backend\teamSection;
use App\Models\Backend\testimonial;
use App\Models\Backend\writerSection;
use App\Models\Backend\WriterImage;
use App\Models\Backend\WeWork;
use App\Models\Backend\blog;
use Illuminate\Support\Str;
Use Image;
Use File;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $values = FirstSection::take(1)->get();
        $teamvalues = teamSection::take(1)->get();
        $teamimages = TeamImage::take(4)->get();
        $writerSections = writerSection::take(1)->get();
        $WriterImages = WriterImage::take(3)->get();
        $ChosseUss = ChosseUs::take(1)->get();
        $ChooseUsImageOnes = ChooseUsImage::latest()->where('serial_number', 1)->get();
        $ChooseUsImagetwos = ChooseUsImage::latest()->where('serial_number', 2)->get();
        $ChooseUsImagethrees = ChooseUsImage::latest()->where('serial_number', 3)->get();
        $ChooseUsImagefours = ChooseUsImage::latest()->where('serial_number', 4)->get();
        $testimonials = testimonial::latest()->get();
        $WeWorks = WeWork::take(1)->get();
        $navs = blog::take(7)->get();
        return view('frontend.pages.home',compact('values','teamvalues','teamimages','writerSections','WriterImages','ChosseUss', 'ChooseUsImageOnes','ChooseUsImagetwos','ChooseUsImagethrees','ChooseUsImagefours','testimonials','WeWorks','navs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
