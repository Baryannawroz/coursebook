<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Update Module Evaluations</h1>
        <form action="{{ route('model.updateevalution', ['modelinfo' => $model->id]) }}" method="post">
            @csrf
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border">Evaluation</th>
                        <th class="py-2 px-4 border">Number/Time</th>
                        <th class="py-2 px-4 border">Weight (Marks)</th>
                        <th class="py-2 px-4 border">Week Due</th>
                        <th class="py-2 px-4 border">Relevant Learning Outcome</th>
                        <th class="py-2 px-4 border">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach($moduleEvaluations as $moduleEvaluation)
                    <tr class="border">
                        <td class="py-2 px-4 border"><input type="text" name="evaluation[]"
                                value="{{ $moduleEvaluation->evaluation }}"
                                class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                        <td class="py-2 px-4 border"><input type="text" name="number_time[]"
                                value="{{ $moduleEvaluation->number_time }}"
                                class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                        <td class="py-2 px-4 border"><input type="text" name="weight_mark[]"
                                value="{{ $moduleEvaluation->weight_mark }}"
                                class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                        <td class="py-2 px-4 border"><input type="text" name="week_due[]"
                                value="{{ $moduleEvaluation->week_due }}"
                                class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                        <td class="py-2 px-4 border"><input type="text" name="relevant_learning_outcome[]"
                                value="{{ $moduleEvaluation->relevant_learning_outcome }}"
                                class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                        <td class="py-2 px-4 border">
                            <button type="button"
                                class="btn-delete bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button"
                class="btn-add bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Add
                Row</button>
            <button type="submit"
                class="btn-update bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-4">Update</button>
        </form>
    </div>

    <script>
        document.querySelector('.btn-add').addEventListener('click', function() {
            var tbody = document.getElementById('tbody');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="py-2 px-4 border"><input type="text" name="evaluation[]" class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                <td class="py-2 px-4 border"><input type="text" name="number_time[]" class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                <td class="py-2 px-4 border"><input type="text" name="weight_mark[]" class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                <td class="py-2 px-4 border"><input type="text" name="week_due[]" class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                <td class="py-2 px-4 border"><input type="text" name="relevant_learning_outcome[]" class="w-full border border-gray-300 rounded-md py-1 px-2"></td>
                <td class="py-2 px-4 border">
                    <button type="button" class="btn-delete bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                </td>
            `;
            tbody.appendChild(newRow);
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-delete')) {
                event.target.closest('tr').remove();
            }
        });
    </script>
</x-app-layout>
