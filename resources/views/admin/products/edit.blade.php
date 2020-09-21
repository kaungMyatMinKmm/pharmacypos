@extends('backendtemplate');
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h2 class="font-weight-bold text-success">Edit Product</h2>
                            </div>
                            
                            <div class="col-2">
                                <a href="{{route('admin.products.index')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right"  >
                                    <i class="far fa-arrow-alt-circle-left"></i> <span>Back</span>

                                </a>
                            </div>
                        </div>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.products.update', $product)}}" method="POST">
                        @csrf
                        {{method_field ('PUT')}}

                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" autofocus="autofocus" required="required">
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Barcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="barcode" name="barcode" value="{{$product->barcode}}" required="required">
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