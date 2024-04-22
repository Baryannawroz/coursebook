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
        .modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 200ms ease-in-out;
    border-radius: 10px;
    z-index: 10;
    background-color: rgba(56, 122, 223, 0.9); /* Adjust opacity as needed */
    width: 500px;
    max-width: 80%;
    backdrop-filter: blur(10px); /* Adjust blur radius as needed */
}

.modal.active {
    transform: translate(-50%, -50%) scale(1);
}

#overlay {
    position: fixed;
    opacity: 0;
    transition: 200ms ease-in-out;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.2);
    pointer-events: none;
    backdrop-filter: blur(2px); /* Adjust blur radius as needed */
}

#overlay.active {
    opacity: 1;
    pointer-events: all;
}

        .modal-header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid white;
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

        .modal-body {
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

<body class="">
    <button data-modal-target="#modal">Add</button>
    <div class="modal space-y-4" id="modal">
        <div class="modal-header">
            <div class="title">Example Modal</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body  ">
            <form method="POST" action="{{ route('plandelivery.store') }}" class="max-w-sm mx-auto">
                @csrf
                <!-- CSRF protection -->
                <label for="countries" class="block mb-4 text-sm font-medium text-white text-center">Select
                    Content to add</label>
                <select id="countries" name="material_covered_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Content</option>
                    @foreach ($contents as $content)
                    <option value="{{ $content->id }}">{{ $content->material_covered }}</option>

                    @endforeach
                </select>

                <input type="number" name="modelinfo_id" value="{{ $modelid }}"  class="hidden">
                <div class="flex justify-center items-center">

                  <button type="submit"
                  class="mt-4  bg-white text-blue-600 hover:bg-blue-600 hover:text-white font-bold text-center py-2 px-6 rounded">
                  Submit
                </button>
              </div>
            </form>

        </div>
    </div>
    <div id="overlay"></div>


    <script>
        const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}
    </script>


</body>

</html>
