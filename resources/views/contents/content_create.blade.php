<x-app-layout>
    <div class="flex items-center justify-center h-screen ">
        <div class="bg-blue-600 p-6 rounded-lg shadow-md w-3/4 h-3/4 flex justify-center items-center">
          
          <form action="{!! route('content.store') !!}" method="POST" class="mt-8 space-y-6 w-3/4 flex-col justify-center items-center">
            @csrf
            <h1 class="text-5xl font-bold mb-4 text-center text-white">Create New content</h1>
            <h6 class="text-center text-xl w-full text-white">Please Fill information below</h6>

                <div class="mb-4">
                    <input type="text" name="material_covered" id="name" placeholder="please enter material covered"
                        class="border border-gray-300 rounded-lg py-4 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('material_covered')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-4">
                    <select name="subject_id" id="faculty_id" required placeholder="please select subject"
                        class="border border-gray-300 rounded-lg py-4 px-3 w-full focus:outline-none focus:border-blue-500">

                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">

<button type="submit"
    class="text-white border border-white  hover:bg-white hover:text-blue-600 font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline">Create
    Content</button>
  </div>
            </form>
        </div>
    </div>
</x-app-layout>
