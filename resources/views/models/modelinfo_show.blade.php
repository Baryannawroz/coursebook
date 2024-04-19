<x-app-layout>

    <div class="flex flex-wrap mt-6">

        <div class="w-full md:w-1/3 px-2 my-4">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Subject</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $model->subject->name }}</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-2 my-4 ">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Departement & stage
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $model->stage->department->name
                    ."/".$model->stage->name}}</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-2 my-4">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lecturer</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $model->module_leader}}</p>
            </div>
        </div>
    </div>

    <div>

        <div class="container mx-auto text-center mt-8">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Delivery Plan (Weekly
                Syllabus)</h5>
            <!-- This is an example component -->
            <div class="max-w-2xl mx-auto">

                <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                                <table
                                    class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700 text-left">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                weekly
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Week Material Covered
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                <x-popup :modelid="$model_id" :contents="$contents" />
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        {!! $count=1;!!}

                                        @foreach ($subjectContents as $content )

                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 w-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-1" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                week {{ $count++ }}</td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                {{ $content->material_covered }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <form
                                                    action="{{ route('plandelivery.destroy', ['DeliveryPlan' => $content->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 dark:red-blue-500 hover:underline bg-transparent border-none cursor-pointer">Delete</button>
                                                </form>
                                                {{--
                                                <x-popupedit :contentt="$content->id" :contents="$contents" /> --}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container mx-auto text-center mt-8">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Relation With Other Modules
        </h5>

        <div class="max-w-2xl mx-auto">
            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700 text-left">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <a href="{{ route('model.related',$model->id)  }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-4">Add
                        Stage</a>
                    <tr>

                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Pre-requisites
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            {!!  $model->pre_requisites !!}
                        </th>



                    </tr>
                    <tr>

                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Co_requisites
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            {!! $model->co_requisites !!} </th>



                    </tr>
                </thead>
            </table>
        </div>
    </div>


</x-app-layout>
