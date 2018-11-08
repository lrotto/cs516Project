<?php
class Dao {
private $host = "us-cdbr-iron-east-01.cleardb.net";
private $db = "heroku_a155aa0ef052528";
private $user = "b7ed26a76b4ba2";
private $pass = "2a2e737e";
public function getConnection () {
return
new PDO("mysql:host={$this->host};dbname={$this->db}"
}
...
}