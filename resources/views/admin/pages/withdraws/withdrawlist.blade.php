@extends('admin.masterTemplate')

@section('menu-name')
Withdraw
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Withdraw</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{'/Withdraw'}}" class="btn btn-sm btn-info float-right"><i class="fa fa-list-alt"></i>
                        Withdraw List</a>
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


                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            @if($withdrawcount > 0 )
                           <h3 class="text-center"><b>You are already apply</b> !</h3>
                            @elseif($withdrawcount == 0 )
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <div class="shadow-lg p-3 mb-4 bg-info rounded text-center"
                                                style="font-family: American Typewriter, serif;">Withdraw Balance
                                            </div>
                                            <h6 style="font-family:Jazz LET, fantasy ">BDT: {{$withdrawblance}} TK</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <form action="{{route('storewithdraw')}}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-md-3 col-form-label">Withdraw Amount</label>
                                                    <div class="col-sm-10 col-md-9">
                                                        <input type="number" name="withdraw_amount" value=""
                                                            class="form-control" placeholder="Withdraw Amount">
                                                        <input type="hidden" name="withdraw_limit"
                                                            value="{{$withdrawblance}}" class="form-control"
                                                            placeholder="Withdraw Amount">
                                                        @error('withdraw_amount')
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
                                                    <label for="inputName"
                                                        class="col-sm-2 col-md-3 col-form-label">Note</label>
                                                    <div class="col-sm-10 col-md-9">
                                                        <textarea class="form-control" name="note" rows="3"
                                                            placeholder="Enter ..."></textarea>

                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-9">

                                                        <button type="submit"
                                                            class="btn btn-info btn-block" onclick="return confirm('Are you sure?')">Withdraw</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>


@endsection