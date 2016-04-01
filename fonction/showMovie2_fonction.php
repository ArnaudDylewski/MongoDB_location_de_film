<?php
require_once("movie_fonction.php");
function smdes()
{
	$i = 0;
	$collection2 = conn();
	$cursor = $collection2->find();
	$cursor->sort(array('title' => -1));
   	foreach($cursor as $key)
   	{
    	foreach($key as $doc => $value)
     	{
       		if (is_array($value))
       		{
         		$c = implode(" ", $value);
         		echo $doc . " : " . $c . "\n";
       		}
       		else
         		echo $doc . " : " . $value . "\n";
    	}
    	echo "\n";
    	$i++;
  	}
  	echo "*" . $i . "*" . "\n";
}

function smwa()
{
	$i = 0;
    $collection2 = conn();
	$cursor = $collection2->find();
	$cursor->sort(array('title' => 1));
   	foreach($cursor as $key)
   	{
    	foreach($key as $doc => $value)
     	{
       		if (is_array($value))
       		{
         		$c = implode(" ", $value);
         		echo $doc . " : " . $c . "\n";
       		}
       		else
        		echo $doc . " : " . $value . "\n";
    	}
    	echo "\n";
    	$i++;
  	}
  	echo "*" . $i . "*" . "\n";
}
?>