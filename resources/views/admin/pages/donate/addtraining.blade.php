@extends('admin.masterTemplate')

@section('menu-name')
POST A Training
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Training POST</h5>
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
                        <div class="card-header bg-blue text-center"> POST NEW TRAINING </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post" action="{{route('training.store')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control">
                                                @error('title')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">Techer Name</label>
                                                <input type="text" name="techer_name" class="form-control">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="inputName">Description</label>
                                                <textarea class="textarea" style="padding: 36px!important;"
                                                    name="description"
                                                    placeholder="Full Job Description with Contact info"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                                            </textarea>
                                                @error('description')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="category">Category</label>
                                                <select name="category" class="form-control">
                                                    <option disabled selected>Select</option>
                                                    @foreach($caregorys as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Type</label>
                                                <select name="type" onchange="typecheck(this.value)"
                                                    class="form-control">
                                                    <option selected disabled>select</option>
                                                    <option value="Paid">Paid</option>
                                                    <option value="Free">Free</option>
                                                </select>
                                                @error('type')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group" id="ammount" style="display: none;">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">Date</label>
                                                <input type="date" name="date" class="form-control">
                                                @error('date')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="img"
                                                        id="customFile">
                                                    <label class="custom-file-label" id="formFile"
                                                        for="customFile">Choose
                                                        file</label>
                                                </div>
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

<script>
    function typecheck(value) {
        if (value == "Paid") {
            $('#ammount').html(`<label for="">Ammount</label><input type="text" name="amount" class="form-control">`).show().fadeIn();
        } else if (value == "Free") {
            $('#ammount').hide();
        }
    }
</script>
@endsection
<!-- Content Wrapper. Contains page content -->
