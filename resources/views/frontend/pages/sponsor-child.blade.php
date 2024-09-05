@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')

<style>
    h1,
    h2{
        text-align: center;

    }

    p {
        
        margin: 0;
    }

    .hero {
        background-image: url("{{ asset('frontend_assets/assets/img/Sponsor-a-Child_cover.jpg') }}");
        background-size: cover;
        background-position: center;
        color: white;
        height: 763px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .overlay {
        background-color: rgba(0 0 0 / 81%);
        padding: 115px;
        width: 100%;
        position: absolute;
        top: 528px;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Donation Amount Section */
    .donation-amount {
        background-color: #f2f2f2;
        padding: 20px 0;
    }

    .donation-amount h2 {
        font-size: 48px;
        margin-bottom: 5px;
    }

    .donation-amount p {
        font-size: 16px;
        color: #555;
    }

    /* Icons Section */
    .icons {
        display: flex;
        justify-content: space-around;
        padding: 20px 0;
        background-color: #fff;
    }

    .icon-item {
        text-align: center;
    }

    .icon-item img {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }

    .icon-item p {
        margin: 0;
        font-size: 14px;
    }

    .sponsorship-form {
        max-width: 757px;
        margin: 100px auto 71px auto;
        background-color: #FFD100;
        padding: 20px;
        text-align: center;
    }

    .sponsorship-form form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }

    .sponsorship-form label {
        /* margin-bottom: 5px; */
        font-weight: bold;
    }

    .sponsorship-form input{
        /* padding: 10px; */
        /* margin-bottom: 15px; */
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .submit-button {
        background-color: #000;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-button:hover {
        background-color: #333;
    }
</style>
<!-- Hero Section -->

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<section class="hero">
    <div class="overlay">
        <h1 style="font-weight: 49px;font-weight: 600;color: #ef018d;">HELP A CHILD REWRITE THEIR FUTURE</h1>
        <p style=" color: white;text-align: center;">Within every child lies boundless potential, and education is
            the key to unlocking opportunities that allow this potential
            to flourish. By sponsoring a child, you are providing
            marginalised children with essential tools that will empower
            them to change their reality and create a better and
            brighter future, not only for themselves and their families
            but also for their communities as a whole.</p>
    </div>
</section>

<!-- Donation Amount Section -->
<section class="donation-amount">
    <h2>Monthly-Yearly-OneTime</h2>
</section>

<!-- Icons Section -->
<section class="icons">
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/coach.png')}}" alt="Teacher">
        <p>Coach</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/american-football-player.png')}}" alt="Sports-Geares">
        <p>Sports Geares</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/customer-service.png')}}" alt="Disability-Support">
        <p>Disability Support</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/patient.png')}}" alt="patient">
        <p>Health Support</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/social-care.png')}}"
            alt="Education Materials">
        <p>Assistive Device</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/sports.png')}}" alt="Quality Education">
        <p>Sports Equepments</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/graduation-cap.png')}}" alt="Co-curricular Activities">
        <p>Education</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/healthy-food.png')}}" alt="Nutritious Food">
        <p>Nutritious Food</p>
    </div>
</section>

<!-- Sponsorship Form Section -->
<section class="sponsorship-form">
    <h3>Child Sponsorship Information Form</h3>
    <form action="{{Route('donate.store')}}" method="post" >
        @csrf
        <label for="first-name">First Name*</label>
        <input type="text" id="first_name" name="first_name" required>
        <label for="last-name">Last Name*</label>
        <input type="text" id="last_name" name="last_name" required>
        <label for="first-name">Email*</label>
        <input type="email" id="email" name="email" required>
        <label for="first-name">Contact Number*</label>
        <input type="number" id="number" name="number" required>
        <label for="first-name">Number of Child/Children You Want to Sponsor*</label>
        <select name="sponsor_number" id="sponsor_number" style="margin-bottom: 10px;border-radius: 5px;" required>
            <option value="">--None--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label for="first-name">Preferred Interval for Contribution*</label>
        <select name="contribution_type" id="contribution_type" style="margin-bottom: 10px;border-radius: 5px;" required>
            <option value="">--None--</option>
            <option value="Monthly">Monthly</option>
            <option value="Yearly">Yearly</option>
            <option value="OneTime">OneTime</option>
        </select>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</section>

<a href="{{Route('payment')}}" target="_blank" rel="noopener noreferrer">Pay</a>
@endsection