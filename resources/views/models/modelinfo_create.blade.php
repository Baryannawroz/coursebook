<x-app-layout>
    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full">
            <h1 class="text-2xl font-bold mb-14 text-center text-blue-600">Create New Module Information</h1>

            <form action="{!! route('model.store') !!}" method="POST" class="flex flex-wrap">
                @csrf


<div class="mb-4 md:basis-1/2 basis-full px-2">
        <label for="module_title" class="block text-blue-600 font-medium mb-2">Module Title:</label>
        <input type="text" name="module_title" id="module_title"
            class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500" required>
        @error('module_title')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

                <!-- Select for Users -->
                <div class="mb-4 md:basis-1/3 px-2">
                    <label for="user_id" class="block text-blue-600 font-medium mb-2">User:</label>
                    <select name="user_id" id="user_id"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Select for Subjects -->
                <div class="mb-4 md:basis-1/3 px-2">
                    <label for="subject_id" class="block text-blue-600 font-medium mb-2">Subject:</label>
                    <select name="subject_id" id="subject_id"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Select for Stages -->
                <div class="mb-4 md:basis-1/3 px-2">
                    <label for="stage_id" class="block text-blue-600 font-medium mb-2">Stage:</label>
                    <select name="stage_id" id="stage_id"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500">
                        @foreach($stages as $stage)
                        <option value="{{ $stage->id }}">{{ $stage->department->name ." " . $stage->name }}</option>
                        @endforeach
                    </select>
                    @error('stage_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Add submit button -->
                <div class="mb-4 w-full px-2 flex justify-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Create
                        Module Information</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
