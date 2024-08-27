<form class="space-y-6 p-6 bg-white rounded-lg shadow-md max-w-md mx-auto">
    <div class="form-group">
        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
        <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
        <input type="email" id="email" wire:model="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="flex space-x-4">
        <button type="submit" wire:click.prevent="update()" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Update
        </button>
        <button type="button" wire:click.prevent="resetInputFields()" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Cancel
        </button>
    </div>
</form>
