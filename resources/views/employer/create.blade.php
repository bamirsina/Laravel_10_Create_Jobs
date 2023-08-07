<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employer') }}
        </h2>
        <h2>
            <a href="{{ route('employer.index') }}">
                Back
            </a>
        </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('employer.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block font-semibold">Full Name:</label>
                            <input type="text" name="name" id="name" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="number" class="block font-semibold">Number:</label>
                            <input type="number" name="number" id="number" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block font-semibold">Email:</label>
                            <input type="email" name="email" id="email" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="job" class="block font-semibold">Select Job:</label>
                            <select type="text" name="job_id" id="job" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Select Job</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="age" class="block font-semibold">Age:</label>
                            <input type="number" name="age" id="age" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
