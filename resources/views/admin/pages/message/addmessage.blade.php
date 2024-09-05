@extends('admin.masterTemplate')
@section('menu-name')
ADD MESSAGE
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">MESSAGE</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('messages') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> All Message</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-list-alt"></i> Add Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('storeMessage')}}" method="POST">
                                @csrf
                                <div class="form-group row">

                                    <label for="inputName" class="col-sm-3 col-form-label">Message Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="type">
                                            <option value="" selected="" disabled="">Select Category</option>

                                            @foreach($categories as $each)

                                            <option value="{{ $each->id }}"> {{ $each->title }}</option>
                                            @endforeach

                                        </select>
                                        @error('type')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>    
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <textarea class="textarea" name="message" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        </textarea>
                                    </div>
                                </div>
                                <div class=" col-sm-5 "></div>
                                <div class=" col-sm-6 ">
                                    <button type="submit" class="btn btn-info">SAVE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

