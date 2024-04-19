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
        <div class=" mx-auto p-8">
            <form method="POST" action="{{ route('submit') }}"
                class=" mx-auto bg-white shadow-md rounded px-8 py-6">
                @csrf
                <!-- Replace route('submit') with your form processing route -->
                <div class="mb-4">
                    <label for="prerequisites" class="block text-gray-700 text-sm font-bold mb-2">Prerequisites</label>
                    <div id="prerequisites-editor" style="height: 300px;"></div>
                    <input type="hidden" id="prerequisites-content" name="pre_requisites">
                </div>
                <div class="mb-4">
                    <label for="post-requisites"
                        class="block text-gray-700 text-sm font-bold mb-2">Post-Requisites</label>
                    <div id="post-requisites-editor" style="height: 300px;"></div>
                    <input type="hidden" id="post-requisites-content" name="co-requisites">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </form>
        </div>

        <!-- Include the Quill.js library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            // Initialize Quill for prerequisites editor
            var prerequisitesEditor = new Quill('#prerequisites-editor', {
                theme: 'snow' // Use the snow theme for a clean interface
            });

            // Initialize Quill for post-requisites editor
            var postRequisitesEditor = new Quill('#post-requisites-editor', {
                theme: 'snow' // Use the snow theme for a clean interface
            });

            // Submit form content when the form is submitted
            var form = document.querySelector('form');
            form.onsubmit = function() {
                // Get the HTML content of the editors
                var prerequisitesContent = document.querySelector('#prerequisites-editor .ql-editor').innerHTML;
                var postRequisitesContent = document.querySelector('#post-requisites-editor .ql-editor').innerHTML;
                // Set the content as the value of hidden input fields in the form
                document.querySelector('#prerequisites-content').value = prerequisitesContent;
                document.querySelector('#post-requisites-content').value = postRequisitesContent;
            };
        </script>
    </body>

    </html>

</x-app-layout>

