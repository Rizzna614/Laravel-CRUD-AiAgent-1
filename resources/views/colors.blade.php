@extends('layouts.app')

@section('title', 'Colors')

@section('content')
    <p class="text-lg">Colors: {{ implode(', ', $colors) }}</p>
@endsection
