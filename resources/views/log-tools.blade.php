@extends('layouts.basic')

@section('title', 'Log Tools')

@section('body')
<div class="container">
    <mongo-syntax api-url="{{ $apiUrl }}"></mongo-syntax>
</div>
@endsection