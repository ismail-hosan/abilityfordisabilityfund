@extends('admin.masterTemplate')
@section('menu-name')
ADD RULES
@endsection
@section('main-content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"> Contact And Advise</h5>
                </div>

            </div>
        </div>
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fas fa-thumbs-up"></i> Contact And Advise</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{'updatecontact/'.$contact->id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                    
                                        <div class="form-group">
                                            <label>Head Quarters</label>
                                            <textarea class="form-control" name="address_one" rows="2"
                                                placeholder="Address Of Head Quarters">{{$contact->address_one}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Branch Office</label>
                                            <textarea class="form-control" name="address_two" rows="2"
                                                placeholder="Address Of Branch Office">{{$contact->address_two}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" id="phone" name="email" value="{{$contact->email}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="tel" id="phone" name="phone" value="{{$contact->phone}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input type="tel" id="phone" name="fax" value="{{$contact->fax}}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Location Map</label>
                                        <textarea class="form-control" name="location_map" rows="2"
                                            placeholder="Address Of Branch Office">{{ $contact->location_map }}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    {!! $contact->location_map !!}
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-5">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Change </button>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection