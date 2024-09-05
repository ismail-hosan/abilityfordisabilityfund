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

                <div class="col-12 col-sm-12 col-md-12">

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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>User Note</th>
                                        <th>Amount</th>
                                        <th>Approve By</th>
                                        <th style="width:17%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($withdrawblance as $key=>$withdraw)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th>{{$withdraw->name}}</th>
                                        <th>{{$withdraw->phone}}</th>
                                        <th>
                                            @if($withdraw->status == 0)
                                            <div class="shadow-lg p-2 bg-warning rounded text-center">Pending</div>
                                            @elseif($withdraw->status == 1)
                                            <div class="shadow-lg p-2 bg-success rounded text-center">Completed</div>
                                            @endif
                                        </th>
                                        <th>{{$withdraw->date}}</th>
                                        <th>{{$withdraw->user_note}}</th>
                                        <th>{{$withdraw->amount}} TK</th>
                                        <th>
                                            {{App\Models\User::where('id',$withdraw->admin_id)->pluck('name')->first()}}
                                        </th>
                                        <th> <button type="button" class="btn btn-info">Action</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item bg-primary user_dialog" onclick="getData(<?php echo $withdraw->id ?>)" data-toggle="modal" href="#UserDialog">Message</a>
                                                @if($withdraw->status == 0)
                                                <a class="dropdown-item bg-info"
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{'approvewithraw/'.$withdraw->id}}">Approve</a>
                                                @elseif($withdraw->status == 1)
                                                <a class="dropdown-item bg-warning"
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{'unapprovewithdro/'.$withdraw->id}}">Unapprove</a>
                                                @endif
                                                <a class="dropdown-item bg-danger"
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{'/destroywithdraw/'.$withdraw->id}}">Delete</a>
                                            </div>


                                            <!-- End Message popup Model -->

                                        </th>
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

<div class="modal fade" id="UserDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-info shadow-sm rounded text-center" data-dismiss="modal"><i
                    class="fas fa-times-circle"></i></button>
            <form action="{{route('widthraw_confirmmess')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" rows="3" placeholder="Enter ..."></textarea>
                        <input type="hidden" id="withdraw_id" name="withdraw_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="return confirm('Are you sure?')"
                        class="btn btn-success shadow-lg p-2 rounded text-center">Send
                        Message</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function getData(withdraw_id){
       $("#withdraw_id").val(withdraw_id);
    }
</script>

@endsection
