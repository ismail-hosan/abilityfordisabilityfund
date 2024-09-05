@extends('admin.masterTemplate')
@section('menu-name')
Resume
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Resumy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Resumy</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(auth()->user()->type == 4 || auth()->user()->type == 1)

                    @else
                    <div id="printPageButton" class="callout callout-info">
                        <a href="{{ route('profile')}}"> <i class="fas fa-edit"></i> Edit Resume </a>
                    </div>
                    @endif
                    <div id="exportContent" class="invoice p-3 mb-3 maincontener">
                        <div class="row invoice-info">
                            <div class="col-sm-8 invoice-col">
                                <address>
                                    <h2>{{$user->name}}</h2>
                                    Location:
                                    {{$user->area}} {{!empty($user->area) ? ',':'' }} {{ $zone }}
                                    {{!empty($zone) ? ',':'' }} {{$thana}} {{!empty($thana) ? ',':'' }} {{$districts}}
                                    {{!empty($districts) ? ',':'' }} {{$divisions}}<br>
                                    Phone: {{$user->phone}}<br>
                                    Email: {{$user->email}}<br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                @if(!empty($user->image))
                                <img class="img-fluid rounded float-right" style="width: 120px; height:120px"
                                    src="{{asset('/images/'.$user->image)}}" alt="User profile picture">
                                @else
                                <img class="img-fluid rounded float-right" width="30%"
                                    src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Career Objective: </h6>
                            </div>
                            <div class="col-12 ">
                                <div style="margin-top:10px" class="col-md-8 ">
                                    <p>{{$objective->summarie ?? ""}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Career Summary: </h6>
                            </div>
                            <div class="col-12 ">
                                <div style="margin-top:10px" class="col-md-8 ">
                                    <p>{{$Summary->summarie ?? ""}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Special Qualification: </h6>
                            </div>
                            <div class="col-12 ">
                                <div style="margin-top:10px" class="col-md-8 ">
                                    <p>{{$qualification->summarie ?? ""}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Employment History: </h6>
                            </div>
                            @foreach($employment as $no=>$job)
                            <div class="col-12 table-responsive">
                                {{$no+1 }}.
                                {{$job->c_department.' ('.$job->start_period .') - ('.$job->end_period .')'}}
                                <div class="col-md-2 table-responsive"> </div>
                                <div style="margin-top:10px" class="col-md-8 table-responsive">
                                    <b>{{$job->c_name}}</b><br>
                                    Company Location : {{$job->c_location}}<br>
                                    Department: {{$job->c_department}}
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        @if(!empty($academic))
                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Academic Qualification:
                                </h6>
                            </div>
                            <div class="col-12 ">
                                <table border="1" style="width:100%;">
                                    <tr class="text-center">
                                        <th style="padding: 6px; font-size:14px">Exam Title</th>
                                        <th style="padding: 6px; font-size:14px">Concentration / Major</th>
                                        <th style="padding: 6px; font-size:14px">Institute</th>
                                        <th style="padding: 6px; font-size:14px">Result</th>
                                        <th style="padding: 6px; font-size:14px">Pas.Year</th>
                                        <th style="padding: 6px; font-size:14px">Duration</th>
                                        <th style="padding: 6px; font-size:14px">Achievement</th>
                                    </tr>
                                    @foreach($academic as $no=>$academics)
                                    <tr class="text-center">
                                        <td style="padding: 10px;">{{$academics->degree_title}}</th>
                                        <td style="padding: 10px;">{{$academics->concentration}}</th>
                                        <td style="padding: 10px;">{{$academics->institute_name}}</th>
                                        <td style="padding: 10px;">{{$academics->result}}</th>
                                        <td style="padding: 10px;">{{$academics->year_of_passing}}</th>
                                        <td style="padding: 10px;">{{$academics->duration}}</th>
                                        <td style="padding: 10px;">{{$academics->achievement}}</th>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        <br>
                        @if(!empty($training))
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <h6 style="background:#606060;padding:4px;color:#fff">Training Summary:
                                </h6>
                            </div>
                            <div class="col-12 table-responsive">
                                <table border="1" style="width:100%;">
                                    <tr class="text-center">
                                        <th style="padding: 6px; font-size:14px">Training Title</th>
                                        <th style="padding: 6px; font-size:14px">Topic / Major</th>
                                        <th style="padding: 6px; font-size:14px">Institute</th>
                                        <th style="padding: 6px; font-size:14px">Country</th>
                                        <th style="padding: 6px; font-size:14px">Location</th>
                                        <th style="padding: 6px; font-size:14px">Year</th>
                                        <th style="padding: 6px; font-size:14px">Duration</th>
                                    </tr>
                                    @foreach($training as $no=>$trainings)
                                    <tr>
                                        <td style="padding: 10px;">{{$trainings->title}}</th>
                                        <td style="padding: 10px;">{{$trainings->topics}}</th>
                                        <td style="padding: 10px;">{{$trainings->institute}}</th>
                                        <td style="padding: 10px;">{{$trainings->country}}</th>
                                        <td style="padding: 10px;">{{$trainings->location}}</th>
                                        <td style="padding: 10px;">{{$trainings->year}}</th>
                                        <td style="padding: 10px;">{{$trainings->duration}}</th>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        <br>
                        @if(!empty($specialization))
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <h6 style="background:#606060;padding:4px;color:#fff">Specialization:
                                </h6>
                            </div>
                            <div class="col-12 table-responsive">
                                <table border="1" style="width:100%;">
                                    <tr class="text-center">
                                        <th style="padding: 0 6px; font-size:14px">Fields of Specialization</th>
                                        <th style="padding: 0 6px; font-size:14px">Learn From</th>
                                    </tr>
                                    @foreach($specialization as $no=>$specializations)
                                    <tr>
                                        <td style="padding: 10px;">
                                            <li>{{$specializations->skill}}</li>
                                            </th>
                                        <td style="padding: 10px;">{{$specializations->learnfrom}}</th>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-12 ">
                                <h6 style="background:#606060;padding:4px;color:#fff">Extra Curricular Activities: </h6>
                            </div>
                            <div class="col-12 ">
                                <div style="margin-top:10px" class="col-md-8 ">
                                    <p>{{$curricular->summarie ?? "N/A"}}</p>
                                </div>
                            </div>
                        </div>
                        @if(!empty($languages))
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <h6 style="background:#606060;padding:4px;color:#fff">Language Proficiency:
                                </h6>
                            </div>
                            <div class="col-12 table-responsive">
                                <table border="1" style="width:100%;">
                                    <tr class="text-center">
                                        <th style="padding: 0 6px; font-size:14px">Language</th>
                                        <th style="padding: 0 6px; font-size:14px">Reading</th>
                                        <th style="padding: 0 6px; font-size:14px">Writing</th>
                                        <th style="padding: 0 6px; font-size:14px">Speaking</th>
                                    </tr>
                                    @foreach($languages as $no=>$language)
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">{{$language->name}}</th>
                                        <td style="padding: 10px;">{{$language->reading}}</th>
                                        <td style="padding: 10px;">{{$language->writing}}</th>
                                        <td style="padding: 10px;">{{$language->speaking}}</th>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <h6 style="background:#606060;padding:4px;color:#fff">Personal Details::
                                </h6>
                            </div>
                            <div class="col-12 table-responsive">
                                <table style="width:40%;">
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Father Name</th>
                                        <td style="padding: 10px;">: {{$basicInformation->father_name ?? "N/A"}}</th>
                                    </tr>
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Mother Name</th>
                                        <td style="padding: 10px;">: {{$basicInformation->mother_name ?? "N/A"}}</th>
                                    </tr>
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Date of Birth</th>
                                        <td style="padding: 10px;">: {{Auth::user()->dob ?? "N/A"}}</th>
                                    </tr>
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Gender</th>
                                        <td style="padding: 10px;">:
                                            @if(Auth::user()->gender == 'M')
                                            {{'Male'}}
                                            @elseif(Auth::user()->gender == 'F')
                                            {{'Female'}}
                                            @elseif(Auth::user()->gender == 'O')
                                            {{'Others'}}
                                            @else
                                            {{'Not Selected'}}
                                            @endif
                                            </th>
                                    </tr>

                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Marital Status</th>
                                        <td style="padding: 10px;">:
                                            @if(!empty($basicInformation->marital_status))
                                            @if($basicInformation->marital_status == 1)
                                            {{'Married'}}
                                            @elseif($basicInformation->marital_status == 2)
                                            {{'Unmarried'}}
                                            @elseif($basicInformation->marital_status == 3)
                                            {{'Single'}}
                                            @else
                                            {{'Not Selected'}}
                                            @endif
                                            @else
                                            N/A
                                            @endif
                                            </th>
                                    </tr>
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">Nationality</th>
                                        <td style="padding: 10px;">: {{$basicInformation->nationality ?? "N/A"}}</th>
                                    </tr>
                                    <tr cleass="text-center">
                                        <td style="padding: 10px;">National Id No.</th>
                                        <td style="padding: 10px;">: {{$basicInformation->national_id_no ?? "N/A"}}</th>
                                    </tr>
                                    <tr id="editor" cleass="text-center">
                                        <td style="padding: 10px;">Religion</th>
                                        <td style="padding: 10px;">:
                                            @if(!empty($basicInformation->religion))
                                            @if($basicInformation->religion == 'Islam')
                                            {{'Islam'}}
                                            @elseif($basicInformation->marital_status == 'Buddhism')
                                            {{'Buddhism'}}
                                            @elseif($basicInformation->marital_status == 'Christianity')
                                            {{'Christianity'}}
                                            @elseif($basicInformation->marital_status == 'Sikhism')
                                            {{'Sikhism'}}
                                            @elseif($basicInformation->marital_status == 'Jainism')
                                            {{'Jainism'}}
                                            @elseif($basicInformation->marital_status == 'Hinduism')
                                            {{'Hinduism'}}
                                            @elseif($basicInformation->marital_status == 'Judaism')
                                            {{'Judaism'}}
                                            @elseif($basicInformation->marital_status == 'Others')
                                            {{'Others'}}
                                            @else
                                            {{'Not Selected'}}
                                            @endif
                                            @else
                                            N/A
                                            @endif
                                            </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <small style="font-size: 12px;color:green;" class="float-right text-bold">Power
                                        By
                                        bieabangladesh.org |</small>
                                </h4>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i>
                                </button>
                                <button type="button" class="btn btn-primary float-right"
                                    onclick="Export2Doc('exportContent', 'Resume');" style="margin-right: 5px;">
                                    <i class="fas fa-file-word"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    function Export2Doc(element, filename = '') {
        var preHtml =
            "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + document.getElementById(element).innerHTML + postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html)

        filename = filename ? filename + '.doc' : 'document.doc';

        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = url;

            downloadLink.download = filename;

            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }
</script>

@endsection
