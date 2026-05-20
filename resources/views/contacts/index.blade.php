@extends('layouts.app')

@section('title', 'Contact Submissions')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="page-title">Contact Submissions</h1>
        <a href="{{ route('contact.create') }}" class="btn-primary">New Contact</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="table-header">Name</th>
                    <th class="table-header">Email</th>
                    <th class="table-header hidden md:table-cell">Question</th>
                    <th class="table-header hidden md:table-cell">Submitted</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="table-row">
                        <td class="table-cell">{{ $contact->name }}</td>
                        <td class="table-cell">{{ $contact->email }}</td>
                        <td class="table-cell-muted hidden md:table-cell truncate max-w-xs">{{ $contact->question }}</td>
                        <td class="table-cell-muted hidden md:table-cell">{{ $contact->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">No contact submissions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>
@endsection
