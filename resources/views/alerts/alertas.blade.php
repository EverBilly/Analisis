 @if(session()->has('msj'))
		<div class="container">
      		<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
      			<strong>{{session('msj')}}</strong>					
      		</div>
    	</div>
	@else
	@if(session()->has('error'))
		<div class="container">
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>{{session('error')}}</strong>
				</div>	
		</div>
	@endif
	@endif