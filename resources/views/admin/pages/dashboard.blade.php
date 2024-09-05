@extends('admin.masterTemplate')

{{-- @section('menu-name')
DASHBOARD
@endsection --}}
@section('main-content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">DASHBOARD</h5>
                </div>
            </div>
        </div>
        <hr class="style18">
    </div>
    @if(Auth::user()->type == 1)
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number"> 10 <small> % </small> </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    @elseif(Auth::user()->type == 2)
    <section class="content"> 
        <div class="container-fluid">
            <div class="ibox">
                <div class="i-head">
                    <h4 class="text-center text-bold"> WELCOME TO ABILITY FOR DISABILITY FUND </h4>
                </div>
                <div class="i-body">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-4">
                            <div class="card">
                                @if(Auth::user()->image == null)
                                    <img src="{{ asset('dummy.png') }}">
                                @else
                                <img src="{{asset('/images/'. Auth::user()->image)}}" class="card-img-top img-responsive rounded" style="height: 250px" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-bold">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 25rem; text-align: center !important; ">
                                <div class="card-header">TOTAL NUMBER OF DONATE</div>
                                <div class="text-center">
                                    {{-- @dd($payment); --}}
                                    <p>{{ $payment->count() }}</p>
                                </div>
                            </div>
                            <div class="card text-white bg-secondary mb-3" style="max-width: 25rem;">
                                <div class="card-header">TOTAL DONATED AMOUNT</div>
                                <div class="text-center">
                                    {{-- @dd($payment); --}}
                                    <p>{{ number_format($payment->sum('amount'), 2) }} TK</p>
                                </div>
                            </div>
                            <div class="card text-white bg-secondary mb-3" style="max-width: 25rem;">
                                <a class="btn btn-lg btn-primary"  href="{{ url('Member-payment') }}"> DONATE NOW </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection
