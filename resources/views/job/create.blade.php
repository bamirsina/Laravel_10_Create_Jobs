<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Job') }}
        </h2>
            <h2>
                <a href="{{ route('job.index') }}">
                    Back
                </a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('job.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block font-semibold">Job Name:</label>
                            <input type="text" name="name" id="name" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none">Create Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
