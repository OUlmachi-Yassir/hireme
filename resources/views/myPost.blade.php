<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

   
    
    <button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    Open Form
</button>

<!-- Pop-up pour le formulaire -->
<div id="myModal" class="modal hidden fixed w-full h-full top-0 left-0 flex items-center justify-center z-50">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M18 1.42L16.56 0 9 7.56 1.44 0 0 1.41 7.56 9 0 16.56 1.44 18 9 10.44 16.56 18l1.44-1.41L10.44 9 18 1.42z"/>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>
        <!-- Contenu du formulaire -->
        <div class="modal-content py-4 text-left px-6">
        <form action="{{ route('jobe.store') }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="titre">Title:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titre" name="titre" type="text" placeholder="Title">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="discreption">Description:</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="discreption" name="discreption" rows="5" placeholder="Description"></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="competence">Skills/Competencies:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="competence" name="competence" type="text" placeholder="Skills/Competencies">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="type">Type:</label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type" name="type">
            <option value="à distance">Remote</option>
            <option value="hybride">Hybrid</option>
            <option value="à temps plein">Full-time</option>
        </select>
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            {{ __('ADD') }}
        </button>
    </div>
</form>

            </form>
        </div>
    </div>
</div>

  <br><br>

<div class="flex flex-wrap justify ml-20 gap-10 items-center">
    @foreach ($jobes as $jobe)
      <div class="group flex flex-col justify-start items-start gap- w-96 h-70 duration-500 relative rounded-lg p-4 bg-gray-400 hover:-translate-y-2 hover:shadow-xl shadow-gray-800">
        <div alt="image here"
          class="absolute duration-700 shadow-md group-hover:-translate-y-4 group-hover:-translate-x-4  -right-10 w-1/2 h-1/2 rounded-lg bg-gray-800">
          <img src="{{asset('images/' . $jobe->enterprise->logo)}}" class="">  
      </div>

        <div class="">
          <h2 class="text-2xl font-bold mb-2 text-gray-100">Dark Card</h2>
          <div class="font-semibold text-lg">{{ $jobe->titre }}</div>
                  <div class="mt-2 text-gray-600">{{ $jobe->discreption }}</div>
                  <div class="mt-2 text-gray-600">Compétence: {{ $jobe->competence }}</div>
                  <div class="mt-2 text-gray-600">Type: {{ $jobe->type }}</div>
                  
                  <div class="mt-2 text-gray-600">Company: {{ $jobe->enterprise->industrie }}</div>
        </div>
        <button
          class="hover:bg-gray-700 bg-gray-800 text-gray-100 mt-6 rounded p-2 px-6"
        >
          Explore
        </button>
      </div>
      <br>
    @endforeach
</div>




    
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupère les éléments du DOM
        const modal = document.getElementById("myModal");
        const btn = document.getElementById("openModalButton");
        const span = document.getElementsByClassName("modal-close")[0];

        // Ouvre la pop-up lorsque le bouton est cliqué
        btn.onclick = function() {
            modal.classList.remove("hidden");
        }

        // Ferme la pop-up lorsque l'utilisateur clique sur le bouton de fermeture ou à l'extérieur de la pop-up
        span.onclick = function() {
            modal.classList.add("hidden");
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
        }

        // Ferme la pop-up lorsque l'utilisateur appuie sur la touche "Escape"
        document.addEventListener("keydown", function(event) {
            if (event.key === "Escape" || event.key === "Esc") {
                modal.classList.add("hidden");
            }
        });
    });
</script>
    
