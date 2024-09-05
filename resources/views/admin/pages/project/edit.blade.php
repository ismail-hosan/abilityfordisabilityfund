@extends('admin.masterTemplate')

@section('menu-name')
Add Project
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Project POST</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center"> EDIT PROJECT</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post"
                                        action="{{Route('project.update',$project->id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">Type</label>
                                                <select name="type" id="type" style="margin-bottom: 10px;border-radius: 5px;" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="current" {{ $project->type == 'current' ? 'selected' : '' }}>Current Project</option>
                                                    <option value="complite" {{ $project->type == 'complite' ? 'selected' : '' }}>Completed Project</option>
                                                </select>
                                                @error('type')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="first-name">Order By</label>
                                                <input type="number" id="order_by" name="order_by" value="{{$project->oderby ?? ''}}" class="form-control">
                                                @error('order_by')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">Name*</label>
                                                <input type="text" name="name"
                                                    value="{{$project->name ?? ''}}" class="form-control">
                                                @error('name')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Image*</label>
                                                <input type="file" name="image"
                                                    value="" class="form-control">

                                                @if($project->image)
                                                <img src="{{asset($project->image)}}" alt="" width="30%">
                                                @endif
                                                @error('image')
                                                <div class="error text-red text-bold" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">Description * :</label>
                                                <textarea name="description" class="form-control summernote"
                                                    rows="5">{{$project->desc ?? ''}}</textarea>
                                                @error('description')
                                                <span class=" error text-red text-bold">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="col-md-12 form-group">
                                                <label for="first-name">Meta</label>
                                                <input type="text" id="meta" name="meta" value="{{$project->meta ?? ''}}" class="form-control">
                                                @error('meta')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script type="text/javascript" src="{{asset('editor/ckeditor.js')}}"></script>
<!--<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>-->
<script>
    var allEditors = document.querySelectorAll('.summernote');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(
            allEditors[i], {
                fontSize: {
                    options: [
                        12, 13, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36
                    ],
                    supportAllValues: true
                },
            }
        );
    }
</script>


@endsection
<!-- Content Wrapper. Contains page content -->