@extends('admin.masterTemplate')

@section('menu-name')
ADD Notice
@endsection
@section('main-content')
<style>
.tablestyle3 {
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
                    <h5 class="m-0 text-dark">Notice</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('add_notice')}}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-plus-square"></i> ADD NEW</a>
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
                    <div class="card">
                        @if(session()->has('status'))
                        <div class="alert alert-success">
                             {{session()->get('status')}}
                        </div>
                        @endif
                        @if(session()->has('destroy'))
                        <div class="alert alert-success">
                              {{session()->get('destroy')}}
                        </div>
                        @endif
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Notice</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>descriptino</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($viewnotice as $key=>$viewnotice)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$viewnotice->title}}</td>
                                        <td>{!! $viewnotice->descriptino !!}</td>
                                        <td>
                                            @if($viewnotice->status == 0)
                                            <a  href="{{'/activation/'.$viewnotice->id.'/'.$viewnotice->status}}" class="btn btn-success btn-xs">Active</a>
                                            @elseif($viewnotice->status == 1)
                                            <a href="{{'/activation/'.$viewnotice->id.'/'.$viewnotice->status}}" class="btn btn-warning btn-xs">Inactive</a>
                                            @endif
                                            </form>
                                        </td>
                                        <td>
                                            {{-- <a href="{{'/editnotice/'.$viewnotice->id}}" class="btn btn-xs btn-danger"><i class="fas fa-edit"></i></a> --}}
                                            <a href="{{ 'editnotice/'.$viewnotice->id}}" class="btn btn-xs btn-danger"><i class="fas fa-edit"></i></a>
                                            <a href="{{'/destroy/'.$viewnotice->id}}" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash-alt"></i></a>
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