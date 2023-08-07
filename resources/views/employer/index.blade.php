<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employer') }}
                <div>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.293 8.293a1 1 0 011.414 0l4.4 4.4a1 1 0 11-1.414 1.414l-4.4-4.4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M5 9a4 4 0 118 0 4 4 0 01-8 0zm8-7a1 1 0 11-2 0 1 1 0 012 0zm-1 0a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <form method="GET">
                        <label for="search"></label><input type="text" name="search" id="search" value="{{ request()->get('search') }}"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6;" placeholder="Search For Employer">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <button type="submit" class="py-1 px-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Search</button>
                        </div>
                        </form>
                    </div>
                </div>
            </h2>
            <h2>
                <a href="{{ route('employer.create') }}">
                    Add Employer
                </a>
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">
            {{ session('success') }}
            <span class="float-right cursor-pointer" onclick="this.parentElement.remove();">&times;</span>
        </div>
    @endif
    @if(session('danger'))
        <div class="bg-red-200 text-red-800 px-4 py-2 rounded-md mb-4">
            {{ session('danger') }}
            <span class="float-right cursor-pointer" onclick="this.parentElement.remove();">&times;</span>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 bg-white">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Job
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Age
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($employers as $employer)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $employer->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $employer->name }}
                            </td>
                            <td class="px-6 py-4">
                               @if($employer->job)
                                    {{ $employer->job->name }}
                                @else
                                    <span class="text-red-600">Job deleted</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $employer->age }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employer->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employer->number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employer->status }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('employer.show',['id' => $employer->id])}}" class="text-blue-700 hover:text-green-600">Show</a>
                                    <a href="{{ route('employer.edit', $employer) }}" class="text-green-400 hover:text-green-600">Edit</a>
                                    <form method="POST" class="text-red-400 hover:text-red-600" action="{{ route('employer.destroy', $employer) }}" onsubmit="return confirm('Are you sure you want to delete this employer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No employer found
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
