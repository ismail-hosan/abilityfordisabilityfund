@extends('admin.masterTemplate')
@section('menu-name')
ADD RULES
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add Zone</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-list-alt"></i> Add zone</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('storezone')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <label> Divisions *</label>
                                        <select class="form-control" name="divisions" id="division">
                                            <option value="" selected="" disabled="">Select A Division</option>
                                            @foreach($divisions as $each)
                                            <option value="{{ $each->id }}">{{ $each->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>kho
                                    <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                        <label> District *</label>
                                        <select class="form-control" name="district">
                                            <option value="" selected="" disabled="">Select A Districts</option>
                                            <!-- @foreach($districts as $dis)
                                            <option value="{{ $dis->id }}">{{ $dis->name }}</option>
                                            @endforeach -->
                                        </select>
                                        @error('district')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <label> Thana *</label>
                                        <select class="form-control thana" name="thana">
                                            <option value="" selected="" disabled="">Select A Thana</option>
                                            @foreach($upazilas as $thana)
                                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('thana')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <label> Zone *</label>
                                        <input type="text" placeholder="Zone name" name="zone" class="form-control">
                                    </div>
                                </div>
                                <p></p>
                                <div class="row col-md-12 offset-md-5">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('#division').change(function() {
        var division = $('#division').val();

        $.ajax({
            type: "post",
            url: "/zoneDistList", // path to function
            cache: false,

            data: {
                "_token": "{{ csrf_token() }}",
                division: division
            },
            success: function(val) {
                try {
                    $('.district').html(val);
                } catch (e) {
                    alert('Exception while request..');
                }

            },
            error: function() {
                alert('Error while request..');
            }
        });
    });

    $('#dist').change(function() {
        var district = $('#district').val();
        $.ajax({
            type: "post",
            url: "/zoneThanaList", // path to function
            cache: false,

            data: {
                "_token": "{{ csrf_token() }}",
                district: district
            },
            success: function(val) {

                try {
                    $('.thana').html(val);
                } catch (e) {
                    alert('Exception while request..');
                }

            },
            error: function() {
                alert('Error while request..');
            }
        });
    });
});
</script>
@endsection
