<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Business Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                @if ($businessDetail)
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="text-xl text-gray-800 mb-4 text-center">
                            <span class="font-bold">{{ $user->name }}</span>
                        </h2>
                        <div class="space-y-4">
                            <p class="text-gray-700"><strong class="font-semibold">Business Email:</strong> {{ $businessDetail->business_email }}</p>
                            <p class="text-gray-700"><strong class="font-semibold">Name:</strong> {{ $businessDetail->name }}</p>
                            <p class="text-gray-700"><strong class="font-semibold">Type:</strong> {{ $businessDetail->type }}</p>
                            <p class="text-gray-700"><strong class="font-semibold">ABN:</strong> {{ $businessDetail->abn }}</p>
                            <p class="text-gray-700"><strong class="font-semibold">Account Number:</strong> {{ $businessDetail->account_number }}</p>
                        </div>
                    </div>
                @else
                    <div class="p-6 bg-red-50 border border-red-300 rounded-lg shadow-md text-red-700">
                        <h1 class="text-lg font-bold">Form Not Found</h1>
                        <p>Could not find the submitted form in the database. Please check back later or contact support.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
