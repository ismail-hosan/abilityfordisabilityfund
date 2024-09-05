@foreach($trainings as $value)
<div class="col-md-4 col-sm-6">
    <div class="grid-view brows-job-list" style=" min-height: 300px">
        <div class=" brows-job-company-img">
            @if(!empty($eachJob->image))
            <img class="img-responsive" src="{{asset($value->image)}}" alt="User profile picture">
            @else
            <img class="img-responsive" src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
            @endif
        </div>
        <div class="brows-job-position">
            <h4><a href="{{route('training.details',$value->id)}}"> {{Str::limit($value->title,
                    64,$end='.......')}}</a>
            </h4>
        </div>
        <div class="job-position">
            <span class="job-num">{{$value->techer_name}}</span>
        </div>
        <br>

        <div class="brows-job-type">
            @if($value->type == "Free")
            <span class="full-time bg-warning">{{$value->type}}</span>
            @elseif($value->type == "Paid")
            <span class="full-time bg-success">{{$value->type}}</span>
            @endif
        </div>
        <ul class="grid-view-caption">
            <li>
                <div class="brows-job-location">
                    <p><i class="fa fa-calendar"></i>{{
                        \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}
                    </p>
                </div>
            </li>
            <li>
                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{$value->type == "Free" ?
                        "0.00":$value->amount}} TK</span></p>
            </li>
        </ul>
    </div>
</div>
@endforeach
