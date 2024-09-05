@extends('admin.masterTemplate')
@section('menu-name')
Report
@endsection
@section('main-content')
<style>
    .tablestyle3 {
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 15px;
    }
</style>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> Payments Report</h5>
                </div>

            </div>
        </div>
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('details_payment_reprot')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card card-outline card-info no-print">
                                    <div class="card-body">
                                        <div class="row  no-print">
                                            <div class="box-header with-border" style="cursor: pointer;">
                                                <h6 class="box-title">
                                                    <i class="fa fa-filter" aria-hidden="true"></i> Filters
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row no-print">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date Range:</label>
                                                    <input type="text" class="form-control " name="dateRange" value=""
                                                        id="reservation" />
                                                    @error('dateRange')
                                                    <span class="error text-red text-bold"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Members</label>
                                                    <select name="member_id" class="form-control select2" id="">
                                                        <option for="" value="all">All Members</option>
                                                        @foreach ($allmembers as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->id_number.'-'.$item->userName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <button type="submit" class="btn btn-sm btn-success"><i
                                                            class="fa fa-search"></i>
                                                        Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="load_data"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($memberDetails))
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered tablestyle3">
                        <tr>
                            <td colspan="3">
                                <h3 class="card-title">Payment Details</h3>
                            </td>
                            <td colspan="3">
                                <h3 class="card-title">
                                    <h4><b>From Date: {{ $from_date }}</b>, <b>To date: {{ $to_date }} </b></h4>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <th>SL</th>
                            <th style="white-space: nowrap;">Date</th>
                            <th style="white-space: nowrap;">Name & ID</th>
                            <!-- <th>Phone</th> -->
                            <th style="white-space: nowrap;">From Number</th>
                            <th style="white-space: nowrap;">To Number</th>
                            <th style="text-align: right">Amount</th>
                        </tr>
                        @php
                        $i=1;
                        $totalAmount = 0;
                        @endphp
                        @foreach ($memberDetails as $item)
                        @php
                        $totalAmount +=$item->amount;
                        @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td style="white-space: nowrap;">{{ $item->date }}</td>
                            <td style="white-space: nowrap;">{{ $item->id_number.' - '.$item->name }}</td>
                            <!-- <td>{{ $item->phone }}</td> -->
                            <td style="white-space: nowrap;">{{ $item->from_number ?? 'N/A' }}</td>
                            <td style="white-space: nowrap;">{{ $item->to_number ?? 'N/A' }}</td>
                            <td style="text-align: right">{{ $item->amount }}</td>
                        </tr>
                        @endforeach
                        <footer>
                            <th colspan="6" style="text-align: center">TOTAL</th>
                            <th style="text-align: right">{{$totalAmount}}</th>
                        </footer>
                    </table>

                </div>
            </div>
            @endif

        </div>
    </section>
</div>

@endsection
