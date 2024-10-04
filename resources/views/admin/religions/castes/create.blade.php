@extends('layouts.auth');
@section('title', 'Castes | Admin')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <h3 class="card-header">
                Create Caste</h3>
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="{{ url('dashboard') }}">Home</a> </li>
                        <li class="breadcrumb-item"> <a href="{{ route('castes.index') }}">Caste</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Caste</li>
                    </ol>
                </nav>
            </div>

            <div class="card-body">
                {{-- Display Error Msg --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- Display Success Msg --}}
                {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}


            <form action="{{ route('castes.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Religion</label>
                    <select name="religion_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->religion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Caste</label>
                    <input type="text" class="form-control" name="caste" placeholder="Enter Caste Name">
                </div>
                {{-- <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div> --}}
                <div><label>Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                 value="1">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input" checked="checked" value="0">
                            <label class="custom-control-label" for="customRadio2">InActive</label>
                        </div>

                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                 <x-submit-button-component 
                      buttonStyle="$buttonStyle->buttonStyle"
                      content="Create Caste "
                      />
            </form>
        </div>
    </div>
</div>
</div>
@endsection
