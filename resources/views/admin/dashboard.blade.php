@extends('layouts.master')

@section('content')
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $userCount }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user nav-icon"></i>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $reserveCount }}</h3>

                <p>Reserves</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle nav-icon"></i>
              </div>
              <a href="{{ route('reservas.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $productCount }}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-warehouse small nav-icon"></i>
              </div>
              <a href="{{ route('products.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <br/>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- /.card -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Client Name</th>
                      <th>Product Name</th>
                      <th>Order Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($lastReserves as $last)
                      <tr>
                        <td><a href="pages/examples/invoice.html">{{ $last->id}}</a></td>
                        <td>{{ $last->user->name }}</td>
                        <td>{{ $last->product->name }}</td>
                        <td><span class="badge badge-success">{{ $last->status }}</span></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route('reservas.index') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <br/>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($lastProducts as $last)
                  <li class="item">
                    <div class="product-img">
                      <img src="img/products/{{ $last->image }}" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{ $last->name }}
                        <span class="badge badge-warning float-right">{{ $last->price }}</span></a>
                      <span class="product-description">
                          {{ $last ->description}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ route('products.index')}}" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>

            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($lastUsers as $last)
                      <li>
                        <img src="./img/users/{{ $last->image }}" width="100" height="100">
                        <a class="users-list-name" href="#">{{ $last->name }}</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ route('users.index') }}">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
              </div>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
