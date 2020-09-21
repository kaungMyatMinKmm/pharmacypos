@extends('backendtemplate')
@section('content')


@php  $todaytotal=0; $yearly_sales=0;  @endphp

  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>

<!-- Content Row -->
<div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today Sales</div>
          
          @foreach($today as $todaySales)
          	@php $todaytotal += $todaySales->total; @endphp
          @endforeach
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($todaytotal)}}</div>
          
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Annual Sales</div>

          @foreach($this_year as $year)
          	@php $yearly_sales += $year->total; @endphp

          @endforeach
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($yearly_sales)}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Live Stocks</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              
            
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$stocks->count()}}</div>
              
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Users</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Content Row -->

<div class="row">

<!-- Area Chart -->
<div class="col-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
        <canvas id="myAreaChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Pie Chart -->
<div class="col-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Purchases</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="">
          <table class="table table-hover table-dark table-responsive-lg-sm-md data-table"  width="100%" cellspacing="0">
                  
                  <thead>
                      <tr>
                        <th> No</th>
                        <th> Name </th>
                        <th> Total </th>
                      </tr>
                    </thead>

                    <tbody>
                      
                        @php $i=1; $total=0; $profit=0; @endphp

                        @foreach($purchases as $purchase)

                          @foreach ($purchase->purchaseStocks as $data) 

                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td >{{$data->name}}</td>
                              <td >{{$purchase->total}}</td>
                            </tr>

                          @endforeach
                        @endforeach
                    </tbody>

                    <tfoot>
                        @foreach($purchases as $purchase)
                            @php $total += $purchase->total; @endphp
                        @endforeach

                        <tr>
                            <td colspan="4">Total</td>
                            <td>{{$total}}</td>
                        </tr>
                    </tfoot>

          </table>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Content Row -->
    <div class="row">

    <!-- Content Column -->
       
    </div>

</div>

@endsection