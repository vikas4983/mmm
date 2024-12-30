@extends('layouts.frontend.main-master')
@section('title', 'Search Result')
@section('content')

<div>
  <x-search-result-component :searchResults="$searchResults" :user="$user" :options="$options" />
</div>

@endsection
