@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Messages
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Message Details</h1>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- Header -->
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $message->subject }}</h2>
                    <p class="text-sm text-gray-600 mt-1">Received on {{ $message->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
                @if($message->is_read)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        Read
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        New
                    </span>
                @endif
            </div>
        </div>

        <!-- Sender Information -->
        <div class="px-6 py-4 border-b border-gray-200 bg-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">From</label>
                    <p class="text-gray-900 font-medium">{{ $message->name }}</p>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Email</label>
                    <p class="text-gray-900">
                        <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:underline">{{ $message->email }}</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Message Content -->
        <div class="px-6 py-6">
            <label class="text-xs font-semibold text-gray-500 uppercase mb-2 block">Message</label>
            <div class="prose max-w-none">
                <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Reply via Email
            </a>

            <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" 
                  method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
