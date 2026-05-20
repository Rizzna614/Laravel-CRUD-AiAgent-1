@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="back-link">&larr; Back to Products</a>
    </div>

    <h1 class="page-title mb-6">Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" class="max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" @error('name') class="border-red-500" @enderror>
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="label">Price</label>
            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price') }}" @error('price') class="border-red-500" @enderror>
            @error('price')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="label">Description</label>
            <textarea name="description" id="description" rows="4" @error('description') class="border-red-500" @enderror>{{ old('description') }}</textarea>
            @error('description')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-primary">Create Product</button>
    </form>
@endsection
