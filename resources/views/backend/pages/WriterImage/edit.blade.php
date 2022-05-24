@extends ('backend.layout.template')


@section ('body')
 
 <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        
      </div>

      <div class="br-pagebody">
	        <div class="row row-sm">
	          <div class="col-sm-6 col-xl-3">
	          </div>
	        </div>
	  </div>

	  <div class="br-pagebody">
	  	<div class="row row-sm">
	  		<div class="col-sm-12 col-xl-12">
	  			<!---------body content start------------->
	  			<div class="card bd-0 shadow-base">
	  				<div class="d-md-flex justify-content-between pd-25">
	  					<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update  Information</h6>
	  					</div>

	  					
	  				</div>
	  				<div class="pd-1-25 pd-r-15 pd-b-25">
	  					<form action="{{ route('writerimage.update', $WriterImage->id) }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf

	  						<div class="form-group">
	  							<label>Add Title</label>
	  							<input type="text" name="title" class="form-control" value="{{ $WriterImage->title}}">
	  							
	  						</div>
	  						

	  						

	  						<div class="form-group">
	  							<label>Image</label><br>

	  							@if(!is_null($WriterImage->image))
						      	<img src="{{ asset('Backend/img/writerimage' )}}/{{ $WriterImage->image }}" width="40">

						      	@else
						      	No Image

						      	@endif
						      	<br>
						      	<br>
	  							<input type="file" class="form-controle-file" name="image">
	  							
	  						</div>

	  						<div class="form-group">
	  							<input type="submit" name="updateContent" class="btn btn-primary" value="Save Change">
	  							
	  						</div>
	  						
	  						
	  					</form>
	  					
	  				</div>

	  				
	  			</div>
	  			<!---------body content end------------->
	  			
	  		</div>
	  		
	  	</div>
	  	
	  </div>

@endsection

