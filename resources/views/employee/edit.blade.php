<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
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
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block font-semibold">Full Name:</label>
                            <input type="text" name="name" id="name" required value="{{ $employee->name }}" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="number" class="block font-semibold">Number:</label>
                            <input type="number" name="number" id="number" required value="{{ $employee->number }}" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block font-semibold">Email:</label>
                            <input type="email" name="email" id="email" required value="{{ $employee->email }}" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="job" class="block font-semibold">Job:</label>
                            <select type="text" name="job" id="job" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Select Job</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="age" class="block font-semibold">Age:</label>
                            <input type="number" name="age" id="age" required value="{{ $employee->age }}" class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="supervisor" class="block font-semibold">Supervisor:</label>
                            <select name="supervisor" id="supervisor" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="">Select Supervisor</option>
                                @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}" @if($supervisor->id === $employee->supervisor) selected @endif>{{ $supervisor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const supervisorsByJob = @json($supervisors->groupBy('job'));
        let selectedJobId = @json($selectedJobId);

        // Function to update the supervisor dropdown based on the selected job
        function updateSupervisors() {
            const supervisorSelect = document.getElementById('supervisor');
            supervisorSelect.innerHTML = '<option value="">Select Supervisor</option>';

            if (selectedJobId in supervisorsByJob) {
                supervisorsByJob[selectedJobId].forEach((supervisor) => {
                    const option = document.createElement('option');
                    option.value = supervisor.id;
                    option.textContent = supervisor.name;
                    supervisorSelect.appendChild(option);
                });
            }
        }

        // Initial call to update the supervisors based on the selected job
        updateSupervisors();

        // Event listener to update the supervisors whenever the job selection changes
        document.getElementById('job').addEventListener('change', function() {
            selectedJobId = this.value;
            updateSupervisors();
        });
    </script>
</x-app-layout>
