<?php
require_once("up_fonction.php");
function rent_movie($log , $movie)
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collec_movie = $db->movies;
	$collec_log = $db->students;
	$tab_log = array('login' => $log);
	$find_log = $collec_log->findOne($tab_log);
	$tab_movie = array('imdb_code' => $movie);
	$find_movie = $collec_movie->findOne($tab_movie);
	if ($find_movie && $find_log)
	{
		if ($find_movie['stock'] > 0)
		{
			up_rent($log , $find_log , $movie , $find_movie , $db);
		   	echo "Rented !\n";
		}
		else
			echo "Stock-out !\n";			
	}
	else
		echo "Enter a valid login and ID.\n";
}

function return_movie($log , $movie)
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collec_movie = $db->movies;
	$collec_log = $db->students;
	$tab_log = array('login' => $log);
	$find_log = $collec_log->findOne($tab_log);
	$tab_movie = array('imdb_code' => $movie);
	$find_movie = $collec_movie->findOne($tab_movie);
	if ($find_movie && $find_log)
	{
		if ($find_movie['renting_students'] && in_array($find_log['_id'] , $find_movie['renting_students']))
		{
			up_return($log , $find_log , $movie , $find_movie , $db);
		   	echo "Returned\n";
		}
		else
			echo "Error: You don't have this film.\n";
	}
	else
		echo "Error : Enter a valid login and ID.\n";
}
function supr_val($tab, $val)
{
	$i = 0;
	$j = 0;
	$tab_up = array();
	foreach ($tab as $key => $value)
	{
		if ($value != $val || $j == 1)
		{
			$tab_up[$i] = $value;
			$i++;
		}
		else
			$j = 1;
	}
	return($tab_up);
}
function show_rented_movies()
{
	$i = 0;
	$c = new MongoClient();
	$db = $c->db_etna;
	$collection2 = $db->movies;
	$cursor = $collection2->find();
	echo "Rented movie(s):\n";
	foreach($cursor as $key)
    {
		foreach($key as $doc => $value)
		{
		    if($doc == 'title')
			    $nom = $value;
			if ($doc == 'renting_students' && !(empty($value)))
			{
			    echo "$nom\n";
			    $i++;
			}
		}
	}
	echo "Number of rented movies :\n";
	echo "*" . $i . "*" . "\n";
}
?>