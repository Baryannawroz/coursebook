<x-app-layout>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-4">Create New Apartment</h1>

            <form action="{!! route('department.update',$department->id) !!}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $department->name }}"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="code" class="block text-gray-700 font-medium mb-2">code:</label>
                    <input type="text" name="code" id="code" value="{{ $department->code }}"
                        class=" border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none    focus:border-blue-500"
                        required>
                    @error('code')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="faculty_id" class="block text-gray-700 font-medium mb-2">faculty:</label>
                    <select name="faculty_id" id="faculty_id"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">

                        @foreach($faculties as $faculty)
                        <option {!! $faculty->id == $department->faculty_id ? 'selected' : '' !!} value="{{ $faculty->id
                            }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                    @error('faculty_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">update
                    Department</button>
            </form>
        </div>
    </div>
</x-app-layout>
