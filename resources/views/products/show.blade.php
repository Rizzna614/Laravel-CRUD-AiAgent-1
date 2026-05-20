@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="back-link">&larr; Back to Products</a>
    </div>

    <div class="card">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="page-title mb-2">{{ $product->name }}</h1>
                <p class="text-lg text-green-400 font-medium mb-4">${{ number_format($product->price, 2) }}</p>
            </div>

            <form action="{{ route('products.update', $product) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PUT')
                <select name="status" class="px-3 py-2 border border-gray-600 bg-gray-800 text-white rounded-sm text-sm focus:outline-none focus:border-blue-500">
                    <option value="available" @selected($product->status === 'available')>Available</option>
                    <option value="unavailable" @selected($product->status === 'unavailable')>Unavailable</option>
                    <option value="unknown" @selected($product->status === 'unknown')>Unknown</option>
                </select>
                <button type="submit" class="btn-primary">Update Status</button>
            </form>
        </div>

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
