@extends('admin.masterTemplate')
@section('menu-name')
ALL MEMBERS
@endsection
@section('main-content')
<style>
    .tablestyle3 {
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 15px;
    }
</style>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> All Members List</h5>
                </div>

            </div>
        </div>
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header bg-cyan" id="printPageButton">
                            <h3 class="card-title"> <i class="fas fa-users"></i> All Members List</h3>
                         
                                <button  onclick="window.print();return false;" class="btn btn-difault btn-sm float-right" > <i class="fa fa-print"></i></button>
                       
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered tablestyle3">
                                <tr>
                                    <td colspan="6"><h3 class="card-title"> All Members List</h3></td>
                                </tr>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>

                                    <th>Status</th>
                                    <th>Remarks</th>
                                </tr>
                                <?php $i = 1; ?>
                                @foreach($allmembers as $each)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $each->userName }}</td>
                                    <td>{{ $each->uemail }}</td>
                                    <td>{{ $each->uphone }}</td>
                                    <td>
                                        <?php if ($each->upay == 1) { ?>
                                            <b style=" color: Green" class="">Paid</b>
                                        <?php   } elseif ($each->upay == 0) { ?>
                                            <b style=" color: Red" class="">Unpaid</b>
                                        <?php    } else {
                                            echo 'Something wrong!';
                                        } ?>
                                    </td>
                                    <td></td>

                                </tr>
                                @endforeach


                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection