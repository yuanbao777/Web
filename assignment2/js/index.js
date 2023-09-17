function searchAndFilterFunction() {
  var input, filter, regionFilter, articles, item, p, i, txtValue, continentSpan;

  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  regionFilter = document.getElementById("regionFilter").value;
  articles = document.getElementById("articles");
  item = articles.getElementsByClassName("articles__item");

  for (i = 0; i < item.length; i++) {
      p = item[i].getElementsByClassName("articles__info")[0].getElementsByTagName("p")[0];
      continentSpan = item[i].getElementsByClassName("articles__info")[0].getElementsByClassName("continent")[0].innerText.toLowerCase().replace(" ", "-");
      txtValue = p.textContent || p.innerText;

      
      if (regionFilter !== "" && continentSpan !== regionFilter) {
          item[i].style.display = "none";
          continue; 
      }

      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          item[i].style.display = ""; 
      } else {
          item[i].style.display = "none";
      }
  }
}
