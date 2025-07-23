@extends('layouts.frontend.master')
@section('title', $cmsPage->title)
@section('content')
    <div class="container mt-20">
        <div class="row ">
            {!! $cmsPage->content !!}
        </div>
    </div>

@endsection
