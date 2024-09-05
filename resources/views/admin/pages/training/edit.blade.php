@extends('admin.masterTemplate')

@section('menu-name')
Edit A Training
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
                        <div class="card-header bg-blue text-center"> EDIT TRAINING </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post"
                                        action="{{route('training.update',$trainings->id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">Title</label>
                                                <input type="text" value="{{$trainings->title}}" name="title"
                                                    class="form-control">
                                            </div>
                                            @error('title')
                                            <div class="alert  alert-danger" style="padding: 0;">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </div>
                                            @enderror
                                            <div class="col-md-6 form-group">
                                                <label for="">Techer Name</label>
                                                <input type="text" name="techer_name"
                                                    value="{{$trainings->techer_name}}" class="form-control">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="inputName">Description</label>
                                                <textarea class="textarea" style="padding: 36px!important;"
                                                    name="description"
                                                    placeholder="Full Job Description with Contact info"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                    {!! $trainings->description  !!}
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
                                                    <option {{$trainings->category == $value->id? "selected":"" }}
                                                        value="{{$value->id}}">{{$value->name}}</option>
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
                                                    <option {{$trainings->type == "Paid" ? "selected":"" }}
                                                        value="Paid">Paid</option>
                                                    <option {{$trainings->type == "Free" ? "selected":"" }}
                                                        value="Free">Free</option>
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
                                                <input type="date" value="{{$trainings->date}}" name="date"
                                                    class="form-control">
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
                                                <br>
                                                <br>
                                                <img src="{{asset($trainings->image)}}" width="20%">
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
    var amount = "{{$trainings->amount}}";
    function typecheck(value) {
        if (value == "Paid") {
            $('#ammount').html(`<label for="">Ammount</label><input type="text" value="${amount}" name="amount" class="form-control">`).show().fadeIn();
        } else if (value == "Free") {
            $('#ammount').hide();
        }
    }
    var type = "{{$trainings->type}}";
    typecheck(type);
</script>
@endsection
<!-- Content Wrapper. Contains page content -->
