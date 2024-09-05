@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')

<style type="text/css">
    .principle {
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .principle h2 {
        color: #016401;
    }
    .principle img {
        width: 200px;
    }
    .principle h3 {
        background: #016401;
        color: #ffff;
        display: block;
        padding: 5px 0px;
    }
    .principle h6 {
        font-size: 18px
    }
    @media only screen and (max-width: 400px) {
        .videoedit {
            margin: -55px
        }

        .imagegallery {
            width: 375px;
            margin: -38px;
            margin-bottom: 50px;
        }
    }
    .gallery-image {
    width: 100%; /* Set the desired width */
    height: auto; /* Maintain aspect ratio */
    max-height: 250px; /* Set the maximum height if needed */
    }
    /* ------------------------------------------------------ */


.title {
  width: 100%;
  max-width: 854px;
  margin: 0 auto;
}

.caption {
  width: 100%;
  max-width: 854px;
  margin: 0 auto;
  padding: 20px 0;
}

.vid-main-wrapper {
  width: 100%;
  /* max-width: 1100px; */
  min-width: 440px;
  background: #fff;
  margin: 0 auto;
}

/*  VIDEO PLAYER CONTAINER
 		############################### */
.vid-container {
  position: relative;
  /* padding-bottom: 52%; */
  padding-top: 30px;
  height: 0;
  width: 70%;
  float: left;
}

.vid-container iframe,
.vid-container object,
.vid-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  min-height: 360px;
}

/*  VIDEOS PLAYLIST 
 		############################### */
.vid-list-container {
  width: 29%;
  height: 360px;
  overflow: hidden;
  float: right;
}

.vid-list-container:hover,
.vid-list-container:focus {
  overflow-y: auto;
}

ol#vid-list {
  margin: 0;
  padding: 0;
  background: #222;
}

ol#vid-list li {
  list-style: none;
}

ol#vid-list li a {
  text-decoration: none;
  background-color: #222;
  height: 55px;
  display: block;
  padding: 10px;
}

ol#vid-list li a:hover {
  background-color: #666666;
}

.vid-thumb {
  float: left;
  margin-right: 8px;
}

.active-vid {
  background: #3a3a3a;
}

#vid-list .desc {
  color: #cacaca;
  font-size: 13px;
  margin-top: 5px;
}

@media (max-width: 624px) {
  body {
    margin: 15px;
  }
  .caption {
    margin-top: 40px;
  }
  .vid-list-container {
    padding-bottom: 20px;
  }
}
.g-photo:hover {
        transform: scale(1.1);
        transition: transform 0.9s ease;
    }
</style>
<div class="clearfix "></div>
<br>
<br>

