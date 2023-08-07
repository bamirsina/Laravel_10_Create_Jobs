<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
            <h2>
                <a href="{{ route('job.create') }}">
                    Add Job
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4">
                        @forelse($jobs as $job)
                            <div class="border rounded-lg p-4 flex items-center">
                                <div class="flex-grow">
                                    <p class="text-lg font-semibold">Job Name:</p>
                                    <p class="text-gray-800">{{ $job->name }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('job.edit', $job) }}" class="text-green-400 hover:text-green-600">Edit</a>
                                    <form method="POST" class="text-red-400 hover:text-red-600" action="{{ route('job.destroy', $job) }}" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    No Jobs found
                                </td>
                            </tr>
                        @endforelse
                    </div>
                </div>
            </div>
          </div>
         </div>
        </div>
       </div>
       </div>
    </div>
</x-app-layout>
