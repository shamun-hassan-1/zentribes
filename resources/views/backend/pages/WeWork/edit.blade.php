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
	  					<form action="{{ route('wework.update', $WeWork->id) }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf

	  						<div class="form-group">
	  							<label>Add Title</label>
	  							<input type="text" name="title" class="form-control" value="{{ $WeWork->title}}">
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Paragraph One</label>
	  							<input type="text" name="paragraph_one" class="form-control" value="{{ $WeWork->paragraph_one}}">
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Paragraph two</label>
	  							<input type="text" name="paragraph_two" class="form-control" value="{{ $WeWork->paragraph_two}}">
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Paragraph three</label>
	  							<input type="text" name="paragraph_three" class="form-control" value="{{ $WeWork->paragraph_three}}">
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Button Text</label>
	  							<input type="text" name="button_text" class="form-control" value="{{ $WeWork->button_text}}">
	  							
	  						</div>

	  							<div class="form-group">
	  							<label>Button Url</label>
	  							<input type="text" name="button_url" class="form-control" value="{{ $WeWork->button_url}}">
	  							
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

