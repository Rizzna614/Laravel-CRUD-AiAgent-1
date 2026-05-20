@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="back-link">&larr; Back to Products</a>
    </div>

    <div class="card">
        <h1 class="page-title mb-2">{{ $product->name }}</h1>
        <p class="text-lg text-green-400 font-medium mb-4">${{ number_format($product->price, 2) }}</p>

        @if ($product->description)
            <p class="text-gray-400 leading-relaxed">{{ $product->description }}</p>
        @else
            <p class="text-gray-400 italic">No description provided.</p>
        @endif

        <div class="section-divider flex gap-3">
            <a href="{{ route('products.edit', $product) }}" class="btn-primary">Edit Product</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-ghost" onclick="return confirm('Are you sure?')">Delete Product</button>
            </form>
        </div>
    </div>
@endsection
