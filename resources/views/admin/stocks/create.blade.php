@extends('backendtemplate')
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

                    <form action="{{route('admin.stocks.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                  <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                          </div>

                          <div class="form-group row">
                            <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control @error('qty') is-invalid @enderror " id="qty" name="qty">

                               @error('qty')
                                  <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="distributor" class="col-sm-3 col-form-label">Distributor</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control @error('distributor') is-invalid @enderror" id="distributor" name="distributor">

                              @error('distributor')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="manufacturer" class="col-sm-3 col-form-label">Manufacturer</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="manufacturer" name="manufacturer">
                              @error('name')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="expired" class="col-sm-3 col-form-label">Expired</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" id="expired" name="expired">

                              @error('name')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="buy_price" class="col-sm-3 col-form-label">Buy Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="buy_price" name="buy_price">

                              @error('name')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="sales_price" class="col-sm-3 col-form-label">Sales Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="sales_price" name="sales_price">

                              @error('name')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="profit" class="col-sm-3 col-form-label">Profit</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="profit" name="profit">

                              @error('name')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="file" class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-9">
                              <input type="file" class="" id="file" name="file">
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-outline-success btn-block">Add</button>
                            </div>
                          </div>
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>

@endsection