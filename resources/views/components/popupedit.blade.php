<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modal</title>
    <style>
        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        .modal2 {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 200ms ease-in-out;
            border: 1px solid black;
            border-radius: 10px;
            z-index: 10;
            background-color: white;
            width: 500px;
            max-width: 80%;
        }

        .modal2.active {
            transform: translate(-50%, -50%) scale(1);
        }

        .modal-header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
        }

        .modal-header .title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-header .close-button {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body2 {
            padding: 10px 15px;
        }

        #overlay {
            position: fixed;
            opacity: 0;
            transition: 200ms ease-in-out;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, .5);
            pointer-events: none;
        }

        #overlay.active {
            opacity: 1;
            pointer-events: all;
        }
    </style>
</head>

<body class="bg-red-600">
    <button data-modal-target="#modal2">Edit</button>
    <div class="modal2" id="modal2">
        <div class="modal-header">
            <div class="title">Example Modal</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body2">
            <form method="POST" action="{{ route('plandelivery.update', ['DeliveryPlan' => $contentt]) }}"
                class="max-w-sm mx-auto">
                @csrf
                <!-- CSRF protection -->
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                    Content to add</label>
                <select id="countries" name="material_covered_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a Content</option>
                    @foreach ($contents as $content)
                    <option value="{{ $content->id }}">{{ $content->material_covered }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="id" value="{{ $contentt}}">
                <button type="submit"
                    class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <div id="overlay"></div>

    <script>
        const openModalButtons = document.querySelectorAll('[data-modal-target]');
        const closeModalButtons = document.querySelectorAll('[data-close-button]');
        const overlay = document.getElementById('overlay');

        openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget);
                openModal(modal);
            });
        });

        overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal2.active');
            modals.forEach(modal => {
                closeModal(modal);
            });
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal2');
                closeModal(modal);
            });
        });

        function openModal(modal) {
            if (modal == null) return;
            modal.classList.add('active');
            overlay.classList.add('active');
        }

        function closeModal(modal) {
            if (modal == null) return;
            modal.classList.remove('active');
            overlay.classList.remove('active');
        }
    </script>
</body>

</html>
