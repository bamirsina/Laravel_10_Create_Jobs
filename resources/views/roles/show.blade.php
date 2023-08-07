<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show Role') }}
            </h2>
            <h2>
                <a href="{{ route('roles.index') }}">
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
                                <p class="text-gray-800">{{ $role->name }}</p>
                            </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
                       <div class="form-group">
                           <strong>Permissions:</strong>
                           @if(!empty($rolePermissions))
                               @foreach($rolePermissions as $v)
                                   <label class="label label-success">{{ $v->name }},</label>
                               @endforeach
                       @endif
                   </div>
               </div>
           </div>
            </div>
        </div>
    </div>
</x-app-layout>
