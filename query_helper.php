<?php
function run_query($query, $isUpdate)
{
    $conn = new mysqli('localhost', 'root', '', 'gallery');
    //debug_to_console($query);
    if ($conn->connect_error) 
        die('Unable to connect to the database : ' . $conn->connect_error);
    else 
    {
        $result = $conn->query($query);
        if ($isUpdate == false) 
        {
            $txt = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
            echo $txt;
        } else 
        {
            echo "{}";
        }
        $conn->close();
    }
}
switch ($_POST["query"]) 
{
    case 'showall':
        run_query("select * from art order by artname,artist", false);
    break;
	
    case 'order' :
        run_query("select o.oid,c.cname,a.artname,a.artist,a.style,o.date,o.amount from orders o,customer c,art a where o.cid=c.cid and o.artid=a.artid and o.date between '".$_POST["from"]."' and '".$_POST["to"]."' order by a.style ",false);
        //
    break;
    
    case 'search_artist':
        run_query("select name from artist where name='".$_POST["name"]."'", false);
    break;

    case 'search_art':
        run_query("select artname from art where artname='".$_POST["name"]."'", false);
    break;
    
    case 'insert_artist':
        run_query("insert into artist values('".$_POST["name"]."', '".$_POST["place"]."', ".$_POST["age"].")", true);
    break;

    case 'insert_art':
        run_query("insert into art (artname, artdate, style, artist) values('".$_POST["name"]."', '".$_POST["adate"]."', '".$_POST["style"]."', '".$_POST["artist"]."')", true);
    break;

    case 'get_artist_names':
        run_query("select name from artist", false);
    break;
}
?>

