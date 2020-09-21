@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<div class="row">
	  		<div class="col-sm-10">
	    		<h2 class="font-weight-bold text-success">Stocks List</h2>
	    	</div>

	    	<div class="col-sm-2">
	    		<div class="row">
		    		<a href="{{route('admin.stocks.create')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right "  >
		    			<i class="far fa-plus-square"></i> <span>Add</span>
		    		</a>
		    	</div>
	    	</div>	
	  	</div>
	  </div>
	  <div class="card-body" >
		<div class="row"> 	
		  	<form action="{{route('admin.stocks.index')}}" method="GET" >
	    		<div class="form-group col">
	    			<input type="submit" name="nearest_exp" value="Nearest Exp:" class="btn btn-outline-danger btn-sm">
	    		</div>
	    		<div class="form-group col">
	    			<input type="submit" name="less_stocks" value="Less Stocks:" class="btn btn-outline-danger btn-sm">
	    		</div>
		    </form>
		</div>

		<div class="row"> 
		    <table class="table table-hover table-dark table-responsive-lg data-table">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Barcode</th>
				      <th scope="col">Name</th>
				      <th scope="col">Qty</th>
				      <th scope="col">Expired</th>
				      <th scope="col">Sales_Price</th>
				      <th scope="col" style="width: 25%;">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	@php $i=1; @endphp

				  	@foreach($stocks as $stock)

				  	<tr>
				  		<th scope="row">{{$i++}}</th>
				  		<td >{!! DNS1D::getBarcodeHTML($stock->barcode, 'C128A')!!}{{$stock->barcode}}</td>
				  		<td>{{$stock->name}}</td>
				  		<td>{{$stock->qty}}</td>
				  		<td>{{$stock->expired}}</td>
				  		<td>{{number_format($stock->sales_price)}}</td>
				  		
				  		<td>
				  			<a type="button" class="btn btn-outline-info btn-sm float-left mr-1 " id="detailStock" data-toggle="modal"
				  			 data-id="{{$stock->id}}" data-name="{{$stock->name}}" data-barcode="{{$stock->barcode}}" data-qty="{{$stock->qty}}" data-dname="{{$stock->distributor}}" data-mname="{{$stock->manufacturer}}" data-exp="{{$stock->expired}}" data-sprice="{{$stock->sales_price}}" data-bprice="{{$stock->buy_price}}" data-profit="{{$stock->profit}}" data-updated="{{$stock->updated_at}}" >Detail</a>

				  			<a href="{{route('admin.stocks.edit',$stock->id)}}" type="button" class="btn btn-outline-warning btn-sm float-left mr-1 ">Edit</a>

				  			<form action="{{route('admin.stocks.destroy',$stock)}}" method="POST" class="float-left " onsubmit="return confirm('Are You Sure Want To Delete?')">
				  				@csrf
				  				@method('DELETE')
				  				<button  type="submit" class="btn btn-outline-danger btn-sm mr-1">Delete</button>
				  			</form>
				  		</td>
				  	</tr>

				  	@endforeach
				  	
				  </tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade  modal-fade-scrollable" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stockModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-dark table-responsive-lg">
        	<tr>
        		<td class="float-left">Name:</td>
        		<td id="name" class="float-right"></td>
        	</tr>

        	<tr>
        		<td class="float-left">Barcode:</td>
        		<td id="barcode" class="float-right"></td>
        	</tr>

        	<tr>
        		<td class="float-left">Qty:</td>
        		<td id="qty" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Distributor:</td>
        		<td id="dname" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Manufacturer:</td>
        		<td id="mname" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Sales Price:</td>
        		<td id="sprice" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Buy Price:</td>
        		<td id="bprice" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Profit:</td>
        		<td id="profit" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Expired:</td>
        		<td id="exp" class="float-right"></td>
        	</tr>
        	<tr>
        		<td class="float-left">Updated:</td>
        		<td id="updated" class="float-right"></td>
        	</tr>

        	
        </table>
      </div>
     
      <div class="modal-footer">
      	
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
       
      </div>
      
    </div>
  </div>
</div>


@endsection
