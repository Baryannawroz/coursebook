<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-center text-2xl font-semibold mb-6">Change Role</h2>
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" readonly
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Select Role:</label>
                <select name="role_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                    <option value="0">Lecturer</option>
                    <option value="1">Sarokayati</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <button type="submit"
                class="w-full mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Change
                Role</button>
        </form>
    </div>
</x-app-layout>