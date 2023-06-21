let table = document.getElementById("result");
let search = document.getElementById("search-table");
let notFound = document.getElementById("notFound");
search.addEventListener("keyup", function() {
   let filter = search.value.toLowerCase();
   let found = false;
   for (let i = 0; i < table.rows.length; i++) {
      let row = table.rows[i];
      let cells = row.cells;
      let rowFound = false;
      for (j = 0; j < cells.length; j++) {
         let cell = cells[j];
         if (cell.innerHTML.toLowerCase().indexOf(filter) > -1) {
         rowFound = true;
         break;
         }
      }
      if (rowFound) {
         row.style.display = "";
         found = true;
      } else {
         row.style.display = "none";
      }
   }
   if (!found) {
      notFound.classList.remove('hidden')
   } else {
      notFound.classList.add('hidden');
   }
   // if (!found) {
   //   notFound.style.display = "";
   // } else {
   //   notFound.style.display = "none";
   // }
});