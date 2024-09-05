@extends('admin.masterTemplate')

@section('menu-name')
ALL USERS
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">View Volunteer</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" onclick="printDiv('printableArea')">
                                    <i class="fas fa-print"></i>
                                    <span>{{ __('Print') }}</span>
                                </button>
                                <h3 class="card-title font-weight-bold"> <i class="fa fa-users"></i> View Volunteer</h3>
                            </div>
                        </div>
                        <div class="card-body printableArea"  id="printableArea">
                        @php
                            $termCheck = App\Models\VolunteerTerm::where('term', 'long')->exists();
                        @endphp

                        @if($termCheck)
                            <div>
                                <h3>Long Term Volunteer</h3>
                                <table class="table">
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-1">Name : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->volunteer->name ?? '' }}</td>
                                        <td class="col-md-3 font-weight-bold  py-1 my-0">Phone : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->volunteer->phone ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Email : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->volunteer->email ?? '' }}</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">NID Number : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->volunteer->nid_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Country : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $address->country ?? '' }}</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">City : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $address->city ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Position/Department : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->position ?? '' }}</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Extra details : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->extra_details ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">How many years of post-qualification experience : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->experience_year ?? '' }}</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Employer Name : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->employer_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Employer Address : </td>
                                        <td class="col-md-3 py-1 my-0">{{ $volunteerTerm->employer_address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Job title and main responsibilities : </td>
                                        <td class="col-md-3 py-1 my-0">value</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Reason for leaving (if already left) : </td>
                                        <td class="col-md-3 py-1 my-0">value</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">Have you worked in your professional capacity in a developing country ? </td>
                                        <td class="col-md-3 py-1 my-0">value</td>
                                        <td class="col-md-3 font-weight-bold py-1 my-0">If yes please give details : </td>
                                        <td class="col-md-3 py-1 my-0">value</td>
                                    </tr>
                                </table>
                                <table class="table" colspan="5">
                                    <th>
                                        <p class="font-weight-bold text-uppercase">Education and training</p>
                                    </th>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Name and address of institute : </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->institute_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Certificates : </td>
                                        @foreach(explode(',', $volunteerTerm->certificates) as $certificate)
                                            <td class="col-md-2">
                                                <img src="{{ asset('_uploads/' . $certificate) ?? '' }}" alt="Certificate" style="height: 80px;">
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Attended from : </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->attended_from ?? '' }}</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Attended to : </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->attended_to ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Which country are you registered in? </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->registered_country ?? '' }}</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Date of full professional qualification : </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->qualification ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Name of professional body :</td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->professional_body ?? '' }}</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Number and type of registration : </td>
                                        <td class="col-md-3 py-1 my-1">{{ $volunteerTerm->type_of_registration ?? '' }}</td>
                                    </tr>
                                </table>
                                <table class="table">
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Any other relevant information regarding your qualifacation, experience or availability if necessary  : </td>
                                        <td class="col-md-6 py-1 my-1">{{ $volunteerTerm->relevant_training ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-6  py-1 my-1 font-weight-bold">Extra curriculam activities/interests/skills : </td>
                                        <td class="col-md-6 py-1 my-1">{{ $volunteerTerm->curriculam_activities ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-6  py-1 my-1 font-weight-bold">Please state why you are interested in volunteering at ARDRID? : </td>
                                        <td class="col-md-6 py-1 my-1">{{ $volunteerTerm->volunteering_at_ardrid ?? '' }}</td>
                                    </tr>
                                </table>
                                <table class="table mt-4">
                                    <th class="" colspan="6">
                                        <p class="font-weight-bold text-uppercase">Name two referees with position, address, and contact number (they will be contacted only in the final stage)</p>
                                        <h6 class="font-weight-bold text-uppercase"> First Referees </h6>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Name : </td>
                                        {{-- @dd($reference); --}}
                                        <td class="col-md-2 py-1 my-1">{{ $reference->first_ref_name ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Position : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->first_ref_position ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Organization : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->first_ref_organization ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Email : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->first_ref_email ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Telephone : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->first_ref_telephone ?? '' }}</td>
                                    </tr>
                                </table>
                                <table class="table mt-4">
                                    <th class="" colspan="6">
                                        <h6 class="font-weight-bold text-uppercase"> Second Referees </h6>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Name : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->second_ref_name ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Position : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->second_ref_position ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Organization : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->second_ref_organization ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Email : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->second_ref_email ?? '' }}</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Telephone : </td>
                                        <td class="col-md-2 py-1 my-1">{{ $reference->second_ref_telephone ?? '' }}</td>
                                    </tr>
                                </table>
                                <table class="mt-3">
                                    <th class="mt-5" colspan="6">
                                        <p class="font-weight-bold text-uppercase">If you want to elaborate on the above categories, or give any other information , plese do so below</p>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Elaborate : </td>
                                        <td class="col-md-10 py-1 my-1">{{ $volunteerTerm->elaborate ?? '' }}</td>
                                    </tr>
                                </table>
                            </div>
                            @endif

                            @php
                                $termCheck = App\Models\VolunteerTerm::where('term', 'short')->exists();
                            @endphp

                            @if($termCheck)
                            
                            <div>
                                <h3 class="">Short term volunteer</h3>
                                <table class="table">
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Name : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold ">Phone : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Email : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">NID Number : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">Country : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                        <td class="col-md-3 py-1 my-1 font-weight-bold">City : </td>
                                        <td class="col-md-3 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="mt-4" >
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Is there any particular area/activity in which you would like to volunteer ? </td>
                                        <td class="col-md-6 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="mt-4" >
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Details of Higher Education : </td>
                                        <td class="col-md-6 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="mt-4" >
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Details of any relevant training :</td>
                                        <td class="col-md-6 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="mt-4" >
                                    <tr>
                                        <td class="col-md-6 py-1 my-1 font-weight-bold">Extra curriculam activities/interests/skills : </td>
                                        <td class="col-md-6 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="table mt-4">
                                    <th class="" colspan="6">
                                        <p class="font-weight-bold text-uppercase">Name two referees with position, address, and contact number (they will be contacted only in the final stage)</p>
                                        <h6 class="font-weight-bold text-uppercase"> First Referees </h6>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Name : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Position : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Organization : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Email : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Telephone : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="table mt-4">
                                    <th class="" colspan="6">
                                        <h6 class="font-weight-bold text-uppercase"> Second Referees </h6>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Name : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Position : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Organization : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Email : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold ">Telephone : </td>
                                        <td class="col-md-2 py-1 my-1">value</td>
                                    </tr>
                                </table>
                                <table class="mt-3">
                                    <th class="mt-5" colspan="6">
                                        <p class="font-weight-bold text-uppercase">If you want to elaborate on the above categories, or give any other information , plese do so below</p>
                                    </th>
                                    <tr>
                                        <td class="col-md-2 py-1 my-1 font-weight-bold">Elaborate : </td>
                                        <td class="col-md-10 py-1 my-1">value</td>
                                    </tr>
                                </table>
                            </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<script>
        function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        }
</script>
@endsection
