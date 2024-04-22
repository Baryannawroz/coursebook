<x-app-layout>

    <div class="flex justify-center mt-2">
        <x-add-subject-button></x-add-subject-button>
    </div>

    <div class="flex flex-col-reverse justify-center items-center mt-28">
        <div class="overflow-x-auto">
            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Subject Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Subject Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach($subjects as $subject)
                    <tr class="{{ $count % 2 == 0 ? 'bg-blue-200' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $count++ }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $subject->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $subject->code }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('subject.edit', $subject->id) }}" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