@include('frontend.include.slider')
<link rel="stylesheet" href="css/darkscroll.css">
<br>
<div class="container">
    <div class="row " style="margin-right: 5px;">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="simple-tab">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="work-process">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    Chairman Message
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="work-process">
                            <div class="panel-body pbody" style="border : 1px solid green ; min-height:300px;">
                                <em>"Embracing diversity is our guiding principle, and in our pursuit of excellence, let us not forget the extraordinary strength and resilience embodied by children with disabilities. Together, let's create an inclusive environment where every child, regardless of ability, thrives and reaches their full potential. Our commitment is unwavering—empowering every child, every step of the way."</em><br>
                                <b>Chairman (AFDF)
                                    <br>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="accordian-style-three">
                <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title noticeButton">
                                <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#service-One"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Notice
                                </a>
                            </h4>
                        </div>
                        @foreach($notice as $notice)
                        <div id="service-One" class="panel-collapse collapse noticeContant" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body noticetext" style="">
                                <h4 class="text-center">{{$notice->title}}</h4>
                                <p> {!! $notice->descriptino !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="simple-tab">
                <div class="panel-group" id="accordionR" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="work-process">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordionR" href="#collapseROne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Executive Member
                                </a>
                            </h4>
                        </div>
                        <div id="collapseROne" class="panel-collapse collapse " role="tabpanel"
                            aria-labelledby="work-process">
                            <div class="panel-body" style="border:1px solid green; min-height:316px;">
                                <em>“We sincerely expect your active support and cooperation in our every step and
                                    initiatives for ameliorating the status of BIEA and expanding indenting business in
                                    the country.”</em><br><br>
                                <!--<b>Md. Aktaruzzaman Hero<br>-->
                                Central Executive Member </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<section id="testimonial">
    <div class="container spidochetube" id="youtube">
        <div class="container-fluid pb-video-container">
            <div class="col-md-12 col-sm-12 videoedit">
                <h3 class="text-center">Disabilities Video</h3><br>
                <div id="gallery" style="margin: 0px auto;">
                <div class="container-fluid pb-video-container html5gallery" data-skin="darkness" data-width="480" data-height="272">
                    <div class="vid-main-wrapper clearfix">
                        <!-- THE YOUTUBE PLAYER -->
                        <div class="vid-container">
                          <iframe id="vid_frame" src="{{ $video[0]->video ?? "" }}" frameborder="0" width="560" height="315"></iframe>
                        </div>
                      
                        <!-- THE PLAYLIST -->
                        <div class="vid-list-container ml-3">
                          <ol id="vid-list">
                            @foreach($video as  $item)
                            <li>
                              <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='{{ $item->video }}'">
                                <span class="vid-thumb"><img width=72 src="{{ asset('images/'.$item->image) }}" /></span>
                                <div class="desc">{{ $item->title }}</div>
                              </a>
                            </li>
                            @endforeach
                          </ol>
                        </div>
                      </div>
                </div>
                <h3 class="text-center mt-3">Disabilities Gallery</h3><br>
                <div class="i-box">
                    <div class="i-head">
                        <div class="i-body">
                            <div class="row">
                                @foreach($image as $image)
                                <div class="col-md-3" style="padding: 5px">
                                    <div class="card">
                                        <div class="card-body g-photo" style="padding: 0">
                                            <img src="{{ asset('/uploads/gallery/'.$image->images) }}" style="width: 100%;  height: 300px;" class="img-thumbnail"alt="">                                    
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <a href="{{'All-Gallery'}}" style="margin-top: 20px;" class="btn btn-success col-md-2 col-md-offset-5 col-sm-12 col-xm-12">See More Gallery</a>
        </div>
    </div>
</section>
<div class="principle">
    <div class="container">
        <div class="manage-resume-box detail-title " style="background : #EAFAF1 ">
            <div class="row ">
                <div class="col-md-12 col-sm-10  col-sm-offset-1 banner-text">
                    <h2>Ability For Disability Fund (AFDF)</h2>
                    <h4>BANGLADESH INDUSTRIAL ABILITY FOR DISABLITIES ASSOCIATION (AFDF)</h4>
                    <h4>E-mail: disabilities@gmail.com</h4>
                    <img style="margin: 0 auto" class="img-responsive"
                        src="{{ URL::to('/') }}/admin_assets/logo/logo2.png">
                    <!--<img src="{{ asset('frontend_assets/assets/img/av-logo.png')}}">-->
                    <h3>Govt. Regi No ..!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-md-offset-1 col-sm-offset-1">
                    <h3 style="width : 30%" class="text-center"> About Disability</h3>
                    <h6> there might be a typo in your question, but I'll try to provide information on disabilities in children. If you meant "kids' disability," it's essential to understand that   disabilities in children can vary widely and may include physical, cognitive, sensory, or     developmental impairments. These disabilities can be present from birth or acquired due to illness  or injury.<br><br>
                        Here are some common types of disabilities in children: <br><br>
                        Support for children with disabilities often involves a multidisciplinary approach, including medical professionals, educators, therapists, and support from family and community. Early intervention services are crucial to addressing developmental delays and providing support as early as possible.
                        Educational accommodations and modifications may be necessary to help children with disabilities succeed in school. In many countries, there are laws and regulations, such as the Individuals with Disabilities Education Act (IDEA) in the United States, that outline the rights and services available to children with disabilities.
                    </h6>
                    <h3 style="width : 30%" class="text-center">Aims & objective</h3>
                    <h6>
                        The objective of addressing disabilities in children is to foster an inclusive and supportive environment that enables every child to reach their full potential. This involves identifying and understanding various disabilities, including developmental, physical, sensory, and communication disorders. The goal is to provide early intervention and tailored support to facilitate the child's overall well-being and development. Educational accommodations play a crucial role in ensuring that children with disabilities have equal access to learning opportunities. By promoting awareness, empathy, and inclusivity, society can break down barriers and create an environment where children with disabilities are embraced for their unique strengths. The objective extends beyond mere assistance to empowerment, aiming to equip children with the skills and resources necessary to lead fulfilling lives and actively participate in their communities. Through collaborative efforts among caregivers, educators, healthcare professionals, and policymakers, the objective is to build a more inclusive society that values the diverse abilities of every child.
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<hr>



<script>
$(document).ready(function () {
  $(".vid-item").each(function (index) {
    $(this).on("click", function () {
      var current_index = index + 1;
      $(".vid-item .thumb").removeClass("active");
      $(".vid-item:nth-child(" + current_index + ") .thumb").addClass("active");
    });
  });
});
</script> 

@endsection
