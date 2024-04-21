<x-app-layout>
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="bg-blue-600 p-6 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-4 text-center text-white">update New Subject</h1>

            <form action="{!! route('subject.update',$subject->id) !!}" method="POST" class="mt-8 space-y-6">
                @csrf

                <div class="mb-4">
                    <input type="text" name="name" id="name" value="{{ $subject->name }}" placeholder="please enter name"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="text" name="code" id="code" value="{{ $subject->code }}" placeholder="please enter code"
                        class="border border-gray-300 rounded-lg py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                        required>
                    @error('code')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>



                <div class="flex justify-center">

<button type="submit"
    class="text-white border border-white  hover:bg-white hover:text-blue-600 font-bold py-2 px-8 rounded-lg focus:outline-none focus:shadow-outline">Update Subject</button>
  </div>
            </form>
        </div>
    </div>
</x-app-layout>