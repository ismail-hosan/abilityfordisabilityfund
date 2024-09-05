@extends('admin.masterTemplate')

@section('menu-name')
ALL Withdraw
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL Withdraw</h5>
                </div>
                <div class="col-sm-6 ">
                    <a href="{{route('applywithdraw')}}" class="btn btn-sm btn-info float-right"><i class="fas fa-plus-square"></i> Apply Withdraw </a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">

    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- /.col -->
                <div class="col-md-1 "></div>
                <div class="col-12 col-sm-12 col-md-10">
                    
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    <button class="close" data-dismiss="alert"></button>
                    {{ session()->get('success') }}
                    </div>
                    @endif
                    
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fas fa-hand-holding-usd"></i> All Withdraw</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Admin Note</th>
                                        <th style="width: 20%;">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             @foreach($listionwithdraw as $key=>$list)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$list->amount}}</td>
                                        <td>{{$list->date}}</td>
                                        <td>
                                        @if(empty($list->admin_note))
                                        {{"Wait for admin's Reply"}}
                                        @else
                                        {{$list->admin_note}}
                                        @endif
                                        </td>
                                        <td>
                                        @if( $list->status == 1 )
                                        <div class="shadow-lg p-2 bg-success rounded text-center"><i class="fas fa-check"></i> Completed
                                         </div>
                                        @elseif($list->status == 0)
                                        <div class="shadow-lg p-2 bg-warning rounded text-center "><i class="fas fa-exclamation-triangle "></i> Pending </div>
                                        @endif
                                        </td>
                                        </td>
                                        <td>
                                        @if( $list->status == 0 )
                                         <a href="{{'/deletewithdraw/'.$list->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger" disabledl><i class="far fa-trash-alt"></i></a>
                                        @elseif($list->status == 1)
                                        <a  class="btn bg-success disable" ><i class="fas fa-check-circle"></i></a>
                                        @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
$('div.alert').delay(3000).slideUp(300);
</script>

@endsection
<!-- Content Wrapper. Contains page content -->
