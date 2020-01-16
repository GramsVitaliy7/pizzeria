@extends('layouts.app')

@section('content')
    <!-- a place for the payment form -->
    <a href="{{ route('home.tracking.index') }}"
       class="btn btn-primary d-inline p-2 bg-primary text-white">
        By cash
    </a>
@endsection
