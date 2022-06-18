<!DOCTYPE html>
    <h1 align="center"><font size="26" face="Brush Script MT"><big>GALLERIOSA</big></font></h1>
    <hr><hr>
<html>
    <style>
        .highlight {
            background-color: #000000;
            color: #ffffff;
        }
        table 
        {
            border-collapse: collapse;
        }
		
        th, td
        {
            padding: 10px;
            border: none;
        }
		tr:nth-child(even) 
		{
			background-color: #f0f0f0;
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
        <b>Show order details between dates : </b><br><br>
        <b>From : </b><input type="date" id="from"><br><br>
        <b>To : </b><input type="date" id="to">
        
        <input type = "button" name="input"  value="Submit" onclick="display()">
        <input type = "button" name="graph"  value="Show result in Graph" onclick="bar_display()">
        <br> <br>
        <table id="populate" style="width : 50%">
            <thead>
			<tr>
                <th>Order</th>
                <th>Customer</th>
                <th>Art</th>
                <th>Artist</th>
                <th>Style</th>
				<th>Date</th>
				<th>Amount Total</th>
            </tr>
			</thead>
			<tbody>
			</tbody>
        </table>
    
        <p id="demo"></p> 

        <div id="hidden_form_container" style="display:none;"></div>
        
    <script>
        function post_data_parse(file, data1, doSomething)
        {
            var http=new XMLHttpRequest();
            var url=file;
            var params=data1;
            http.open('POST',url,true);
            http.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            
            http.onreadystatechange = function () {
                if (http.readyState==4 && http.status==200)
                {
                    console.log(http.responseText);
                    doSomething(JSON.parse(http.responseText));
                }
                    
            }
            console.log(params);
            http.send(params);
        }

        function post_data(file, data) 
        {
            var http = new XMLHttpRequest();
            var url = file;
            var params = data;
            http.open('POST', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.send(params);
            window.open(url); 
        }

        function display()
        {
            var fromDate = encodeURIComponent(document.getElementById("from").value);
            var toDate = encodeURIComponent(document.getElementById("to").value);
            var result = post_data_parse("query_helper.php","query=order&from="+fromDate+"&to="+toDate,initializeTable);
        }

        function bar_display()
        {
            var fromDate = encodeURIComponent(document.getElementById("from").value);
            var toDate = encodeURIComponent(document.getElementById("to").value);
            var theForm, newInput1, newInput2;
            // Start by creating a <form>
            theForm = document.createElement('form');
            theForm.action = 'bargraph.php';
            theForm.method = 'post';
            // Next create the <input>s in the form and give them names and values
            newInput1 = document.createElement('input');
            newInput1.type = 'hidden';
            newInput1.name = 'from';
            newInput1.value = fromDate;
            newInput2 = document.createElement('input');
            newInput2.type = 'hidden';
            newInput2.name = 'to';
            newInput2.value = toDate;
            // Now put everything together...
            theForm.appendChild(newInput1);
            theForm.appendChild(newInput2);
            // ...and it to the DOM...
            document.getElementById('hidden_form_container').appendChild(theForm);
            // ...and submit it
            theForm.submit();
        }

        function initializeTable(x) 
        {
            //console.log(x);
            var tbl = document.getElementById("populate");
			var old_tbody = tbl.children[1];
			var new_tbody = document.createElement('tbody');
            for(var i = 0; i < x.length; i++) 
            {
                var r = x[i];
				//console.log(r);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                var cell5 = document.createElement("td");
				var cell6 = document.createElement("td");
				var cell7 = document.createElement("td");
                var textnode1 = document.createTextNode(r.oid);
                var textnode2 = document.createTextNode(r.cname);
                var textnode3 = document.createTextNode(r.artname);
                var textnode4 = document.createTextNode(r.artist);
                var textnode5 = document.createTextNode(r.style);
				var textnode6 = document.createTextNode(r.date);
				var textnode7 = document.createTextNode(r.amount);
                cell1.appendChild(textnode1);                
                cell2.appendChild(textnode2);                
                cell3.appendChild(textnode3);                
                cell4.appendChild(textnode4);                
                cell5.appendChild(textnode5);                
				cell6.appendChild(textnode6);
				cell7.appendChild(textnode7);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.appendChild(cell5);
				row.appendChild(cell6);
				row.appendChild(cell7);
                row.style.display = "";
                new_tbody.appendChild(row);
            }
			old_tbody.parentNode.replaceChild(new_tbody,old_tbody);
        }
    </script>
    </body>
</html>