@extends('admin.masterTemplate')

@section('menu-name')
PROFILE
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">DONOR HISTORY</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> - All DONATION</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Method </th>
                                        <th> TX ID </th>
                                        <th> TX Image </th>
                                        <th> Amount </th>
                                        <th> Date Time </th>
                                        <th> Note </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                     @foreach ($payments as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->payment_method}}</td>
                                        <td>{{ $value->tx_id }}</td>
                                        <td>
                                            @if($value->tx_image)
                                                <img src="{{ asset('uploads/' . $value->tx_image) }}" alt="Transaction Image" height="80px" width="80px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $value->amount }}</td>
                                        <td>{{ $date = $value->created_at->format('h:i A - d/m/Y') }}</td>
                                        <td>{{ $value->note }}</td>
                                        {{-- <td>{{ $value->name }}</td> --}}
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
    <!-- /.content -->
</div>

@include('admin/pages/model/profilemodel')

<script>
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#division').change(function () {
            var division = $('#division').val();

            $.ajax({
                type: "post",
                url: "/memberDistList", // path to function
                cache: false,

                data: {
                    "_token": "{{ csrf_token() }}",
                    division: division
                },
                success: function (val) {
                    try {
                        $('.district').html(val);
                    } catch (e) {
                        alert('Exception while request..');
                    }

                },
                error: function () {
                    alert('Error while request..');
                }
            });
        });

        $('#dist').change(function () {
            var district = $('#district').val();
            $.ajax({
                type: "post",
                url: "/memberThanaList", // path to function
                cache: false,

                data: {
                    "_token": "{{ csrf_token() }}",
                    district: district
                },
                success: function (val) {

                    try {
                        $('.thana').html(val);
                    } catch (e) {
                        alert('Exception while request..');
                    }

                },
                error: function () {
                    alert('Error while request..');
                }
            });
        });
    });
</script>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


@endsection
<!-- Content Wrapper. Contains page content -->
