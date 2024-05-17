<x-app-layout>


    <div>

        <div class="flex flex-wrap mt-6 pointer">

            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 first-section rounded-lg shadow transition duration-300 ease-in-out text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Subject</h5>
                    {{-- <p class="font-normal text-white">{{ $model->subject->name }}</p> --}}
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow secound-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Department & stage
                    </h5>
                    {{-- <p class="font-normal text-white">{{ $model->stage->department->name ."/".$model->stage->name}}</p> --}}
                </div>
            </div>
            <div class="w-full md:w-1/3 px-2 my-4">

                <div class="p-6 rounded-lg shadow third-section transition duration-300 ease-in-out pointer text-center">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Lecturer</h5>
                    {{-- <p class="font-normal text-white">{{ $model->module_leader}}</p> --}}
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
