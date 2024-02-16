<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <br><br>
<div class="relative rounded-lg w-1/3 overflow-hidden  before:absolute before:w-12 before:h-12 before:content[''] before:right-0 before:bg-violet-500 before:rounded-full before:blur-lg  after:absolute after:-z-10 after:w-20 after:h-20 after:content['']  after:bg-rose-300 after:right-12 after:top-3 after:rounded-full after:blur-lg flex justify-center m-auto">
 <input type="text" id="searchInput" placeholder="Search by title, competence, or type" class="relative bg-transparent ring-0 outline-none border border-neutral-500 text-white placeholder-white-700 text-sm rounded-lg focus:ring-violet-500 placeholder-opacity-60 focus:border-violet-500 block w-full p-2.5 checked:bg-emerald-500">
</div>
<br>
    <div id="searchResults"></div>
    <br><br>

    <div id="jobCardsContainer"  class="flex flex-wrap justify ml-20 gap-10 items-center">
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
    const searchInput = document.getElementById('searchInput');
    const jobCardsContainer = document.getElementById('jobCardsContainer');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;
        fetchSearchResults(query);
    });

    function fetchSearchResults(query) {
        fetch(`/search?q=${query}`)
            .then(response => response.json())
            .then(data => {
                displaySearchResults(data);
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    }

    function displaySearchResults(results) {
        const searchResultsDiv = document.getElementById('searchResults');
        searchResultsDiv.innerHTML = ''; // Clear previous results

        results.forEach(result => {
            const resultElement = document.createElement('div');
            resultElement.textContent = result.title; // Adjust based on your data structure
            searchResultsDiv.appendChild(resultElement);
        });

        // Show or hide job cards container based on search results
        if (results.length > 0) {
            jobCardsContainer.style.display = 'none';
        } else {
            jobCardsContainer.style.display = 'flex';
        }
    }
</script>

