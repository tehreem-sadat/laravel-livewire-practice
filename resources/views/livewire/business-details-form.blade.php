<div class="space-y-4">

    <!-- Approval Status Message -->
    @if (!Auth::user()->approved)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 mx-auto text-center rounded-lg shadow-sm">
            <p class="font-medium">Your account is not approved yet. Please wait for approval before accessing the platform.</p>
        </div>
    @else
    <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-6 mb-6 mx-auto max-w-4xl text-center rounded-lg shadow-lg mt-6">
        <div class="flex items-center justify-center space-x-3 mb-4">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1.5 2A7.5 7.5 0 1112 4.5 7.5 7.5 0 0117.5 12z"></path>
            </svg>
            <h2 class="text-xl font-semibold">Account Approved</h2>
        </div>
        <p class="text-lg">Your account has been approved. Please fill out the form below to access the platform.</p>
    </div>
    @endif

    <!-- Form -->
    @if (!Auth::user()->business_details_filled)
        <form wire:submit.prevent="submit" class="space-y-6 p-6 bg-white rounded-lg shadow-lg max-w-md mx-auto border border-gray-200">
            
            <!-- Business Email -->
            <div class="form-group">
                <label for="business_email" class="block text-sm font-medium text-gray-700">Business Email:</label>
                <input type="email" id="business_email" wire:model="business_email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('business_email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('name') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Type -->
            <div class="form-group">
                <label for="type" class="block text-sm font-medium text-gray-700">Type:</label>
                <input type="text" id="type" wire:model="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('type') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- ABN -->
            <div class="form-group">
                <label for="abn" class="block text-sm font-medium text-gray-700">ABN:</label>
                <input type="text" id="abn" wire:model="abn" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('abn') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Account Number -->
            <div class="form-group">
                <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number:</label>
                <input type="text" id="account_number" wire:model="account_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('account_number') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit
            </button>
        </form>
    @else
        <div class="max-w-md mx-auto my-8 p-6 bg-green-100 border border-green-200 rounded-lg shadow-lg">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1.5 2A7.5 7.5 0 1112 4.5 7.5 7.5 0 0117.5 12z"></path>
                </svg>
                <span class="text-lg font-medium text-green-800">Thank you for submitting Business Form.</span>
            </div>
            <p class="mt-2 text-gray-600">Your account just needs approval from the admin. Thank you for your patience.</p>
        </div>
    @endif
</div>
