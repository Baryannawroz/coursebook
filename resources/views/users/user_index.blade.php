<x-app-layout>
    <div class="overflow-hidden border-gray-200 sm:rounded-lg pt-11">
        <div class="overflow-x-auto">
            <input type="text" id="search" placeholder="Search..."
                class="px-4 py-2 border-2 border-gray-300 rounded-md w-full max-w-xs mb-4 ml-4">
            <table id="userTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Role
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $key => $user)
                    <tr class="{{ $key % 2 == 0 ? 'bg-blue-300' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="min-w-14 border text-center p-2 inline-flex justify-center text-xs relative right-9 leading-5 font-semibold rounded-md {{ $user->role == 0 ? 'bg-red-100 text-red-800' : ($user->role == 1 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') }}" style="width: 140px; height: 40px;">
    {{ $user->role == 0 ? 'Lecturer' : ($user->role == 1 ? 'Head Of Department' : 'Admin') }}
</span>

</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                           <a href="{{ route('user.edit', $user->id) }}" class="text-blue-500 hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none" height="24" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const searchInput = document.getElementById('search');
        const tableRows = document.querySelectorAll('#userTable tbody tr');

        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase().trim();

            tableRows.forEach(row => {
                const name = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
                const email = row.querySelector('td:nth-child(2)').innerText.toLowerCase();

                if (name.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
