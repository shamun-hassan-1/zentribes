@extends ('backend.layout.template')


@section ('body')
 


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
	  					

	  					
	  				</div>
	  				<div class="pd-1-25 pd-r-15 pd-b-25">
	  					<form action="{{ route('chooseusimage.store') }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf
	  						<div class="form-group">
	  							<label>Serial Number (1 - 4)</label>
	  							<input type="text" name="serial_number" class="form-control">
	  							
	  						</div>

	  						<div class="form-group">
	  							<label>Add Title</label>
	  							<input type="text" name="title" class="form-control">
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Add Paragraph</label>
	  							<input type="text" name="paragraph" class="form-control">
	  							
	  						</div>
	  					

	  						<div class="form-group">
	  							<label>Image</label>
	  							<input type="file" class="form-controle-file" name="image">
	  							
	  						</div>

	  						<div class="form-group">
	  							<input type="submit" name="addContent" class="btn btn-primary" value="Add New Content">
	  							
	  						</div>
	  						
	  						
	  					</form>
	  					
	  				</div>

	  				
	  			</div>
	  			<!---------body content end------------->
	  			
	  		</div>
	  		
	  	</div>
	  	
	  </div>

@endsection

