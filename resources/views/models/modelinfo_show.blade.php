<x-app-layout>

    <div class="flex flex-wrap mt-6">

        <div class="w-full md:w-1/3 px-2 my-4">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Subject</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $model->subject->name }}</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-2 ">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Departement & stage</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{  $model->stage->department->name ."/".$model->stage->name}}</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-2 my-4">

            <div
                class="   p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lecturer</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{  $model->module_leader}}</p>
            </div>
        </div>
    </div>
</x-app-layout>
