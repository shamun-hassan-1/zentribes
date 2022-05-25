
        <!DOCTYPE html>
        <html lang="en">

        <head>
        @include('frontend.includes.header')

          @include('frontend.includes.css')


        </head>

        <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top  align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

          <div class="logo">
            <h1 class="text-light"><a href="{{route('homepage')}}"><img src="{{asset('frontend/assets/img/logo.png')}}" alt=""></a></h1>
            
          </div>

          <nav id="navbar" class="navbar">
            <ul>
              <!-- <li><a class="nav-link scrollto active" href="#team">Build A-team</a></li>
              <li><a class="nav-link scrollto" href="#choose">Why Choose Us</a></li>
              <li><a class="nav-link scrollto" href="#work">How We Work</a></li> -->

                 @foreach($navs as $nav)
              <li><a class="nav-link scrollto" href="{{ $nav->nav_url}}" target="_blank">{{ $nav->nav_text}}</a></li>
              @endforeach

              <li><a class="getstarted scrollto" href="">Hire Team</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
        </header><!-- End Header -->

        <!-- ======= About Section ======= -->
        @foreach($values as $value)
        <section class="first-section" style="background-image: linear-gradient(90deg, rgba(7, 7, 7, 0.5) 0%, rgba(0, 0, 0, 0) 70%),url({{asset('Backend/img/firstsection/' .$value->image)}});">
          <div class="container">

            <div class="row">
             
              <div class="col-lg-12">
                <h2>{{ $value->title}}
              </h2>
             <button> <a href="{{ $value->button_url}}">{{ $value->button_text}}</a></button>
               
                
                </div>
              </div>
            </div>

         
        </section><!-- End About Section -->
        @endforeach

        <!-- ======= Services Section ======= -->
        <section id="team" class="services section-bg">
          <div class="container">

            @foreach($teamvalues as $teamvalue)
            <div class="section-title">
            
              <h2>{{$teamvalue->title}}</h2>
              <p>{{$teamvalue->paragraph}}</p>
            </div>
             @endforeach

            <div class="row">
               @foreach($teamimages as $teamimage)
              <div class="col-md-6 col-lg-3" >
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('Backend/img/teamimage/'.$teamimage->image)}}" alt=""></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">{{$teamimage->title}}</a></h4>
                
                </div>
              </div>
              @endforeach

              <!-- <div class="col-md-6 col-lg-3">
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('frontend/assets/img/Group1.png')}}" alt=""></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">Customer Service Representatives</a></h4>
                 
                </div>
              </div> -->

            <!--   <div class="col-md-6 col-lg-3">
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('frontend/assets/img/Group2.png')}}" alt=""></i></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">Community Managers</a></h4>
                 
                </div>
              </div> -->

              <!-- <div class="col-md-6 col-lg-3">
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('frontend/assets/img/Group3.png')}}" alt=""></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">Query managers</a></h4>
                  
                </div>
              </div> -->
               @foreach($teamvalues as $teamvalue)
              <div class="btn-view">
                <button><a href="{{$teamvalue->button_url}}">{{$teamvalue->button_text}}</a></button>
              </div>
            @endforeach

          </div>
        </section><!-- End Services Section -->

        <!-- ======= Services1 Section ======= -->
        <section id="services1" class="services section-bg1">
          <div class="container">

             @foreach($writerSections as $writerSection)
            <div class="section-title1">
            
              <p>{{$writerSection->title}}</p>
              
            </div>
            @endforeach

          <div class="icon-design">
            <div class="row">
            @foreach($WriterImages as $WriterImage)
              <div class="col-md-6 col-lg-4" >
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('Backend/img/writerimage/' . $WriterImage->image)}}" alt=""></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">{{$WriterImage->title}}</a></h4>
                
                </div>
              </div>
              @endforeach
              <!-- <div class="col-md-6 col-lg-4">
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('frontend/assets/img/botoom.png')}}" alt=""></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">SEO Writers</a></h4>
                 
                </div>
              </div> -->

              <!-- <div class="col-md-6 col-lg-4">
                <div class="icon-box">
                  <div class="icon"><img src="{{asset('frontend/assets/img/bottom2.png')}}" alt=""></i></div>
                  <div class="icon"><img src="{{asset('frontend/assets/img/Line 2.png')}}" alt=""></div>
                  <h4 class="title"><a href="">Copy writers</a></h4>
                 
                </div>
               </div> -->
              </div>
               @foreach($writerSections as $writerSection)
              <div class="btn-view1">
                <button><a href="{{$writerSection->button_url}}">{{$writerSection->button_text}}</a></button>
              </div>
               @endforeach
          </div>
        </section>
        <!-- End Services1 Section -->

        <!-- ======= Team Section ======= -->
        <section id="choose" class="team">
          <div class="container">
        <div class="row">
          @foreach($ChosseUss as $ChosseUs)
            <div class="team-title1">  
              <h2>{{$ChosseUs->title}}</h2>      
            </div>
            @endforeach

            @foreach($ChooseUsImageOnes as $ChooseUsImageOne)
              <div class="col-md-6 col-lg-6" >
                <div class="one">
               <div class="left-part">
                
                  <img src="{{asset('Backend/img/chooseus/'.$ChooseUsImageOne->image)}}" alt="">
                </div>
               
                  <div class="right-part">
                  <h3>{{$ChooseUsImageOne->title}}</h3>
                  <p>{{$ChooseUsImageOne->paragraph}}</p>
              
                 </div>
              </div>
              </div>
              @endforeach
              @foreach($ChooseUsImagetwos as $ChooseUsImagetwo)

              <div class="col-md-6 col-lg-6" >
                 <div class="two">
               <div class="left-part">
                
                  <img src="{{asset('Backend/img/chooseus/'.$ChooseUsImagetwo->image)}}" alt="">
                </div>
               
                  <div class="right-part">
                  <h3>{{$ChooseUsImagetwo->title}}</h3>
                  <p>{{$ChooseUsImagetwo->paragraph}}</p>
              
                 </div>
               </div>
              </div>

              @endforeach
              @foreach($ChooseUsImagethrees as $ChooseUsImagethree)
              <div class="col-md-6 col-lg-6" >
                <div class="three">
               <div class="left-part">
                
                  <img src="{{asset('Backend/img/chooseus/'.$ChooseUsImagethree->image)}}" alt="">
                </div>
               
                  <div class="right-part">
                  <h3>{{$ChooseUsImagethree->title}}</h3>
                  <p>{{$ChooseUsImagethree->paragraph}}</p>
              
                 </div>
              </div>
              </div>
              @endforeach
              @foreach($ChooseUsImagefours as $ChooseUsImagefour)
              <div class="col-md-6 col-lg-6" >
                 <div class="four">
               <div class="left-part">
                
                  <img src="{{asset('Backend/img/chooseus/'.$ChooseUsImagefour->image)}}" alt="">
                </div>
               
            
                  <div class="right-part">
                  <h3>{{$ChooseUsImagethree->title}}</h3>
                  <p>{{$ChooseUsImagethree->paragraph}}</p>
              
                 </div>
               </div>
              </div>
              @endforeach
              @foreach($ChosseUss as $ChosseUs)
               <div class="btn-view2">
                <button><a href="{{$ChosseUs->button_url}}">{{$ChosseUs->button_text}}</a></button>
              </div>
             @endforeach
        </div>

        </div>
        </section><!-- End Services Section -->

