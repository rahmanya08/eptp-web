@extends('layouts.master-form')

@section('title', 'Test Card')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/form-theme.css') }}">
@endpush

@section('container')

@endsection

@push('child-js')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush