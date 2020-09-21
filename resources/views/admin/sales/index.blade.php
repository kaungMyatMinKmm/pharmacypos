@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<div class="row">
	  		<div class="col-12">
	    		<h2 class="font-weight-bold text-success">Sales List</h2>
	    	</div>
	    	
	  	</div>
	  </div>
	  <div class="card-body">
	  	
	  	<form action="{{route('sales.index')}}" method="get">


            <div class="form-group row">
	            <label for="from" class=" col-form-label">From</label>
		            <div class="col-sm-12 col-md-2 col-lg-2">
		              <input type="date" class="form-control" id="from" name="from">
		            </div>
                     	
	            <label for="to" class=" col-form-label ml-2">To</label>
		            <div class="col-sm-12 col-md-2 col-lg-2">
		              <input type="date" class="form-control" id="to" name="to">
		            </div>
	        
            	<div class="col-sm-12 col-md-2 col-lg-2">
              		<button type="submit" class="btn btn-outline-success">Search</button>
            	</div>
          	</div>
        </form> 
			

	    	<table class="table table-hover table-dark table-responsive-lg data-table">

			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Voucher No</th>
			      <th scope="col">Sale Date</th>
			      <th scope="col">Sale By</th>
			      <th scope="col">Total</th>
			      
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>

			  	@php $i=1; $total=0; $profit=0; $profitTotal=0; @endphp

			  	<!-- <tr><td>{{$sales}}</td></tr> -->
			  	<!-- <?php var_dump(count($sales)); ?> -->
			  	@foreach($sales as $sale)

			  	<tr>
			  		<th scope="row">{{$i++}}</th>
			  		<td >{{$sale->voucher_no}}</td>
			  		<td>{{date('M.d.Y', strtotime($sale->sale_date))}}</td>
			  		<td>{{$sale->user->name}}</td>
			  		<td>{{number_format($sale->total)}}</td>
			  		
			  		<td>
			  			<a href="{{route('sales.show',$sale->id)}}" type="button" class="btn btn-outline-info btn-sm float-left mr-1 ">Detail</a>

			  		@can('crud')
			  			<form action="{{route('sales.destroy',$sale)}}" method="POST" class="float-left " onsubmit="return confirm('Are You Sure Want To Delete?')">
			  				@csrf
			  				@method('DELETE')
			  				<button  type="submit" class="btn btn-outline-danger btn-sm mr-1">Delete</button>
			  			</form>
			  		@endcan
			  		</td>
			  	</tr>

			  	@endforeach
			  	
			  </tbody>
			  
			  <hr>

			  <tfoot>
			  		@foreach($sales as $sale)
			  			@php $total += $sale->total; @endphp
			  			
				  			@foreach($sale->stocks as $stock)
				  			@php $profit = $stock->profit;$profitTotal += $profit * ($stock->pivot->qty); @endphp
				  			@endforeach
			  		@endforeach

			  		<tr>
			  			<td colspan="4">Total</td>
			  			<td>{{number_format($total)}}</td>
			  		</tr>

			  	@can('crud')
			  		<tr>
			  			<td colspan="4">Profit</td>
			  			<td>{{number_format($profitTotal)}}</td>
			  		</tr>
			  	@endcan
			  		
			  	
			  </tfoot>
		</table>
	  </div>
</div>
@endsection