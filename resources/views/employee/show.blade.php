<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Employer') }}
        </h2>
            <h2>
                <a href="{{ route('employee.index') }}">
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
                            <p class="text-lg font-semibold">ID:</p>
                            <p class="text-gray-800">{{ $employee->id }}</p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Name:</p>
                            <p class="text-gray-800">{{ $employee->name }}</p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Job:</p>
                            <p class="text-gray-800">
                                @if($employee->jobs)
                                    {{ $employee->jobs->name }}
                                @else
                                    <span class="text-red-600">Job deleted</span>
                            @endif
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Age:</p>
                            <p class="text-gray-800">{{ $employee->age }}</p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Email:</p>
                            <p class="text-gray-800">{{ $employee->email }}</p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Number:</p>
                            <p class="text-gray-800">{{ $employee->number }}</p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Supervisor:</p>
                            <p class="text-gray-800">
                                @if($employee->boss)
                                    {{ $employee->boss->name }}
                                @else
                                    <span class="text-red-600">Supervisor deleted</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-lg font-semibold">Status:</p>
                            <p class="text-gray-800">{{ $employee->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
