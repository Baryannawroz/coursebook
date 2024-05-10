<x-app-layout>
    <div>

        <div class="flex flex-wrap mt-6 pointer">

            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 first-section rounded-lg shadow transition duration-300 ease-in-out text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Subject</h5>
                    <p class="font-normal text-white">{{ $model->subject->name }}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div
                    class="p-6 rounded-lg shadow secound-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Department & stage
                    </h5>
                    <p class="font-normal text-white">{{ $model->stage->department->name ."/".$model->stage->name}}</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div
                    class="p-6 rounded-lg shadow third-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Lecturer</h5>
                    <p class="font-normal text-white">{{ $model->module_leader}}</p>
                </div>
            </div>
        </div>

        <div class="">

            <div class="container mx-auto text-center my-32">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-600">Delivery Plan (Weekly
                    Syllabus)</h5>
                <!-- This is an example component -->
                <div class="max-w-2xl mx-auto">

                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y table-fixed text-left">
                                        <thead class="bg-blue-600">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-all" type="checkbox"
                                                            class="w-4 h-4 bg-blue-200 text-blue-500 rounded-sm focus:text-blue-500 focus:border focus:bg-blue-500 focus:ring-2">
                                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                                    </div>
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-white">
                                                    weekly
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-white">
                                                    Week Material Covered
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-medium tracking-wider text-right text-white">
                                                    <x-popup :modelid="$model_id" :contents="$contents" />
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-blue-600 divide-y">
                                            <?php $count = 1; ?>
                                            @foreach ($subjectContents as $content )

                                            <tr class="bg-blue-300">
                                                <td class="p-4 w-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-1" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                                        <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
                                                    week {{ $count++ }}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
                                                    {{ $content->material_covered }}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <form
                                                        action="{{ route('plandelivery.destroy', ['DeliveryPlan' => $content->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 dark:red-blue-500 font-bold hover:underline bg-transparent border-none cursor-pointer">Delete</button>
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
        <div class="flex flex-col justify-center items-center gap-4 my-12">
            <div class="text-center w-full md:w-2/4 min-h-52 mt-8 border test relative rounded-xl">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Module Aims, Learning Outcomes and
                    Indicative Contents</h5>

                <div class="w-full">
                    <table class="w-full mb-4">
                        <thead class="w-full text-center ">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-bold tracking-wider text-left text-white uppercase">
                                    - Module Aims
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->module_aims !!}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Module Learning Outcomes
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->module_learning_outcomes !!}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Indicative Contents
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->indicative_contents !!}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('model.aims', $model->id) }}"
                        class="bg-white text-black font-bold py-2 px-12 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>

            <div class="text-center mt-8 w-full md:w-2/4 h-52 test2 relative rounded-xl">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Relation With Other
                    Modules</h5>

                <div class="w-full relative">
                    <table class="min-w-full divide-y divide-gray-200 mb-4">
                        <thead class="w-full text-center relative">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Pre-requisites
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->pre_requisites !!}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Co-requisites
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->co_requisites !!}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('model.related', $model->id) }}"
                        class="bg-white text-black font-bold py-2 px-12 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>

            <div class="text-center mt-8 w-full md:w-2/4 h-52 test3 relative rounded-xl">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Learning and Teaching
                    Strategies</h5>

                <div class="w-full relative">
                    <table class="min-w-full divide-y divide-gray-200 mb-4">
                        <thead class="w-full text-center">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Strategies
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->strategies !!}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('model.strategie', $model->id) }}"
                        class="bg-white text-black font-bold py-2 px-12 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>

            <div class="text-center mt-8 w-full md:w-2/4 h-52 test4 relative rounded-xl">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Learning and Teaching
                    Resources</h5>

                <div class="w-full relative">
                    <table class="min-w-full divide-y divide-gray-200 mb-4">
                        <thead class="w-full text-center">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Required Texts
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->required_texts !!}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Recommended Texts
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->recommended_texts !!}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase">
                                    - Websites
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    {!! $model->websites !!}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('model.resources', $model->id) }}"
                        class="bg-white text-black font-bold py-2 px-12 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>
        </div>

    </div>
    <div class="">

        <div class="container mx-auto text-center my-32">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-600">Module Evaluation</h5>
            <!-- This is an example component -->
            <div class="max-w-2xl mx-auto">

                <div class="flex flex-col">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y table-fixed text-left">
                                    <thead class="bg-blue-600">
                                        <tr>

                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-white">
                                                Evaluation
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-white">
                                                Number/Time
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-white">
                                                Weight (Marks)
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-white">
                                                Week Due
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-white">
                                                Relevant Learning Outcome
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-blue-600 divide-y">


                                        @foreach ($module_evaluations as $evaluation )

                                        <tr class="bg-blue-300">

                                            <td class="py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
                                                {{ $evaluation->evaluation}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
                                                {{ $evaluation->number_time}}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-black whitespace-nowrap">
                                                {{ $evaluation->weight_mark }}</td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                {{ $evaluation->week_due }}
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                {{ $evaluation->relevant_learning_outcome }}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                <div class=" p-6     bg-blue-300">
                                    <a href="{{ route('model.evalution', $model->id) }}"
                                        class="bg-white text-black font-bold py-2 px-12 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>

<style>
    .first-section {


        background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;



    }

    .first-section:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }


    .secound-section {
        background-image: linear-gradient(to right, #4b6cb7 0%, #182848 51%, #4b6cb7 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .secound-section:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }




    .third-section {
        background-image: linear-gradient(to right, #134E5E 0%, #71B280 51%, #134E5E 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .third-section:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }




    .test {
        background-image: linear-gradient(to right, #f46b45 0%, #eea849 51%, #f46b45 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .test:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }

    .test2 {
        background-image: linear-gradient(to right, #76b852 0%, #8DC26F 51%, #76b852 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .test2:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }


    .test3 {
        background-image: linear-gradient(to right, #56CCF2 0%, #2F80ED 51%, #56CCF2 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .test3:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }



    .test4 {
        background-image: linear-gradient(to right, #cb2d3e 0%, #ef473a 51%, #cb2d3e 100%);
        margin: 10px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .test4:hover {
        background-position: right center;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
    }
</style>
