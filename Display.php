<html>
    <h1 align="center"><font size="26" face="Brush Script MT"><big>GALLERIOSA</big></font></h1>
    <hr><hr>
    <style>
        .highlight {
            background-color: #000000;
            color: #ffffff;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            /*text-align: center; */
           /* /* border-bottom: 1px solid #ddd;  */
            padding: 10px;
            border: none;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        body 
		{
	  		background-image: url('bgimage.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;
	  		background-size: cover;
		}
    </style>
    <body>
        <h2><font size="15" face="Brush Script MT"><b><ins>SEARCH BY : </ins></b></font></h2>
        <input type="radio" name="choice" onclick="perform_search()" id="choice_name" checked><font size="12" face="Brush Script MT"> Art </font></input>
        <input type="radio" name="choice" onclick="perform_search()" id="choice_type"><font size="12" face="Brush Script MT"> Type </font></input>
        <input type="radio" name="choice" onclick="perform_search()" id="choice_artist"><font size="12" face="Brush Script MT"> Artist </font></input>
        <br> <br>
        <font size="15" face="Brush Script MT"><b><ins>Keyword </ins>: </b></font><input type="text" id="search_term" style="width: 50%" onkeyup="perform_search()"> </input>
        <br> <br>
        <table id="populate" style="width: 100%">
            <tr>
                <th style="width: 40%"> Art </th>
                <th style="width: 25%"> Type </th>
                <th style="width: 25%"> Artist </th>
                <th style="width: 10%"> Date </th>
            </tr>
        </table>
    </body>
    <script>

        function post_data(file, data, doSomething) {
            var http = new XMLHttpRequest();
            var url = file;
            var params = data;
            http.open('POST', url, true);
            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {
                    doSomething(JSON.parse(http.responseText));
                }
            }
            http.send(params);
        }

        function highlight_cell(cell, text) {
            var innerHTML = cell.innerHTML;
           // console.log(cell.innerHTML);
            var index = innerHTML.toLowerCase().indexOf(text);
            if (index >= 0) 
			{
                innerHTML = innerHTML.substring(0,index) + "<span class='highlight'>"
                            + innerHTML.substring(index,index+text.length) + "</span>"
                            + innerHTML.substring(index + text.length);
                cell.innerHTML = innerHTML;
            }
        }

        function reset_highlight_cell(cell) {
            cell.innerHTML = cell.getAttribute("data-original");
        }

        function populate_table_conditional(cellid, text) {
            var tbl = document.getElementById("populate");
            text = text.toLowerCase();
            for(var i = 0; i < tbl.rows[0].cells.length;i++) {
                var header = tbl.rows[0].cells[i];
                if(i == cellid) {
                    header.style.backgroundColor = "#000000";
                    header.style.color = "#ffffff";
                } else {
                    header.style.backgroundColor = "inherit";
                    header.style.color = "inherit";
                }
            }
            for(var i = 1; i < tbl.rows.length; i++) {
                var r = tbl.rows[i];
                var c = r.cells[cellid];
                if(c.getAttribute("data-original").toLowerCase().indexOf(text) >= 0) {
                    for(var j = 0;j < r.cells.length; j++)
                        reset_highlight_cell(r.cells[j]);
                    highlight_cell(c, text);
                    r.style.display = "";
                }
                else{
                    r.style.display = "none";
                }
            }
        }

        function perform_search() {
            var by_artist = document.getElementById("choice_artist").checked;
            var by_type = document.getElementById("choice_type").checked;
            var by_name = document.getElementById("choice_name").checked;
            var value = document.getElementById("search_term").value;
            if(by_artist) {
                populate_table_conditional(2, value);
            } else if(by_type) {
                populate_table_conditional(1, value);
            } else {
                populate_table_conditional(0, value);
            }
        }

        function initializeTable(x) {
            //console.log(x);
            var tbl = document.getElementById("populate");
            for(var i = 0; i < x.length; i++) {
                var r = x[i];
               // console.log(r);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                var textnode1 = document.createTextNode(r.artname);
                var textnode2 = document.createTextNode(r.style);
                var textnode3 = document.createTextNode(r.artist);
                var textnode4 = document.createTextNode(r.artdate);
                cell1.appendChild(textnode1);
                cell1.setAttribute("data-original", r.artname);
                cell2.appendChild(textnode2);
                cell2.setAttribute("data-original", r.style);
                cell3.appendChild(textnode3);
                cell3.setAttribute("data-original", r.artist);
                cell4.appendChild(textnode4);
                cell4.setAttribute("data-original", r.artdate);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.style.display = "";
                tbl.appendChild(row);
            }
        }

        function populate_all() {
            post_data("query_helper.php", "query=showall", initializeTable);
            perform_search();
        }

        window.onload = populate_all;
    </script>
</html>
