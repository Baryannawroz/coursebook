<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rich Text Editor</title>
    <!-- Include Quill.js from CDN -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>

    <form method="POST" action="/submit">
        @csrf
        <!-- Include Quill editor container -->
        <div id="editor" style="height: 300px;"></div>
        <button type="submit">Submit</button>
    </form>
    <!-- Include Quill.js script -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
        theme: 'snow'
    });
    </script>

</body>

</html>
