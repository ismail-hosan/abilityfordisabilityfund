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
                    <h5 class="m-0 text-dark">Social Media</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fas fa-thumbs-up"></i> Social Media</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('socialupdate')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary" type="button"> <i style="font-size:1em;"
                                                class="fab fa-facebook-square"> Facebook</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->facebook}}"  name="facebook" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <hr>
                                  <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-danger" type="button"> <i style="font-size:1em;"
                                                class="fab fa-youtube-square"> Youtube</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->youtube}}"  name="youtube" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-warning" type="button"> <i style="font-size:1em;"
                                                class="fab fa-google"> Google</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->google}}" name="google" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary" type="button"> <i style="font-size:1em;"
                                                class="fab fa-twitter"> Twitter</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->twitter}}" name="twitter" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn btn-danger" type="button"> <i style="font-size:1em;"
                                                class="fab fa-instagram"> Instagram</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->instagram}}" name="instagram" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-1">

                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-info" type="button"> <i style="font-size:1em;"
                                                class="fab fa-linkedin">
                                                Linkedin</i></button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$social->linkedin}}" name="linkedin" class="form-control" id="">
                                    </div>
                                    <div class="col-1">

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-5">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Change</button>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection