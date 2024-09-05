
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
                    <h5 class="m-0 text-dark">GALLERY</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('list-gallery') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-list-alt"></i> All Images</a>
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
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('gallerystore')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category_id">
                                            <option value="" selected="" disabled="">All Category</option>
                                            @foreach($categorys as $each)
                                            <option value="{{ $each->id }}"  >{{ $each->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">
                                            <strong>
                                                {{$message}}
                                            </strong><br>                                                
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Gallery Images <em style="font-size: 9px">(multi images)</em></label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image[]" class="form-control" multiple>
                                        <span style="color: red; font-size: 9px">Image size should be width: 400px, height: 300px</span>
                                        @error('image')
                                        <div class="alert alert-danger">
                                            <strong>

                                                {{$message}}
                                            </strong>
                                            <br>                                                        
                                        </div>
                                        @enderror
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
<script>
$(document).ready(function(){
         $(".alert").slideDown(300).delay(5000).slideUp(300);
    });
</script>

@endsection
<!-- Content Wrapper. Contains page content -->
