<?php
require_once("showMovie_fonction.php");
require_once("showMovie2_fonction.php");
function conn()
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collection2 = $db->movies;
	return ($collection2);
}
function movies_storing()
{
	$i = 0;
	$collection2 = conn();
	$response = $collection2->drop();
	$mov = parse();
	if ($mov != 0)
		foreach($mov as $doc)
 		{
			if ($doc[1][0] == 't' && $doc[1][1] == 't')
		   	{
				$tab['imdb_code'] = $doc[1];
				$tab['title'] = $doc[5];
				$tab['year'] = intval($doc[11]);
				$tab['genres'] = explode(", ", $doc[12]);
				$tab['directors'] = explode(",", $doc[7]);
				$tab['rate'] = floatval($doc[9]);
				$tab['link'] = $doc[15];
				$tab['stock'] = rand(0,5);
				$tab['renting_students'] = array();
				$collection2->insert($tab);
				$i++;
			}
			$tab = [];
		}
	echo $i . " movies successfully stored ! \n";
}

function parse()
{
	$row = 1;
	$array = null;
	if (file_exists("movies.csv") && ($handle = fopen("movies.csv", "r")) != FALSE)
	{
		while (($data = fgetcsv($handle, 1064, ",")) !== FALSE)
		{
			$array[] = $data;
		}
		fclose($handle);
		return($array);
	}
	return(0);
}

function show_movies($arg = NULL , $arg2 = NULL)
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collection2 = $db->movies;
	if (!(isset($arg)))
		smwa();
	else if ($arg == "desc")
	   	smdes();
	else if ($arg == "genre")
	   	smg($arg2);
	else if ($arg == "year")
	   	smy($arg2);
	else if ($arg == "rate")
	   	smr($arg2);
	else
		echo "Enter a valid argument or no argument.\n";
}			  
?>