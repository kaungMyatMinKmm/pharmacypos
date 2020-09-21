@extends('backendtemplate');
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h2 class="font-weight-bold text-success">Add Stocks</h2>
                            </div>
                            
                            <div class="col-2">
                                <a href="{{route('admin.stocks.index')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right"  >
                                    <i class="far fa-arrow-alt-circle-left"></i> <span>Back</span>

                                </a>
                            </div>
                        </div>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.stocks.update', $stock)}}" method="POST">
                        @csrf
                        {{method_field ('PUT')}}

                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" name="name" value="{{$stock->name}}" autofocus="autofocus">
                            </div>
                          </div>

                          <div class="form-group row">
                          <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="qty" name="qty" value="{{$stock->qty}}" autofocus="autofocus">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="distributor" class="col-sm-3 col-form-label">Distributor</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="distributor" name="distributor" value="{{$stock->distributor}}" required="required" >
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="manufacturer" class="col-sm-3 col-form-label">Manufacturer</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{$stock->manufacturer}}" required="required">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="expired" class="col-sm-3 col-form-label">Expired</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" id="expired" name="expired" value="{{$stock->expired}}" required="required">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="buy_price" class="col-sm-3 col-form-label">Buy Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="buy_price" name="buy_price" value="{{$stock->buy_price}}" required="required">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="sales_price" class="col-sm-3 col-form-label">Sales Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="sales_price" name="sales_price" value="{{$stock->sales_price}}" required="required">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="profit" class="col-sm-3 col-form-label">Profit</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="profit" name="profit" value="{{$stock->profit}}" required="required">
                            </div>
                          </div>

                          


                      
                          
                          <div class="form-group row">
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-outline-success">Update</button>
                            </div>
                          </div>
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>

@endsection