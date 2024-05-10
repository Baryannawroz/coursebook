<x-app-layout>
    <div class="container">
        <h1>Update Module Evaluations</h1>
        <form action="{{ route('model.updateevalution', ['modelinfo' => $model->id]) }}" method="post">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Evaluation</th>
                        <th>Number/Time</th>
                        <th>Weight (Marks)</th>
                        <th>Week Due</th>
                        <th>Relevant Learning Outcome</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach($moduleEvaluations as $moduleEvaluation)
                    <tr>
                        <td><input type="text" name="evaluation[]" value="{{ $moduleEvaluation->evaluation }}"></td>
                        <td><input type="text" name="number_time[]" value="{{ $moduleEvaluation->number_time }}"></td>
                        <td><input type="text" name="weight_mark[]" value="{{ $moduleEvaluation->weight_mark }}"></td>
                        <td><input type="text" name="week_due[]" value="{{ $moduleEvaluation->week_due }}"></td>
                        <td><input type="text" name="relevant_learning_outcome[]"
                                value="{{ $moduleEvaluation->relevant_learning_outcome }}"></td>
                        <td><button type="button" class="btn btn-danger delete-row">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="add-row">Add Row</button>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            var tbody = document.getElementById('tbody');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" name="evaluation[]"></td>
                <td><input type="text" name="number_time[]"></td>
                <td><input type="text" name="weight_mark[]"></td>
                <td><input type="text" name="week_due[]"></td>
                <td><input type="text" name="relevant_learning_outcome[]"></td>
                <td><button type="button" class="btn btn-danger delete-row">Delete</button></td>
            `;
            tbody.appendChild(newRow);
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-row')) {
                event.target.closest('tr').remove();
            }
        });
    </script>
</x-app-layout>
