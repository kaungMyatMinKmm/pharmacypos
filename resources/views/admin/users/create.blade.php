@extends('backendtemplate')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h2 class="font-weight-bold text-success">Users List</h2>
                            </div>
                            
                            <div class="col-2">
                                <a href="{{route('admin.users.index')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right"  >
                                    <i class="far fa-arrow-alt-circle-left"></i> <span>Back</span>

                                </a>
                            </div>
                        </div>
                </div>

                <div class="card-body">

                    <form action="{{route('admin.users.store')}}" method="POST">
                        @csrf

                          <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" name="email">
                            </div>
                          </div>

                          


                         <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="password" name="password">
                            </div>
                          </div>
                      
                          
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-outline-success">Add</button>
                            </div>
                          </div>
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>

@endsection