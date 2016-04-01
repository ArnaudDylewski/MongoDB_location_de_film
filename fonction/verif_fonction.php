<?php
function verif_argu($i = -1, $argc)
{
	if (($argc - 1) != $i)
		return(0);
	return (1);
}
function verif_entre($i)
{
    $entre = readline("> ");
    $reg = preg_match($i, $entre);
    if ($reg ==  0)
    	return (0);
	else
		return($entre);
}
function inp($type , $reg , $erreur)
{
	echo "$type\n";
    while (!($entre = verif_entre($reg)))
	{
		echo "$erreur\n";
		echo "$type\n";
	}
    return ($entre);
}
?>