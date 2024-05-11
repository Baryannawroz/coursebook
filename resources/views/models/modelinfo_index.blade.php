<x-app-layout>
<div class=" mt-6 flex justify-center">
        <x-add-model-button></x-add-model-button>
        <x-approved-model-button></x-approved-model-button>
    </div>
<div class=" mt-6">
    </div>

<div class="flex flex-col justify-center items-center mt-28">
    <div class="overflow-x-auto w-full">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600">>
                <tr >
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">Module Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">Stage</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wide">Actions</th>
                </tr>
            </class=>
            <tbody class="divide-y divide-gray-200">
                @php $count = 1; @endphp
                @foreach($modelinfos as $model)
                <tr class="{{ $count % 2 == 0 ? 'bg-blue-200' : 'bg-white' }}">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $count++ }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->module_title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->subject->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->stage->department->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->stage->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center space-x-4">
                            <!-- Edit button -->
                            <a href="{{ route('model.edit', $model->id) }}"
                            class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </a>


                            <!-- Show button -->
                            <a href="{{ route('model.show', $model->id) }}"
                              >
                                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="miter"><path d="M2,12S5,4,12,4s10,8,10,8-2,8-10,8S2,12,2,12Z"/><circle cx="12" cy="12" r="4" stroke-width="0" fill="#059cf7" opacity="0.1"/><circle cx="12" cy="12" r="4"/></svg>
                            </a>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</x-app-layout>
