<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rich Text Editor Example</title>
        <!-- Include Quill.js -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <!-- Include Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-100">
        <div class="mx-auto p-8">
            
            <form method="POST" action="{{ route('model.updateaims', $model->id) }}"
                class="mx-auto bg-white shadow-md rounded px-8 py-6">
                @csrf
                <!-- Replace route('model.updaterelation') with your form processing route -->

                <div class="mb-4">
                    <label for="module_aims" class="block text-gray-700 text-sm font-bold mb-2">Module Aims</label>
                    <div id="module_aims_editor" style="height: 300px;">
                        {!! $model->module_aims !!}
                    </div>
                    <input type="hidden" id="module_aims" name="module_aims" value="">
                </div>

                <div class="mb-4">
                    <label for="module_learning_outcomes" class="block text-gray-700 text-sm font-bold mb-2">Module
                        Learning Outcomes</label>
                    <div id="module_learning_outcomes_editor" style="height: 300px;">
                        {!!$model->module_learning_outcomes !!}
                    </div>
                    <input type="hidden" id="module_learning_outcomes" name="module_learning_outcomes" value="">
                </div>
                <div class="mb-4">
                    <label for="indicative_contents" class="block text-gray-700 text-sm font-bold mb-2">Indicative
                        Contents</label>
                    <div id="indicative_contents_editor" style="height: 300px;">
                        {!! $model->indicative_contents !!}
                    </div>
                    <input type="hidden" id="indicative_contents" name="indicative_contents" value="">
                </div>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    onclick="setEditorContent()">
                    Submit
                </button>
            </form>
        </div>

        <!-- Include the Quill.js library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            // Initialize Quill for module aims editor
            var moduleAimsEditor = new Quill('#module_aims_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Module Aims here...'
            });

            // Initialize Quill for module learning outcomes editor
            var moduleLearningOutcomesEditor = new Quill('#module_learning_outcomes_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Module Learning Outcomes here...'
            });

            // Initialize Quill for indicative contents editor
            var indicativeContentsEditor = new Quill('#indicative_contents_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Indicative Contents here...'
            });

            // Set the content of the editors to the hidden inputs before form submission
            function setEditorContent() {
                // Get the HTML content of the editors
                var moduleAimsContent = document.querySelector('#module_aims_editor .ql-editor').innerHTML;
                var moduleLearningOutcomesContent = document.querySelector('#module_learning_outcomes_editor .ql-editor').innerHTML;
                var indicativeContentsContent = document.querySelector('#indicative_contents_editor .ql-editor').innerHTML;

                // Set the content as the value of hidden input fields in the form
                document.querySelector('#module_aims').value = moduleAimsContent;
                document.querySelector('#module_learning_outcomes').value = moduleLearningOutcomesContent;
                document.querySelector('#indicative_contents').value = indicativeContentsContent;
            }
        </script>
    </body>

    </html>

</x-app-layout>
