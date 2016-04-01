#!/usr/bin/php
<?php
require_once("fonction/verif_fonction.php");
require_once("fonction/user_fonction.php");
require_once("fonction/movie_fonction.php");
require_once("fonction/location_fonction.php");
$tab_fonc_arg2 = array(
	'add_student' => '1',
	'del_student' => '1',
	'show_student' => '1',
	'update_student' => '1',
	'show_movies' => '1'
);

$tab_fonc_arg1 = array(
	'show_student' => '1',
	'movies_storing' => '1',
	'show_movies' => '1',
	'show_rented_movies' => '1'
);

$tab_fonc_arg3 = array(
	'show_movies' => '1',
	'rent_movie' => '1',
	'return_movie' => '1'
);
function movies ($argv , $argc , $tab_fonc_arg1 , $tab_fonc_arg2 , $tab_fonc_arg3)
{
	if ($argc > 1)
	{
		if (array_key_exists($argv[1] , $tab_fonc_arg2) && verif_argu(2 , $argc))
		{
			$test = $argv[1];
      			$test($argv[2]);
		}
		else if (array_key_exists($argv[1] , $tab_fonc_arg1) && verif_argu(1 , $argc))
		{
			$test = $argv[1];
      			$test();
		}
		else if (array_key_exists($argv[1] , $tab_fonc_arg3) && verif_argu(3 , $argc))
		{
			$test = $argv[1];
	    		$test($argv[2] , $argv[3]);
		}
		else
			echo "This function does not exist or has not argument.\n";
	}
	else
		echo "Enter function.\n";
}
movies($argv , $argc , $tab_fonc_arg1 , $tab_fonc_arg2 , $tab_fonc_arg3);

?>