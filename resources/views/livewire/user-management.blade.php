<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
<div class="p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-lg mt-10">
    @if (session()->has('message'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

   

    <div>
    <!-- Button to Open Modal -->
    @if(auth()->user()->hasRole('admin'))
    <button wire:click="create()"
        class="select-none rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
        Add new
    </button>
    @endif
    <!-- Modal Backdrop -->
    @if ($isModalOpen)
        <div class="fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-100 backdrop-blur-sm transition-opacity duration-300"
            wire:click="closeModal">
            
            <div class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
                @click.stop>
                <button wire:click="closeModal"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="m-6">
                    <div class="space-y-4">
                        @if ($updateMode)
                            @include('livewire.update')
                        @else
                            @include('livewire.create')
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>


    <table class="min-w-full divide-y divide-gray-200 mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                @if(auth()->user()->hasRole('admin'))
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Approved</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                @endif

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                    @if(auth()->user()->hasRole('admin'))
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->approved ? 'true' : 'false' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->roles->first()->name; }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

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
