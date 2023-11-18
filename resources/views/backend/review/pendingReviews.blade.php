@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pending Reviews</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>User </th>
                                            <th>Poduct Name </th>
                                            <th>Summary </th>
                                            <th>Review </th>
                                            <th>Stars </th>
                                            <th>Status </th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendingReviews as $item)
                                            <tr>
                                                <td> {{ $item->user->name }} </td>
                                                <td> {{ $item->product->product_name_en }} </td>
                                                <td> {{ $item->summary }} </td>
                                                <td> {{ $item->review }} </td>
                                                <td>
                                                    @for($i=1; $i <= $item->stars; $i++)
                                                        <i class="fa fa-star checked"></i>
                                                    @endfor

                                                    @for($j= $item->stars ; $j<5; $j++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <span class="badge badge-pill badge-primary">Pending </span>
                                                    @elseif($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Success </span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="{{route('approve.review',$item->id)}}" class="btn btn-danger">Approve </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->






            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
