<form class="space-y-6 p-6 bg-white rounded-lg max-w-md mx-auto">
    <!-- Name Input -->
    <div class="form-group">
        <label for="name" class="{{ $errors->has('name') ? 'text-red-700' : 'text-gray-700' }} block text-sm font-medium">Name:</label>
        <input type="text" id="name" wire:model="name" 
               class="{{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Email Input -->
    <div class="form-group">
        <label for="email" class="{{ $errors->has('email') ? 'text-red-700' : 'text-gray-700' }} block text-sm font-medium">Email:</label>
        <input type="email" id="email" wire:model="email" 
               class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Password Input -->
    <div class="form-group">
        <label for="password" class="{{ $errors->has('password') ? 'text-red-700' : 'text-gray-700' }} block text-sm font-medium">Password:</label>
        <input type="password" id="password" wire:model="password" 
               class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Approved Checkbox -->
    <div class="form-group">
        <label for="approved" class="inline-flex items-center">
            <input type="checkbox" id="approved" wire:model="approved"
                   class="{{ $errors->has('approved') ? 'ring-red-500' : 'ring-gray-300' }} form-checkbox">
            <span class="ml-2 {{ $errors->has('approved') ? 'text-red-700' : 'text-gray-700' }}">Approved</span>
        </label>
        @error('approved') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Buttons -->
    <div class="flex space-x-4">
        <button type="submit" wire:click.prevent="store()" 
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Create
        </button>
        <button type="button" wire:click.prevent="closeModal()" 
                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Cancel
        </button>
    </div>
</form>

