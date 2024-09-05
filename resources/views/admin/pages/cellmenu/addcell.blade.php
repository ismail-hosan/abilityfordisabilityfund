@extends('admin.masterTemplate')

@section('menu-name')
GALLERY
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add Cell</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">

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
                            <form class="form-horizontal" method="post" action="{{ route('storecell')}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Menu</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="menu_id">
                                            <option value="" selected="" disabled="">All Menu</option>
                                            @foreach($Category as $menu)
                                            <option value="{{$menu->id}}">{{$menu->title}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Page Content</label>
                                    <div class="col-sm-9">

                                        <textarea class="textarea" name="cellcontent" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                     </textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputnumber" class="col-sm-3 col-form-label">Order No</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="inputnumber" name="order_no" placeholder="0"
                                            class="form-control">
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
