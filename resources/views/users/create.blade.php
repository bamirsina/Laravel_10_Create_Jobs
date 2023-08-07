<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Uses') }}
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
                    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <label for="name" class="block font-semibold">Name:</label>
                        <input type="text" name="name" id="name" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email" class="block font-semibold">Email:</label>
                                <input type="email" name="email" id="email" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="password" class="block font-semibold">Password:</label>
                                <input type="password" name="password" id="password" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="confirm-password" class="block font-semibold">Confirm Password:</label>
                                <input type="password" name="confirm-password" id="confirm-password" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="role" class="block font-semibold">Role:</label>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none">Submit</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
                    {!! Form::close() !!}

