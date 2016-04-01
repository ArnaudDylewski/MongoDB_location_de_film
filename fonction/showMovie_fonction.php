<?php
require_once("movie_fonction.php");
function reducsmr($arg2, $cursor, $i)
{
	if ((is_numeric($arg2)) || (!(is_string($arg2))) && (isset($arg2)))
	{
	   	foreach($cursor as $key)
   		{
			if ($key['rate'] >= $arg2 && $key['rate'] < $arg2 + 1)
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
  		}
        echo "*" . $i . "*" . "\n";
	}
	else
		echo "Please enter an integers.\n";
}

function smr($arg2)
{
	$i = 0;
	$collection2 = conn();
	$cursor = $collection2->find();
    reducsmr($arg2, $cursor, $i);
}

function smy($arg2)
{
	$i = 0;
	$collection2 = conn();
	if ((is_numeric($arg2)) || (!(is_string($arg2))) && (isset($arg2)))
	{
		$cursor = $collection2->find(array('year' => intval($arg2)));
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
	else
		echo "Please enter a year\n";
}

function smg($arg2)
{
	$i = 0;
	$collection2 = conn();
	if (isset($arg2) && !is_numeric($arg2))
	{
		$arg2 = strtolower($arg2);
        $cursor = $collection2->find(array('genres' => $arg2));
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
	else
		echo "Please put a valid gender.\n";
}
?>