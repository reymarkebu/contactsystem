@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Contacts
                    <div class="text-right">
                        <a href="{{route('contacts') }}" >Contacts </a>
                    </div>
                </div>

                <form action="{{ route('contacts.update', $data['id']) }}" method="post">  
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col big-box">
                                    <h4>Contact Details</h4>
                                    <hr/>
                                    <div class="row form-group">
                                        <div class="col-sm-4 text-right">
                                            Name:
                                        </div>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" name="name" value="{{ $data['name'] }}" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4 text-right">
                                            company:
                                        </div>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" name="company" value="{{ $data['company'] }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4 text-right">
                                            Phone:
                                        </div>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" name="phone" value="{{ $data['phone'] }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-4 text-right">
                                            Email:   
                                        </div>
                                        <div class="col-sm">
                                            <input type="email" class="form-control" name="email" value="{{ $data['email'] }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm">
                                            <button type="submit" class="btn btn-outline-dark">Update</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