<!--  Testimonial section start from here -->
       <div class="py-5">
  <div class="container">
    <div class="row">
      <div class="testimonial-title">
        <h2>Testimonials</h2>
      </div>
      <div class="col-lg-10 mx-auto testimonials owl-theme owl-carousel" style="background-color: #2057C2;border-radius: 30px; ">

        @foreach($testimonials as $testimonial)
        <div class="p-lg-5 d-flex align-items-center">
         
          <div class="author-text p-lg-5">
            <div class="px-5">
              
              <div class="col-md-12">
                <div class="col-md-1" style="float:left">
                  <div class="quote"><img src="{{asset('frontend/assets/img/quote.png')}}" alt="" style="width: 30px;"></div>
                
              </div>
              <div class="col-md-11">
                <div class="test-content">
                  <h4 class="font-weight-bold" style="color:#fff;">{{$testimonial->author_title}}</h4>
              <p class="text-muted mb-0">{{$testimonial->author_position}}</p>
                </div>
                
              </div>
            </div>
              
              <p class="lead pb-lg-5" style="font-weight: 500;">{{$testimonial->description}}</p>
              
            </div>
          </div>
           <div class="author-img"> <img src="{{asset('Backend/img/testimonial/' .$testimonial->image)}}" class="img-fluid"> </div>
        </div>
           @endforeach

      <!--   <div> -->
         <!--  <div class="p-lg-5 d-flex align-items-center">
            
            <div class="author-text p-lg-5">
              <div class="px-5">
                 <div class="col-md-12">
                <div class="col-md-1" style="float:left">
                  <div class="quote"><img src="{{asset('frontend/assets/img/quote.png')}}" alt="" style="width: 30px;"></div>
                
              </div>
              <div class="col-md-11">
                <div class="test-content">
                  <h4 class="font-weight-bold" style="color:#fff;">Mathias Hermansen</h4>
              <p class="text-muted mb-0">Director, Corporate Innovation, Verisure</p>
                </div>
                
              </div></div>
                <p class="lead pb-lg-5" style="font-weight: 500;">We were looking to accelerate our developments efforts and access new talent with Crossbeam we got all that plus a ton of flexibility for a good price.</p>
                
              </div>
            </div>
            <div class="author-img"> <img src="{{asset('frontend/assets/img/testimonial.png')}}" class="img-fluid"> </div>
          </div> -->
        <!-- </div>
        <div> -->
          <!-- <div class="p-lg-5 d-flex align-items-center">
            
            <div class="author-text p-lg-5">
              <div class="px-5">
                 <div class="col-md-12">
                <div class="col-md-1" style="float:left">
                  <div class="quote"><img src="{{asset('frontend/assets/img/quote.png')}}" alt="" style="width: 30px;"></div>
                
              </div>
              <div class="col-md-11">
                <div class="test-content">
                  <h4 class="font-weight-bold" style="color:#fff;">Mathias Hermansen</h4>
              <p class="text-muted mb-0">Director, Corporate Innovation, Verisure</p>
                </div>
                
              </div></div>
                <p class="lead pb-lg-5" style="font-weight: 500;">We were looking to accelerate our developments efforts and access new talent with Crossbeam we got all that plus a ton of flexibility for a good price.</p>
                
              </div>
            </div>
            <div class="author-img"> <img src="{{asset('frontend/assets/img/testimonial.png')}}" class="img-fluid"> </div>
          </div> -->
      <!--   </div>
        <div> -->
          <!-- <div class="p-lg-5 d-flex align-items-center">
            
            <div class="author-text p-lg-5">
              <div class="px-5">
                 <div class="col-md-12">
                <div class="col-md-1" style="float:left">
                  <div class="quote"><img src="{{asset('frontend/assets/img/quote.png')}}" alt="" style="width: 30px;"></div>
                
              </div>
              <div class="col-md-11">
                <div class="test-content">
                  <h4 class="font-weight-bold" style="color:#fff;">Mathias Hermansen</h4>
              <p class="text-muted mb-0">Director, Corporate Innovation, Verisure</p>
                </div>
                
              </div></div>
                <p class="lead pb-lg-5" style="font-weight: 500;">We were looking to accelerate our developments efforts and access new talent with Crossbeam we got all that plus a ton of flexibility for a good price.</p>
                
              </div>
            </div>
            <div class="author-img"> <img src="{{asset('frontend/assets/img/testimonial.png')}}" class="img-fluid"> </div>
          </div> -->
        <!-- </div>
      </div> -->
   <!--  </div> -->
  <!-- </div> -->
