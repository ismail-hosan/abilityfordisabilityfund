@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<div class="clearfix"></div>

<section class="inner-header-title"
    style="background-image:url(https://modimarketing.com/wp-content/uploads/2016/01/Contact-header-background-image-1.jpg);">
    <div class="container">
        <h1>Registered members list</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
<!-- Contact Page Section Start -->
<section class="contact-page">
    @php
    if(!empty(auth()->user())){
    $userType = auth()->user()->type;
    $userPayment = auth()->user()->payment;
    // / dd($userPayment);
    }else{
    $userType = '';
    $userPayment = '';
    }
    @endphp

    @if ($userType == 1 || ($userType == 2 && $userPayment != 0))
    <div class="col-md-12">
        <table id="example" class="table table-bordered">
            <tr style="background-color: #07b107">
                <th colspan="9" style="color:white;">Registered members</th>
            </tr>
            <tr>
                <th>SL</th>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>BLOOD</th>
                <th>CATEGORY</th>
                <th>REFERENCE</th>
                <th>TOTAL PAY</th>
            </tr>
            @php
            $i =1;
            @endphp
            @foreach ($userDetails as $item)

            <tr>
                <td>{{ $i++ }}</td>

                @if ($item->m_id == 1)
                <td>{{ $item->usershow->id_number }}</td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_name == 1)
                <td>{{ $item->usershow->name }}</td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_phone == 1)
                <td>{{ $item->usershow->phone }}</td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_email == 1)
                <td>{{ $item->usershow->email }}</td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_blood == 1)
                <td>
                    @php
                    if($item->usershow->blood ==1){
                    echo 'A+';
                    }elseif($item->usershow->blood ==2){
                    echo 'A-' ;
                    }
                    elseif($item->usershow->blood ==3){
                    echo 'B+';
                    }elseif($item->usershow->blood ==4){
                    echo 'B-';
                    }elseif($item->usershow->blood ==5){
                    echo 'O+';
                    }elseif($item->usershow->blood ==6){
                    echo 'O-';
                    }elseif($item->usershow->blood ==7){
                    echo 'AB+';
                    }elseif($item->usershow->blood ==8){
                    echo 'AB-';
                    }elseif(empty($item->usershow->blood)){
                    echo '<b style="color: red">Unknown</b>';
                    }
                    @endphp

                </td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_designation == 1)
                <td>{{ $item->usershow->memberCategory->title ?? "General" }}</td>
                @else
                <td>Hide </td>
                @endif


                @if ($item->m_reference == 1)
                <td>
                    {{ $item->usershow->referenceby->name ?? ""}}
                </td>
                @else
                <td>Hide </td>
                @endif

                @if ($item->m_pay == 1)
                <td>{{$item->usershow->paymentsum($item->member_id)}}</td>
                @else
                <td>Hide </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="col-md-12">
        <h1 style="text-align: center; color:red">SORRY ! This list can view only paid members</h1>
    </div>
    @endif

</section>
<!-- contact section End -->
<section class="contact-page">
    <div class="container">
    </div>
</section>
<!-- Contact form End -->


@endsection
