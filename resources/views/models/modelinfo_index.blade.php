<x-app-layout>
<div class="flex justify-center mt-2">
    <a href="{{ route('model.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-4">Add
        model</a>
</div>
<div class="flex flex-col justify-center items-center h-screen">
    <div class="overflow-x-auto w-full">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">module title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departemnt</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">stage</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php $count = 1; @endphp
                @foreach($modelinfos as $model)
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap">{{ $count++ }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->module_title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->subject->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->stage->department->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $model->stage->name }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center space-x-4">
                            <!-- Edit button -->
                            <a href="{{ route('model.edit', $model->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </a>

                            <a href="{{ route('model.show', $model->id) }}"
                                class="text-yellow-300 hover:text-yellow-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
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
