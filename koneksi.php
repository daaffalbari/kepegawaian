<?php

function dbConnect(){
  $db = new mysqli("localhost","root","","db_karyawan");
  return $db;
}
