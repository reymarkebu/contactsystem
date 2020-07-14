@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Contacts
                    <div class="text-right">
                        <a href="{{route('contacts.create') }}" >Add Contact</a>
                    </div>
                </div>

                <div class="card-body">

                <div class="text-right">
                    <form class="example" action="{{route('contacts') }}" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search.." name="search2">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr class="header">
                            <th width="300px;">Name</th>
                            <th width="300px;">Company</th>
                            <th width="300px;">Phone</th>
                            <th width="300px;">Email</th>
                            <th width="300ps;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @if(!empty($data['items']) && count($data['items']) > 0)
                                @foreach($data['items'] as $contact)
                                <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->company }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <a href="{{route('contacts.edit', $contact->id) }}" class="btn btn-outline-dark">Edit</a>
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#deleteContact">Delete</button> 
                                    
                                </td>
                                </tr>
                                @endforeach
                                 <!-- modal -->
                                @include('contacts.modals.delete')
                        
                        @else
                        <tr>
                            <td colspan="10" align="center">There are no data.</td>
                        </tr>
                        @endif
                    
                    </tbody>

                </table>
                {{ $data['items']->links() }}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



