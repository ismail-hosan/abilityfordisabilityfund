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
                    <h5 class="m-0 text-dark">ALL MEMBERS</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">

    </div>
    <!-- /.content-header -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">

                @if(session()->has('smessage'))
                <div class="col-md-12 alert alert-success">
                    {{ session()->get('smessage') }}
                </div>
                @endif
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Members</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>ID Number</th>
                                        <th>Name</th>
                                        <th>Action
                                            <input type="checkbox" name="select-all" id="select-all" />
                                        </th>
                                    </tr>
                                </thead>
                                <form action="{{route('storeShowMember')}}" method="post">
                                    @csrf
                                    @foreach ($users as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->id_number }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td><input name="member_id[]" value="{{ $value->id }}" type="checkbox"></td>

                                    </tr>
                                    @endforeach



                                    <tr>
                                        <td colspan="3">
                                            ID : <input name="m_id" value="1" type="checkbox"> |
                                            Name : <input name="m_name" value="1" type="checkbox"> |
                                            Email : <input name="m_email" value="1" type="checkbox"> |
                                            Phone : <input name="m_phone" value="1" type="checkbox"> |
                                            Designation : <input value="1" name="m_designation" type="checkbox">
                                            Blood : <input value="1" name="m_blood" type="checkbox">
                                            Reference : <input value="1" name="m_reference" type="checkbox">
                                            Total Pay : <input value="1" name="m_pay" type="checkbox">
                                        </td>
                                        <td align="center">
                                            <button class="btn-success btn" type="submit">Save</button>
                                        </td>
                                    </tr>
                                </form>
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
<script>
    $('#select-all').click(function(event) {
if(this.checked) {
// Iterate each checkbox
$(':checkbox').each(function() {
this.checked = true;
});
} else {
$(':checkbox').each(function() {
this.checked = false;
});
}
});
</script>
@endsection
<!-- Content Wrapper. Contains page content -->
