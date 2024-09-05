<div class="card-body">
    <table id="example1" class="table table-bordered table-striped  ">
        <thead>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Deadline</th>
                <th>Vacancies</th>
                <th class="whatever">Details</th>
                <th>Post By</th>
                <th>Status</th>
                <th>Approved By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


            @foreach($listjob as $no=>$job)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$job->job_category}}</td>
                <td>{{$job->application_deadline}}</td>
                <td>{{$job->number_of_vacancies}}</td>
                <td class="whatever">{!! $job->job_description !!}</td>
                <td>{{ Auth::user()->where('id',$job->user_id)->pluck('name')->first() }}</td>
                <td>
                    @if($job->status == 1)
                    <i class="fa fa-eye" style="color: green"></i>
                    @else
                    <i class="fa fa-eye-slash" style="color: orange"></i>
                    @endif
                </td>
                <td>{{ $job->approved_by }}</td>
                <td>
                    @if($job->status == 1)
                    <a onclick="jobpoststatus('<?php echo $job->id; ?>', '0')" class="btn btn-sm btn-danger">Unapprove</a>
                    @else
                    <a onclick="jobpoststatus('<?php echo $job->id; ?>', '1')" class="btn btn-sm btn-info">Approve</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>