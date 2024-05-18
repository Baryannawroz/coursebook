<x-app-layout>
    <div class="flex items-center justify-center h-screen ">
        <div class="  bg-blue-600 p-6 rounded-lg shadow-md w-3/4 h-3/4 flex justify-center items-center">
            <form action="{{ route('user.update', $user->id) }}" method="POST"
                class="mt-8 space-y-6 w-3/4 flex-col justify-center items-center">
                @csrf
                <h2 class="text-center text-4xl font-semibold mb-6 text-white">Change Role</h2>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" readonly
                        class="appearance-none block w-full px-3 py-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium text-white">Select Role:</label>
                    <select name="role_id"
                        class="w-full px-3 py-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                        <option value="0" {{ $user->role_id == 0 ? 'selected' : '' }}>Lecturer</option>
                        <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Presidential</option>
                        <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Admin</option>
                    </select>

                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="mt-4 font-bold text-xl bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100 focus:outline-none focus:bg-blue-600">Change
                        Role</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>