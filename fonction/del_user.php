<?php
require_once("etna_movies.php");

function del_user($arg)
{
  $c = new MongoClient();
  $db = $c->db_etna;
  $collection = $db->students;
if (db_etna.students.find({'login' = $arg}))
{
  inp("Are you sure ?", "^(?:yes|no)$", "Please write yes or no");
  if ($entre == "yes")
  {
    $collection->remove(array('login' => $arg))
    echo "User deleted";
  }
  else
    echo "You don't want to delete a student.";
}
else
  echo "This student is not subsribe";
}