</div>
 
        <section class="second-part" id="work">
          <div class="container">
            @foreach($WeWorks as $WeWork)
            <div class="row">
              <div class="heading">
                <h2>{{$WeWork->title}}</h2>
              </div>
              
              <div class="col-md-12 col-lg-12">
                <div class="paragraph">
                 <p>1</p>
                <h6>{{$WeWork->paragraph_one}}</h6>
                </div>
                <div class="paragraph">
                 <p>2</p>
                <h6>{{$WeWork->paragraph_two}}</h6>
                </div>
                 <div class="paragraph">
                 <p>3</p>
                <h6>{{$WeWork->paragraph_three}}</h6>
                </div>
                 <!-- <div class="paragraph1">
                 <p>2</p>
                <h6>Leave the heavy lifting to your project manager. From finding the right talent, to filtering CVs, taking interviews and managing day to day operations.</h6>
                </div>
                 <div class="paragraph2">
                 <p>3</p>
                <h6>Enjoy your one point of contact for everything. Make payments, scale your team, or start a new project - all in one place.</h6>
                </div>
              </div>
               -->
              <div class="btn-view3">
                <button><a href="{{$WeWork->button_url}}">{{$WeWork->button_text}}</a></button>
              </div>
            </div>
            
          </div>
          @endforeach
        </section>

        <!-- ======= Footer ======= -->
        <footer id="footer">


        <div class="container">
          <div class="copyright">
             © All Rights Reserved. 2022 by Zen Tribes.
          </div>

        </div>
        </footer><!-- End Footer -->


         @include('frontend.includes.footer')

        </body>

        </html>