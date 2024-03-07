var timeout;

async function liveSearch() {
  var input = document.getElementById("searchInput").value;
  var resultsDiv = document.getElementById("searchResults");

  // Jeśli pole wyszukiwania jest puste, pobierz wszystkie wartości
  if (input.length === 0) {
    clearTimeout(timeout);

    timeout = setTimeout(async function () {
      try {
        var response = await fetch("../app/classes/LiveSearch.class.php");
        var data = await response.text();
        resultsDiv.innerHTML = data;
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    }, 300);
  } else {
    // Jeśli pole wyszukiwania nie jest puste, wykonaj standardowe wyszukiwanie
    if (input.length >= 2) {
      clearTimeout(timeout);

      timeout = setTimeout(async function () {
        try {
          var sanitizedInput = encodeURIComponent(input);
          var response = await fetch(
            "../app/classes/LiveSearch.class.php?q=" + sanitizedInput
          );
          var data = await response.text();
          resultsDiv.innerHTML = data;
        } catch (error) {
          console.error("Error fetching data:", error);
        }
      }, 50);
    }
  }
}

liveSearch();
