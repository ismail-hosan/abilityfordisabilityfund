
@extends('admin.masterTemplate')

@section('menu-name')
Notice
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Notice</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
             <a href="{{'/Notice'}}" class="btn btn-sm float-right btn-info">All Notice</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif -->
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ url('updatenotice/'.$editview->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Notice</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" id="input" class="form-control" value="{{ $editview->title }}" placeholder="Title" title="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Notice descriptino</label>
                                    <div class="col-sm-9">
                                        <textarea class="textarea" name="descriptino" placeholder="Place some text here"
                                           style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                           {{ $editview->descriptino }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-info">SAVE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection

