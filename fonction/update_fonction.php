<?php
function name($arg)
{
  $c = new MongoClient();
  $db = $c->db_etna;
  $collection = $db->students;
  $entre = inp("New name ?", "/^[a-zA-z]+\s?-?[a-zA-z]+$/","Enter a Valid name");
  $newdata = array('$set'=>array("name" => $entre));
  $collection->update(array("login" => $arg), $newdata);
  echo "User informations modified !\n";
}

function age($arg)
{
  $c = new MongoClient();
  $db = $c->db_etna;
  $collection = $db->students;
  $entre = inp("New age ?", "/^[1-9][0-9]?$/","Enter a valid age");
  $newdata = array('$set' => array("age" => $entre));
  $collection->update(array("login" => $arg), $newdata);
  echo "User informations modified !\n";
}

function email($arg)
{
  $c = new MongoClient();
  $db = $c->db_etna;
  $collection = $db->students;
  $entre = inp("New email ?", "/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/","Enter a valid email");
  $newdata = array('$set' => array("email" => $entre));
  $collection->update(array("login" => $arg), $newdata);
  echo "User informations modified !\n";
}

function phone($arg)
{
  $c = new MongoClient();
  $db = $c->db_etna;
  $collection = $db->students;
  $entre = inp("New phone ?", "/^0[1-9][0-9]{8}$/","Enter a valid phone number");
  $newdata = array('$set' => array("phone" => $entre));
  $collection->update(array("login" => $arg), $newdata);
  echo "User informations modified !\n";
}
?>