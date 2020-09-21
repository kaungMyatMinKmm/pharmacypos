@extends('backendtemplate')

@section('content')

<div class="container-fluid row">
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h2 class="font-weight-bold text-success">Stocks List</h2>
                    </div>
                    
                    <div class="col-2">
                        <a href="{{route('admin.stocks.create')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right "  >
                            <i class="far fa-plus-square"></i> <span>Add</span>
                        </a>
                    </div>  
                </div>
            </div>

          <div class="card-body">
                <table class="table table-hover table-dark table-responsive-lg   data-table">
                      <thead>
                        <tr>
                          <th scope="col">Barcode No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Expired</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @php $i=1; @endphp

                        @foreach($stocks as $stock)

                        <tr class="add" data-id="{{$stock->id}}" data-name="{{$stock->name}}" data-price="{{$stock->price}}">
                            <th scope="row">{{$stock->barcode}}</th>
                            <td>{{$stock->name}}</td>
                            <td>{{$stock->expired}}</td>
                            <td>{{number_format($stock->sales_price)}}</td>
                            
                            <td>
                                <input type="button" name="add" value="Add" id="add" class="btn btn-outline-success" data-id="{{$stock->id}}" data-name="{{$stock->name}}" data-price="{{$stock->sales_price}}">
                            </td>
                        </tr>

                        @endforeach
                        
                      </tbody>
                </table>
          </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 ">
                        <h2 class="font-weight-bold text-success">Sales Voucher</h2>
                    </div>
                </div>
            </div>

            <div class="card-body" id="sales_tables">
                <table class="table table-hover table-dark table-responsive-lg" id="table">
                      <thead >
                        <tr>
                          <th class="no">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col" class="qty">Qty</th>
                          <th scope="col" class="sub">Subtotal</th>
                        </tr>
                      </thead>

                      <tbody id="voucher">
                      
                      </tbody >

                      <tfoot id="total">
                          
                      </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>


<div class="modal fade " id="printModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-success" id="printModal">Good Health</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                    <div class="modal-body">
                        <table class="table table-hover table-dark table-responsive-lg">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </thead>

                            <tbody id="modalBody">
                                
                            </tbody>

                            <tfoot id="modalFoot">
                                
                            </tfoot>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-outline-success clear" data-dismiss="modal">Print</a>
                    </div>
                  </form>
                </div>
              </div>
</div>




@endsection
