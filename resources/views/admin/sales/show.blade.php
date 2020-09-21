@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="card">
	  	<div class="card-header">
		  	<div class="row">
		  		<div class="col-10">
		    		<h2 class="font-weight-bold text-success">Sales Detail <span>({{$sale->voucher_no}})</span></h2>
		    	</div>

		    	<div class="col-2">
		    		<a href="{{route('sales.index')}}" type="button" class="btn btn-outline-success btn-block float-right "  >
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
				  	  @foreach ($sale->stocks as $stock) 
				  	  @php $subtotal = ($stock->pivot->qty)* ($stock->sales_price) @endphp
           
						  	<tbody>
						  		<tr>
						  			<th scope="row">{{$i++}}</th>
						  			<td>{{$stock->name}}</td>
						  			<td>{{$stock->pivot->qty}}</td>
						  			<td>{{number_format($stock->sales_price)}}</td>
						  			<td>{{number_format($subtotal)}}</td>
						  		</tr>
						  	</tbody>
  
					  	@endforeach

					  		<tfoot>
						  		<tr>
						  			<td colspan="4">Total</td>
						  			
						  			<td colspan="">{{number_format($sale->total)}}</td>
						  		</tr>
					  		</tfoot>
					
		    	</table>
		   
	  	</div>
	   
	</div>
</div>

@endsection