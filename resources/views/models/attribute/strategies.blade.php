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
            <form method="POST" action="{{ route('model.updatestrategie', $model->id) }}"
                class="mx-auto bg-white shadow-md rounded px-8 py-6">
                @csrf
                <!-- Replace route('model.updaterelation') with your form processing route -->

                <div class="mb-4">
                    <label for="strategies" class="block text-gray-700 text-sm font-bold mb-2">Strategies</label>
                    <div id="strategies_editor" style="height: 300px;">
                        {!! $model->strategies !!}

                    </div>
                    <input type="hidden" id="strategies" name="strategies" value="">
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
            // Initialize Quill for strategies editor
            var strategiesEditor = new Quill('#strategies_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Strategies here...'
            });

            // Set the content of the editor to the hidden input before form submission
            function setEditorContent() {
                // Get the HTML content of the editor
                var strategiesContent = document.querySelector('#strategies_editor .ql-editor').innerHTML;

                // Set the content as the value of hidden input field in the form
                document.querySelector('#strategies').value = strategiesContent;
            }
        </script>
    </body>

    </html>

</x-app-layout>
