@extends('admin.masterTemplate')

@section('menu-name')
Edit About page
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Edit About Content</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('cell_index')}}" class="btn btn-info float-right"><i class="fa fa-plus-square"></i>
                        View List</a>
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

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{'/updatecell/'.$editpagemenu->id}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Menu</label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="editmenu_id">
                                            <option selected="" disabled="">All Menu</option>
                                            @foreach($menupage as $edit)
                                            <option {{ $editpagemenu->menu == $edit->id ? 'selected' : '' }}
                                                value="{{$edit->id}}">{{$edit->title}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Page Content</label>
                                    <div class="col-sm-9">

                                        <textarea class="textarea" name="celledit"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {!! $editpagemenu->content !!}
                                     </textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputnumber" class="col-sm-3 col-form-label">Order No</label>
                                    <div class="col-sm-9">
                                        <input type="number" value="{{$editpagemenu->orderNo}}" id="inputnumber"
                                            name="order_no" placeholder="0" class="form-control">
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
