@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://mars-metcdn-com.global.ssl.fastly.net/content/uploads/sites/101/2019/04/30162428/Top-Header-Background.png);">
    <div class="container">
        <h1>BIEA Jobs</h1>
        <p>বিশ্বের প্রথম শুধুমাত্র ইঞ্জিনিয়ারদের জন্য আধুনিক জব সাইট BIEA Jobs । আপনিও সদস্য হয়ে উপভোগ করতে পারেন
            চাকুরী দেওয়া নেওয়ার ক্ষেত্রে সকল সুযোগ-সুবিধা। <br>
            শুভেচ্ছান্তে,
            BIEA Jobs Authority.</p>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div class="row">

            @forelse($chunked as $item)
            <div class="col-md-4">
                @forelse($item as $key => $category)
                <ul class="list-unstyled">
                    <li style="border:1px solid #ddd; padding: 8px 1rem;"><a href="{{Route('all.job',$category->id)}}"
                            style="width:100%; font-weight: 700;">
                            {{$category->name}}
                        </a></li>
                </ul>
                @empty
                <div class="alart alart-danger">
                    Sorry! no data found.
                </div>
                @endforelse
            </div>
            @empty
            No data found
            @endforelse
        </div>
        <!--/.Browse Job In Grid-->


    </div>
</section>All-job
@section('script')
<script>
    $(document).ready(function () {
        $('#jobSearchForm').on('submit', function (e) {
            e.preventDefault();
            var title = $('.searchTitle').val();
            var category = $('.searchCategory').val();

            $.ajax({
                url: "{{route('job.search')}}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    title: title,
                    category: category,
                },

                success: function (data) {

                    // $('#jobfilter').html(data).fadeIn('slow');
                    $('#jobfilter').hide().html(data).fadeIn(1000);
                },
            })
        })
    })
</script>
@endsection
@endsection
