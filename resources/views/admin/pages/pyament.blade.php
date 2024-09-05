@extends('admin.masterTemplate')
@section('menu-name')
PAYMENT
@endsection
@section('main-content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">PAYMENT</h5>
                </div>
                <div class="col-sm-6 ">
                    <a href="{{ route('list-payment') }}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-list-alt"></i> All Payments</a>
                </div>
            </div>
        </div>
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- Profile Image -->
                    @if(session()->has('worning'))
                    <div class="alert alert-warning">
                        {{session()->get('worning')}}
                    </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header bg-success">
                            <h3 class="text-center" >Grateful for your generous donation — Thank you!</h3>
                        </div>
                        <div class="card-body box-profile">
                            <form class="form-horizontal" method="post" action="{{ route('payment-store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-md-6 "> Method</label>
                                        <select class="form-control" name="payment_method">
                                            <option value="" selected=""> --- Select Method --- </option>
                                            <option value="bkash" selected="">BKASH</option>
                                            <option value="nagad" selected="">NAGAD</option>
                                            <option value="paypal" selected="">PayPal</option>
                                            <option value="stripe" selected="">Stripe</option>
                                        </select>
                                        @error('payment_method')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-md-6 ">Amount</label>
                                        <input type="text" name="amount" value="" class="form-control" id=""
                                            placeholder="Enter Your Amount">
                                        @error('from_number')
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
                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-md-6 "> Transition ID </label>
                                        <input type="text" name="tx_id" value="" class="form-control" id=""
                                        placeholder="Enter Your Amount">
                                        @error('payment_method')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-md-6 "> Transition Image </label>
                                        <input type="file" name="tx_image" class="form-control">
                                        @error('from_number')
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
                                    <div class="col-sm-12">
                                        <label for="inputName" class="col-sm-2 col-form-label">Note</label>
                                        <textarea type="text" rows="1" name="note" value="" class="form-control" id="" placeholder="Type Your Note"></textarea>
                                    </div>
                                </div>
                                {{-- <input type="hidden" name="membercategory_id"
                                    value="<?php if(!empty($payment->membercategory_id)){ echo $payment->membercategory_id; }?>"
                                    class="form-control" id="" placeholder="Transaction ID"> --}}
                                <!-- end user_refer_id for  incentives table -->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-info" style="width:185px"
                                            {{-- {{empty($payment->membercategory_id) ? 'disabled':''}} --}}
                                            >Payment</button>
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
