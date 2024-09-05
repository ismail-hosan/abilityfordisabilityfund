@extends('admin.masterTemplate')
@section('menu-name')
Reference
@endsection
@section('main-content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> Reference</h5>
                </div>

            </div>
        </div>
        <hr class="style18">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Rules</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">SL</th>
                                        <th>Member Name</th>
                                        <th>Member Email</th>
                                         <th>Payment</th>
                                        <th>Reference</th>
                                        <th>Save</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                             <?php  $status="" ?>



                                    @foreach($member as $key=>$member)

                                    @foreach($applypay as $apply)

                                    @if($member->id == $apply->member_id)

                                  <?php $status="Has Applied"; ?> 

                                    @elseif($member->id == empty($apply->member_id) )

                                 <?php $status="Not Applied"; ?> 

                                    @endif


                                    @endforeach
                                    
                                   
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$status}}</td>
                                        <td>
                                        <form action="{{'/referadd_admin/'.$member->id}}" method="POST">
                                        @csrf
                                        <!--dd($member->id)-->
                                            <select class="form-control" name="reference">
                                                <option value="" selected="" disabled="">Select </option>
                                                @foreach($reference as $referenceadd)
                                                <option  value="{{$referenceadd->id}}">
                                              {{$referenceadd->name}}
                                                </option>
                                                @endforeach

                                            </select>
                                        </td>
                                        <td>
                                           <button type="submit" class="btn btn-info"> Save</button>
                                        </td>
                                        </form>
                                    </tr>
                                    
                                    @endforeach
                                   
                                   

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection