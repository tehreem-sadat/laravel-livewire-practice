<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="border-red-600 p-6 max-w-full md:max-w-4xl mx-auto bg-white rounded-lg shadow-lg mt-10">
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if(auth()->user()->hasRole('admin'))
            <div class="mb-6 text-right">
                <button wire:click="create()"
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-tr from-gray-900 to-gray-800 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-900">
                    Add New
                </button>
            </div>
        @endif

        <!-- Modal Backdrop -->
        @if ($isModalOpen)
            <div class="fixed inset-0 z-50 grid place-items-center bg-black bg-opacity-60">
                <div class="relative w-full max-w-lg bg-white rounded-lg shadow-xl p-6">
                    <button wire:click="closeModal"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <div>
                        @if ($updateMode)
                            @include('livewire.update')
                        @else
                            @include('livewire.create')
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto mt-10">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mt-10 md:hidden">
            @foreach($users as $user)
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ $user->name }}</h3>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @if(auth()->user()->hasRole('admin'))
                        <p><strong>Approved:</strong> {{ $user->approved ? 'Yes' : 'No' }}</p>
                        <p><strong>Role:</strong> {{ $user->roles->first()->name ?? 'N/A' }}</p>
                        <p><strong>Business Form:</strong> 
                            @if($user->business_details_filled)
                                <a href="{{ route('view.form', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    View Form
                                </a>
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                        </p>
                        <div class="mt-4 flex space-x-2">
                            <button wire:click="edit({{ $user->id }})" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="delete({{ $user->id }})" class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-semibold rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>



            <table class="min-w-full bg-white divide-y divide-gray-200 max-md:hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        @if(auth()->user()->hasRole('admin'))
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Approved</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Business Form</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            @if(auth()->user()->hasRole('admin'))
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->approved ? 'Yes' : 'No' }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->roles->first()->name ?? 'N/A' }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($user->business_details_filled)
                                        <a href="{{ route('view.form', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                            View Form
                                        </a>
                                    @else
                                        <span class="text-gray-500">N/A</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{ $user->id }})" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="delete({{ $user->id }})" class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-semibold rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 ml-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
