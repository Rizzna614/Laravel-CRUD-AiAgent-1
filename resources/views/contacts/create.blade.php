@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <h1 class="page-title mb-6">Contact Us</h1>

    <form action="{{ route('contact.store') }}" method="POST" class="max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" @error('name') class="border-red-500" @enderror>
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" @error('email') class="border-red-500" @enderror>
            @error('email')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="question" class="label">Question</label>
            <textarea name="question" id="question" rows="5" @error('question') class="border-red-500" @enderror>{{ old('question') }}</textarea>
            @error('question')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-primary">Submit Question</button>
    </form>
@endsection
