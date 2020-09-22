@extends('backendtemplate')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-8">
            @if(session('info'))
              <div class="alert alert-info">
                {{session('info')}}
              </div>
            @endif
            
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

                      <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a href="#manual-form" class="nav-link active text-success" data-toggle="tab" >Manual</a>
                        </li>

                        <li class="nav-item">
                          <a href="#excel-form" class="nav-link text-success" data-toggle="tab" >Excel </a>
                        </li> 
                      </ul>


                      <div class="tab-content" id="myTabContent">

                        <div id="manual-form" class="tab-pane fade show active" role="tabpanel" aria-labelledby="manual-form-tab">
                          
                          <div class="form-group row mt-3">
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
                              <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer">
                              @error('manufacturer')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="expired" class="col-sm-3 col-form-label">Expired</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired">

                              @error('Expired')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="buy_price" class="col-sm-3 col-form-label">Buy Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control @error('buy-price') is-invalid @enderror" id="buy_price" name="buy_price">

                              @error('buy-price')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="sales_price" class="col-sm-3 col-form-label">Sales Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control @error('sales-price') is-invalid @enderror" id="sales_price" name="sales_price">

                              @error('sales-price')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="profit" class="col-sm-3 col-form-label">Profit</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control @error('profit') is-invalid @enderror" id="profit" name="profit">

                              @error('profit')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                          </div>

                        </div>

                      
                        <div id="excel-form" class="tab-pane fade mt-3" role="tabpanel" aria-labelledby="excel-form">
                          <div class="form-group row">
                            <label for="file" class="col-sm-3 col-form-label">Upload File</label>
                            <div class="col-sm-9">
                              <input type="file" class="" id="file" name="file">
                            </div>
                          </div>
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