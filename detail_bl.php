<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail_bl</title>

    <link rel="stylesheet" href="test.css">
</head>
<body>
    <?php require 'menu.php'?>
    
    <input type="text" id="searchInput" placeholder="Search by designation">
    <button onclick="valider()" class="valider">Valider Total</button>
    <a href="AjouterBonlivraison.php" class="AjouterBonlivraison">Ajouter Bonlivraison</a>
   
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>designation</th>
                <th>prix</th>
                <th>quantité</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan='4' class='total'>Total</td>
                <td class='overallTotal'>0.00</td>
            </tr>
        </tfoot>
    </table>

    <script>
        
        var individualTotals = [];

        
        function liveSearch() {
            
            var searchQuery = document.getElementById("searchInput").value;

            
            var xhr = new XMLHttpRequest();

           
            xhr.open("POST", "live_search.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                   
                    data.forEach(function(row) {
                        var existingRow = document.querySelector("tbody tr[data-id='" + row['id'] + "']");
                        if (existingRow) {
                            
                            existingRow.querySelector(".quantity").value = "";
                            existingRow.querySelector(".total").textContent = "";
                        } else {
                           
                            var newRow = document.createElement("tr");
                            newRow.setAttribute("data-id", row['id']);
                            newRow.innerHTML = "<td>" + row['id'] + "</td>" +
                                "<td>" + row['designation'] + "</td>" +
                                "<td class='price'>" + row['prix_ht'] + "</td>" +
                                "<td><input type='number' class='quantity'></td>" +
                                "<td class='total'></td>";
                            document.querySelector("tbody").appendChild(newRow);
                        }
                    });
                }
            };

          
            xhr.send("query=" + encodeURIComponent(searchQuery));
        }

       
        function updateTotal() {
          
            var quantity = parseFloat(this.value);

           
            var price = parseFloat(this.closest("tr").querySelector(".price").textContent);

           
            var total = isNaN(quantity) ? 0 : quantity * price;
            this.closest("tr").querySelector(".total").textContent = total.toFixed(2);

            
            var rowIndex = this.closest("tr").rowIndex;
            individualTotals[rowIndex] = total;

            
          
        }

        
        function recalculateOverallTotal() {
            var newOverallTotal = 0;

           
            for (var i = 0; i < individualTotals.length; i++) {
                var rowTotal = individualTotals[i];
                if (!isNaN(rowTotal)) {
                    newOverallTotal += rowTotal;
                }
            }

            document.querySelector(".overallTotal").textContent = newOverallTotal.toFixed(2);
        }

      
        function valider() {
            recalculateOverallTotal();
        }

       
        document.getElementById("searchInput").addEventListener("input", function(){
            liveSearch();
        });

       
        document.querySelector("tbody").addEventListener("input", function(event){
            if (event.target.tagName.toLowerCase() === "input" && event.target.type === "number") {
                updateTotal.call(event.target);
            }
        });
    </script>
    <script>
  document.getElementById("validerBtn").addEventListener("click", function() {
    validerAction();
  });

  
</body>
</html>
