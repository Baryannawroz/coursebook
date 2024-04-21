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
            <form method="POST" action="{{ route('model.updateresources', $model->id) }}"
                class="mx-auto bg-white shadow-md rounded px-8 py-6">
                @csrf
                <!-- Replace route('model.updateresources') with your form processing route -->

                <div class="mb-4">
                    <label for="required_texts" class="block text-gray-700 text-sm font-bold mb-2">Required
                        Texts</label>
                    <div id="required_texts_editor" style="height: 300px;">
                        {!! $model->required_texts !!}
                    </div>
                    <input type="hidden" id="required_texts" name="required_texts" value="">
                </div>

                <div class="mb-4">
                    <label for="recommended_texts" class="block text-gray-700 text-sm font-bold mb-2">Recommended
                        Texts</label>
                    <div id="recommended_texts_editor" style="height: 300px;">
                        {!! $model->recommended_texts !!}
                    </div>
                    <input type="hidden" id="recommended_texts" name="recommended_texts" value="">
                </div>

                <div class="mb-4">
                    <label for="websites" class="block text-gray-700 text-sm font-bold mb-2">Websites</label>
                    <div id="websites_editor" style="height: 300px;">
                        {!! $model->websites !!}
                    </div>
                    <input type="hidden" id="websites" name="websites" value="">
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
            // Initialize Quill for required texts editor
            var requiredTextsEditor = new Quill('#required_texts_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Required Texts here...'
            });

            // Initialize Quill for recommended texts editor
            var recommendedTextsEditor = new Quill('#recommended_texts_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Recommended Texts here...'
            });

            // Initialize Quill for websites editor
            var websitesEditor = new Quill('#websites_editor', {
                theme: 'snow', // Use the snow theme for a clean interface
                placeholder: 'Write your Websites here...'
            });

            // Set the content of the editors to the hidden inputs before form submission
            function setEditorContent() {
                // Get the HTML content of the editors
                var requiredTextsContent = document.querySelector('#required_texts_editor .ql-editor').innerHTML;
                var recommendedTextsContent = document.querySelector('#recommended_texts_editor .ql-editor').innerHTML;
                var websitesContent = document.querySelector('#websites_editor .ql-editor').innerHTML;

                // Set the content as the value of hidden input fields in the form
                document.querySelector('#required_texts').value = requiredTextsContent;
                document.querySelector('#recommended_texts').value = recommendedTextsContent;
                document.querySelector('#websites').value = websitesContent;
            }
        </script>
    </body>

    </html>

</x-app-layout>
