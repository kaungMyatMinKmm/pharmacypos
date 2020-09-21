@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="card">
	  	<div class="card-header">
		  	<div class="row">
		  		<div class="col-10">
		    		<h2 class="font-weight-bold text-success">Purchases Detail <span>({{$purchase->voucher_no}})</span></h2>
		    	</div>

		    	<div class="col-2">
		    		<a href="{{route('admin.purchases.index')}}" type="button" class="btn btn-outline-success btn-block float-right "  >
		    			<i class="far fa-plus-arrow"></i> <span>Back</span>
		    		</a>
	    		</div>	
		  	</div>
	  	</div>
	
	  	<div class="card-body">
	  		
	  		
		    	<table class="table table-hover table-dark table-responsive-lg" >
		    	 	<thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Name</th>
					      <th scope="col">Qty</th>
					      <th scope="col">Unit Price</th>
					      <th scope="col">Subtotal</th>
					    </tr>
				  	</thead>

				  	@php $i=1; @endphp
				  	  
						<tbody>
							@php $i=1; @endphp
						  	   @foreach ($purchase->purchaseStocks as $data) 
						  	   @php $subtotal = ($data->pivot->qty)* ($data->buy_price) @endphp

									<tr>
										<td>{{$i++}}</td>
										<td>{{$data->name}}</td>
										<td>{{$data->pivot->qty}}</td>
										<td>{{number_format($data->pivot->buy_price)}}</td>
										<td>{{number_format($subtotal)}}</td>
									</tr>

								@endforeach
						</tbody>

				  		<tfoot>
					  		<tr>
					  			<td colspan="4">Total:</td>
					  			<td>{{$purchase->total}}</td>
					  		</tr>
				  		</tfoot>
					
		    	</table>
		   
	  	</div>
	   
	</div>
</div>

@endsection