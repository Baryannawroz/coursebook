<x-app-layout>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-4">edit content</h1>

            <form action="{{ route('content.update',  $subjectContent->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Content:</label>
                    <input type="text" name="material_covered" id="name" value="{{ $subjectContent->material_covered }}"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('material_covered')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-4">
                    <label for="faculty_id" class="block text-gray-700 font-medium mb-2">Subject:</label>
                    <select name="subject_id" id="faculty_id"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">

                        @foreach($subjects as $subject)
                        <option {!! $subjectContent->id == $subject->id ? 'selected' : '' !!} value="{{ $subject->id
                            }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">update
                    Content</button>
            </form>
        </div>
    </div>
</x-app-layout>