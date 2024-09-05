@if(!$allJobs->isEmpty())
@foreach($allJobs as $eachJob)
<div class="col-md-4 col-sm-6">
    <div class="grid-view brows-job-list">
        <div class="brows-job-company-img">
            @if(!empty($eachJob->image))
            <img class="img-responsive" src="{{asset('/images/' . $eachJob->image)}}" alt="User profile picture">
            @else
            <img class="img-responsive" src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
            @endif

        </div>
        <div class="brows-job-position">
            <h3><a href="jobView/{{ $eachJob->id }}">{{ $eachJob->job_category }}</a></h3>
            <p><span>{{ $eachJob->address }}</span></p>
        </div>
        <div class="job-position">
            <span class="job-num">{{ $eachJob->number_of_vacancies }} Position</span>
        </div>
        <div class="brows-job-type">
            <?php
                        $empStatus = explode(',', $eachJob->employee_status);
                        $countStatus = count($empStatus);
                        ?>
            @if(count($empStatus) < 2) <span class="full-time">
                {{ $eachJob->employee_status }}
                </span>
                @else
                <span class="part-time">
                    Multi
                </span>
                @endif

                <!--{{ $eachJob->employee_status }}-->
                <!--                        <span class="part-time">Part Time</span>
                         <span class="freelanc">Freelancer</span>
                         <span class="enternship">Enternship</span>-->
        </div>
        <ul class="grid-view-caption">
            <li style="width: 70%">
                <div class="brows-job-location">
                    <p><i class="fa fa-globe"></i>{{ $eachJob->url }}</p>
                </div>
            </li>
            <li>
                <p><i class="fa fa-calendar"></i> {{ date('d-m-Y',
                    strtotime($eachJob->application_deadline)) }}</p>
            </li>
        </ul>
        <span class="tg-themetag tg-featuretag">Premium</span>
    </div>
</div>
@endforeach
@else
<div class="col-md-12 col-sm-12">
    <div>
        <h3 class="text-center">No Record Found</h3>
    </div>
</div>
@endif
