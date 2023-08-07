<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="ag-format-container">
                        <div class="ag-courses_box">
@can('user-list')
                            <div class="ag-courses_item">
                                <a href="{{ route('users.index') }}" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                        Users
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Total Jobs:
                                        <span class="ag-courses-item_date">
                                               {{ $userCount }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @endcan
                            <div class="ag-courses_item">
                                <a href="{{ route('job.index') }}" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                         JOBS
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Total Jobs:
                                        <span class="ag-courses-item_date">
                                               {{ $jobCount }}
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="ag-courses_item">
                                <a href="{{ route('employer.index') }}" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                         EMPLOYERS
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Total Employers:
                                        <span class="ag-courses-item_date">
                                              {{ $employerCount }}
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="ag-courses_item">
                                <a href="{{ route('employee.index') }}" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                         EMPLOYEES
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Total Employees:
                                        <span class="ag-courses-item_date">
                                            {{ $employeeCount }}

                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
</x-app-layout>
