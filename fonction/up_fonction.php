<?php
function up_rent($log , $find_log , $movie , $find_movie, $db)
{
	$rent_movie = $find_movie['renting_students'];
	array_push($rent_movie, $find_log['_id']);
	$newdata = array('$set' => array("renting_students" => $rent_movie));
	$db->movies->update(array("imdb_code" => $movie),        $newdata);
	$rent_log = $find_log['rented_movies'];
	array_push($rent_log, $find_movie['_id']);			
	$newdata = array('$set' => array("rented_movies" => $rent_log));
	$db->students->update(array("login" => $log), $newdata);
	$stock = $find_movie['stock'] - 1;
	$newdata = array('$set' => array("stock" => $stock)); 
	$db->movies->update(array("imdb_code" => $movie), $newdata);
}
function up_return($log , $find_log , $movie , $find_movie , $db)
{
	$rent_movie = $find_movie['renting_students'];
	$tab_up = supr_val($rent_movie , $find_log['_id']);
	$newdata = array('$set' => array("renting_students" => $tab_up));
	$db->movies->update(array("imdb_code" => $movie), $newdata);
	$rent_log = $find_log['rented_movies'];
	$tab_up = supr_val($rent_log , $find_movie['_id']);
	$newdata = array('$set' => array("rented_movies" => $tab_up));
	$db->students->update(array("login" => $log), $newdata);			
	$stock = $find_movie['stock'] + 1;
	$newdata = array('$set' => array("stock" => $stock)); 
	$db->movies->update(array("imdb_code" => $movie), $newdata);
}
?>