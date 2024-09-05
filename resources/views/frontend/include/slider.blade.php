
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($slidersImages as $key => $eachImage)
            <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($slidersImages as $key => $eachImage)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ URL::asset('/slider/'.$eachImage->image) }}">
                <div class="carousel-caption">
                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="fa-solid fa-angles-left glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="fa-solid fa-angles-right glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>

<script>
  $(document).ready(function(){
      // Activate Carousel
      $("#myCarousel").carousel();

      // Enable Carousel Controls
      $(".left").click(function(){
          $("#myCarousel").carousel("prev");
      });
      $(".right").click(function(){
          $("#myCarousel").carousel("next");
      });
  });
</script>
