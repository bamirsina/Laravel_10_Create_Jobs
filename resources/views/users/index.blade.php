<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <h2>
                <a href="{{ route('users.create') }}">
                    Add Users
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
                                        Email
                                    </th><th scope="col" class="px-6 py-3">
                                        Roles
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $user)
                                    <tr class="bg-white border-b">
                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                      {{ ++$i }}
                                  </th>
                                  <td class="px-6 py-4">
                                      {{ $user->name }}
                                  </td>
                                  <td class="px-6 py-4">
                                      {{ $user->email }}
                                  </td>
                               <td>
                                   @if(!empty($user->getRoleNames()))
                                       @foreach($user->getRoleNames() as $v)
                                           <label class="badge badge-success">{{ $v }}</label>
                                       @endforeach
                                   @endif
                               </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('users.show',['id' => $user->id])}}" class="text-blue-700 hover:text-green-600">Show</a>
                                        @can('user-edit')
                                            <a href="{{ route('users.edit', $user) }}" class="text-green-400 hover:text-green-600">Edit</a>
                               @endcan
                               @can('user-delete')
                                   <form method="POST" class="text-red-400 hover:text-red-600" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                       @csrf
                                       @method('DELETE')
                                   <button type="submit">Delete</button>
                              </form>
                              @endcan
                               </td>
                           </tr>
                       @endforeach
                   </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
{{--    {!! $users->render() !!}--}}
</x-app-layout>
