@extends('admin.masterTemplate')
@section('menu-name')
ALL PAYMENT
@endsection
@section('main-content')
<style>
    .tablestyle3{
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL PAYMENT</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('memebr-payment') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> Payments</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  @if(session()->has('success'))
                  <div class="alert alert-success">
                  {{session()->get('success')}}
                  </div>
                  @endif
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Payments</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped tablestyle3">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Payment Type</th>
                                        <th>Status</th>
                                        <th>trnxid</th>
                                        <th>From Number</th>
                                        <th>To Number</th>
                                        <th>Note</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($allPayments as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->title}}</td>
                                        <td>
                                            @if($value->accept_status == 0)
                                            <button  style="width: 60px; color:white" class="btn btn-warning btn-xs">Pending</button>
                                            @elseif($value->accept_status == 1) 
                                            <button style="color: white; width: 60px;" class="btn btn-success btn-xs">Approved</button>
                                            @endif
                                        </td>
                                        <td>{{ $value->trnxid }}</td>
                                        <td>{{ $value->from_number }}</td>
                                        <td>{{ $value->to_number }}</td>
                                        <td>{{ $value->note }}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td>
                                            <a href="" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

