@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="page-title">Products</h1>
        <a href="{{ route('products.create') }}" class="btn-primary">New Product</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="table-header">Name</th>
                    <th class="table-header">Price</th>
                    <th class="table-header hidden md:table-cell">Description</th>
                    <th class="table-header text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="table-row">
                        <td class="table-cell">
                            <a href="{{ route('products.show', $product) }}" class="hover:underline">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="table-cell">${{ number_format($product->price, 2) }}</td>
                        <td class="table-cell-muted hidden md:table-cell truncate max-w-xs">
                            {{ $product->description }}
                        </td>
                        <td class="table-cell text-right">
                            <a href="{{ route('products.edit', $product) }}" class="link-blue mr-3">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link-muted" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endsection
