<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show User') }}
            </h2>
            <h2>
                <a href="{{ route('users.index') }}">
                    Back
                </a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <div class="col-span-2 sm:col-span-1">
                                <p class="text-lg font-semibold">Name:</p>
                                <p class="text-gray-800">{{ $user->name }}</p>
                            </div>
                        </div>
                    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-lg font-semibold">Email:</p>
                <p class="text-gray-800">{{ $user->email }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-lg font-semibold">Roles:</p>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
