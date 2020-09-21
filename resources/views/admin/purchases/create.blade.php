@extends('backendtemplate')
@section('content')

<div class="container-fluid row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h2 class="font-weight-bold text-success">Create Purchase</h2>
                    </div>

                    <div class="col-2">
                      <a type="button"  type="button" class="btn btn-outline-info btn-sm float-left" id="" data-toggle="modal" data-target="#add-stock" class="btn btn-outline-success btn-block float-right "  >
                        <i class="far fa-plus-square"></i> <span>Add stock</span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                  <table class="table table-hover table-dark table-responsive-lg">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Expired</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Buy Price</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody id="purchase">
                      
                    </tbody>

                    <tfoot id="purchaseFoot">
                    </tfoot>

                  </table>
            </div>
        </div>
    </div>

</div>


<div class="modal fade  modal-fade-scrollable" id="add-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">stock Name</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <table class="table table-hover table-dark table-responsive-lg   data-table">
          
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($stocks as $stock)
          <tbody>
            <tr>
              <td>{{$stock->id}}</td>
              <td>{{$stock->name}}</td>
              <td>
                <a type="button" class="btn btn-outline-warning btn-sm" id="addStock" data-id="{{$stock->id}}" data-name="{{$stock->name}}">Add</a>
              </td>
            </tr>

          </tbody>
          @endforeach
        </table>
      </div>
     
      <div class="modal-footer">
        
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
       
      </div>
      
    </div>
  </div>
</div>

@endsection