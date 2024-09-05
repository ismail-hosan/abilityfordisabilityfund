@extends('admin.masterTemplate')

@section('menu-name')
CV VIEW
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Payment Details</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                        test.
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> BANGLADESH INDUSTRIAL ENGINEER'S ASSOCIATION (BIEA)
                                    <small class="float-right">Date: {{ $paymentDetails->date }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col text-center">

                                @if(!empty($userDetails->image))
                                <img class="profile-user-img img-fluid "
                                    src="{{asset('/images/' . $userDetails->image)}}" style=" width:120px; height:120px"
                                    alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('/memeberImage/noimage.png')}}" width="200px" height="400px"
                                    alt="User profile picture">
                                @endif

                            </div>

                            <div class="col-sm-4 invoice-col">

                                <address>
                                    <strong> {{$userDetails->name}} </strong><br>
                                    Email: {{$userDetails->email}}<br>
                                    Number: {{$userDetails->phone}}<br>
                                    Reference:
                                    {{ App\Models\User::where('id',$userDetails->reference)->pluck('name')->first()
                                    }}<br>
                                    Designation: {{$userDetails->designation}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                                <address>
                                    <strong>{{ $paymentDetails->type }}</strong><br>
                                    Trnxid: {{ $paymentDetails->trnxid }}<br>
                                    Phone: {{ $paymentDetails->from_number }}<br>
                                    payment_type:
                                    {{
                                    App\Models\AccountHead::where('id',$paymentDetails->payment_type)->pluck('title')->first()
                                    }}
                                    <br>
                                    Approved By:
                                    {{ App\Models\User::where('id',$paymentDetails->member_id)->pluck('name')->first()
                                    }}
                                </address>
                            </div>

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>trnxid</th>
                                            <th>From Number</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $paymentDetails->type }}</td>
                                            <td>
                                                @if($paymentDetails->accept_status == 0)
                                                <a href="approvePayment/{{ $paymentDetails->id }}"
                                                    onclick="return confirm('Are you sure you want to approve this ?')"
                                                    style="width: 60px; color:white"
                                                    class="btn btn-warning btn-xs">Pending</a>
                                                @elseif($paymentDetails->accept_status == 1)
                                                <a href="rejectPayment/{{ $paymentDetails->id }} "
                                                    onclick="return confirm('Are you sure you want to reject this ?')"
                                                    style="color: white; width: 60px;"
                                                    class="btn btn-success btn-xs">Approved</a>
                                                @endif
                                            </td>

                                            <td>{{ $paymentDetails->trnxid }}</td>
                                            <td>{{ $paymentDetails->from_number }}</td>
                                            <td>{{ $paymentDetails->amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <!--<div class="row no-print">-->
                        <!--    <div class="col-12">-->
                        <!--        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i-->
                        <!--                class="fas fa-print"></i> Print</a>-->

                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>




</div>

@endsection
