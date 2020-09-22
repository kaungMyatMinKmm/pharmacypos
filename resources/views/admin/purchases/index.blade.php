@extends('backendtemplate')
@section('content')

<div class="container-fluid">

    @if(session('info'))
        <div class="alert alert-primary">
          {{session('info')}}
        </div>
    @endif

    @if(session('delete'))
        <div class="alert alert-danger">
          {{session('delete')}}
        </div>  
    @endif

    
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-sm-10">
                <h2 class="font-weight-bold text-success">Purchase List</h2>
            </div>

            <div class="col-sm-2">
                <div class="row">
                    <a href="{{route('admin.purchases.create')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right "  >
                        <i class="far fa-plus-square"></i> <span>Add New</span>
                    </a>
                </div>
            </div>  
        </div>
      </div>

      <div class="card-body" >
        <form action="{{route('admin.purchases.index')}}" method="get">


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
        <div class="row">
            <div class="col-12"> 
                <table class="table table-hover table-dark table-responsive-lg " >
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Date</th>
                          <th scope="col">Voucher_no</th>
                          <th scope="col">Distributor</th>
                          <th scope="col">Manufacturer</th>
                          <th scope="col">Total</th>
                          <th scope="col" style="width: 25%;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                            @php $i=1; $total=0; $profit=0; @endphp

                            @foreach($purchases as $purchase)

                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td >{{date('M.d.Y',strtotime($purchase->created_at))}}</td>
                                <td >{{$purchase->voucher_no}}</td>
                                <td >{{$purchase->distributor}}</td>
                                <td>{{$purchase->manufacturer}}</td>
                                <td>{{number_format($purchase->total)}}</td>
                                
                                <td>
                                    <a href="{{route('admin.purchases.show',$purchase->id)}}" type="button" class="btn btn-outline-info btn-sm float-left mr-1 ">Detail</a>

                                @can('crud')
                                    <form action="{{route('admin.purchases.destroy',$purchase)}}" method="POST" class="float-left " onsubmit="return confirm('Are You Sure Want To Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit" class="btn btn-outline-danger btn-sm mr-1">Delete</button>
                                    </form>
                                @endcan
                                </td>
                            </tr>

                            @endforeach
                      </tbody>

                        <tfoot>
                            @foreach($purchases as $purchase)
                                @php $total += $purchase->total; @endphp
                            @endforeach

                            <tr>
                                <td colspan="4">Total</td>
                                <td>{{number_format($total)}}</td>
                            </tr>
                        </tfoot>

                </table>
            </div>
        </div>
    </div>

</div>




<!-- Modal -->
<!-- <div class="modal fade  modal-fade-scrollable" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="purchaseModal"></h5>
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
</div> -->


@endsection
