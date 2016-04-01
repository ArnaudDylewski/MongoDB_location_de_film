<?php
require_once("fonction/update_fonction.php");
function add_student($arg)
{
	$c = new MongoClient();
  	$db = $c->db_etna;
    $collection = $db->students;
	if (preg_match("/^([a-zA-Z]+_[a-zA-Z0-9])$/", $arg) == 0)
		echo "Enter a valid login.\n";
	else
	{
		$tab['login'] = $arg;
		$tab['name'] = inp("Name ?" , "/^[a-zA-z]+\s?-?[a-zA-z]+$/" , "Enter a valid name.");
		$tab['age'] = intval(inp("Age ?" , "/^[1-9][0-9]?$/" , "Enter a valid age (1-99)."));
		$tab['email'] = inp("Email ?" , "/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/" , "Enter a valid mail.");
		$tab['phone'] = inp("Phone number ?" , "/^0[1-9][0-9]{8}$/" , "Enter a valid phone number.");
		$tab['rented_movies'] = array();
		$collection->insert($tab);
		echo "User registered !\n";
	}
}
function del_student($arg)
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collection = $db->students;
	$log = array('login' => $arg);
	$find = $collection->findOne($log);
	if ($find)
	{
		$entre = inp("Are you sure ?", "/^(?:yes|no|oui|non)$/", "Please write yes, no, oui or non.");
		if ($entre == "yes" || $entre == "oui")
		{
			$collection->remove(array('login' => $arg));
			echo "User deleted !\n";
		}
		else
			echo "You have not deleted $arg.\n";
	}
	else
		echo "This student does not exist.\n";
}

function show_student($arg = NULL)
{
	$i = 0;
	$c = new MongoClient();
	$db = $c->db_etna;
  	$collection = $db->students;
    $log = array('login' => $arg);
	$find = $collection->findOne($log);
	if (isset($arg))
          reduces($find, $arg, $collection);
	else
	{
	   	$find = $collection->find();
	   	foreach($find as $value)
	   	{
	    	foreach($value as $key => $value2)
	    	{	
	    		if ($key != '_id' && $key != 'rented_movies')
	    			echo "$key          : $value2\n";
	    		else
	    			echo "\n";
	    	}
	   	}
		echo "\n";
	}
}

function reduces($find, $arg, $collection)
{
	if ($find)
	{
   		$log = array('login' => $arg);
		$find = $collection->findOne($log);
	   	foreach($find as $key => $value)
	   	{
	    	if ($key != '_id' && $key != 'rented_movies')
	        echo"$key : $value\n";
	   	}
	}
	else
		echo "This student does not exist.\n";
}

function update_student($arg)
{
	$c = new MongoClient();
	$db = $c->db_etna;
	$collection = $db->students;
	$log = array('login' => $arg);
	$find = $collection->findOne($log);
	if ($find)
  	{
		$enter = inp("What do you want to update?", "/^(?:name|age|email|phone)$/" , "Choose a valid enter (name , age , email , phone ).");
		$enter($arg);
	}
	else
	    echo "This student does not exist.\n";
}						    
?>