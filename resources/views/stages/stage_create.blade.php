<x-app-layout>
    <div class="flex items-center justify-center h-screen ">
        <div class="bg-blue-600 p-8 rounded-lg w-full max-w-md    ">
            <h1 class="text-2xl font-bold mb-4 text-center text-white">Create New stage</h1>
            <h6 class="text-center w-full text-white">Please Fill information below</h6>

            <form action="{!! route('stage.store') !!}" method="POST" class="mt-8 space-y-6">
                @csrf

                <div class="mb-4 flex items-center justify-center">
                    <input type="text" name="name" id="name" placeholder="please enter name"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 flex items-center justify-center">
                    <input type="text" name="code" id="code" placeholder="please enter code"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('code')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 flex items-center justify-center">
                    <select name="department_id" id="department_id"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">

                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">

                  <button type="submit"
                      class="text-white border border-white  hover:bg-white hover:text-blue-600 font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline">Create
                      stage</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
