<?php
function parse()
{
  $row = 1;
  $array = null;
  if (($handle = fopen("movies.csv", "r")) !== FALSE)
  {
    while (($data = fgetcsv($handle, 1064, ",")) !== FALSE)
    {
      $array[] = $data;
    }
    fclose($handle);
  }
  print_r($array);
}
?>