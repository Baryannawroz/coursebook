<x-app-layout>
    <div class="flex items-center justify-center  bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-md w-full ">
            <h1 class="text-2xl font-bold mb-14 text-center text-blue-600 ">Create New Module Information</h1>

            <form action="{!! route('model.store') !!}" method="POST" class="flex flex-wrap">
                @csrf

                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_title" class="block text-blue-600 font-medium mb-2">Module Title:</label>
                    <input type="text" name="module_title" id="module_title"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_type" class="block text-blue-600 font-medium mb-2">Module Type:</label>
                    <input type="text" name="module_type" id="module_type"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_type')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_code" class="block text-blue-600 font-medium mb-2">Module Code:</label>
                    <input type="text" name="module_code" id="module_code"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_code')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="credits" class="block text-blue-600 font-medium mb-2">Credit:</label>
                    <input type="number" name="credits" id="credits"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('credits')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_level" class="block text-blue-600 font-medium mb-2">module level:</label>
                    <input type="text" name="module_level" id="module_level"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_level')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="semester_of_delivery" class="block text-blue-600 font-medium mb-2">Semester of
                        Delivery:</label>
                    <input type="number" max="12" min="1" name="semester_of_delivery" id="semester_of_delivery"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('semester_of_delivery')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_leader" class="block text-blue-600 font-medium mb-2">Module Leader Name:</label>
                    <input type="text" name="module_leader" id="module_leader"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_leader')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_leader_email" class="block text-blue-600 font-medium mb-2">Module Leader
                        emial:</label>
                    <input type="email" name="module_leader_email" id="module_leader_email"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_leader_email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_leader_academic_title" class="block text-blue-600 font-medium mb-2">Academic
                        Title:</label>
                    <input type="text" name="module_leader_academic_title" id="module_leader_academic_title"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_leader_academic_title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_leader_qualification" class="block text-blue-600 font-medium mb-2">Module
                        Qualification:</label>
                    <input type="text" name="module_leader_qualification" id="module_leader_qualification"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_leader_qualification')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_tutor_name" class="block text-blue-600 font-medium mb-2">Module Tutor
                        name:</label>
                    <input type="text" name="module_tutor_name" id="module_tutor_name"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_tutor_name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="module_tutor_email" class="block text-blue-600 font-medium mb-2">Module Tutor
                        emial:</label>
                    <input type="email" name="module_tutor_email" id="module_tutor_email"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('module_tutor_email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="peer_reviewer_name" class="block text-blue-600 font-medium mb-2">Module Reviewer
                        Name:</label>
                    <input type="text" name="peer_reviewer_name" id="peer_reviewer_name"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('peer_reviewer_name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="peer_reviewer_email" class="block text-blue-600 font-medium mb-2">Module Reviewer
                        emial:</label>
                    <input type="email" name="peer_reviewer_email" id="peer_reviewer_email"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('peer_reviewer_email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="approval_date" class="block text-blue-600 font-medium mb-2">Approval date:</label>
                    <input type="date" name="approval_date" id="approval_date"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('approval_date')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:basis-1/2 basis-full px-2">
                    <label for="version_number" class="block text-blue-600 font-medium mb-2">Version Number:</label>
                    <input type="number" min="1" name="version_number" id="version_number"
                        class="border border-blue-200 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('version_number')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4 md:basis-1/2 basis-full px-2">
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

                <!-- Example for Select2 with stages -->
                <div class="mb-4 md:basis-1/2 basis-full px-2">
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

                <!-- Repeat this pattern for the remaining attributes -->

                <!-- Add submit button -->
                <div class="mb-4 w-full px-2 flex justify-center">
                  
                <button type="submit mx-auto basis-1/4"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Create
                    Module Information</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
