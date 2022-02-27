<?php
class registration{
  private $db;
  public function __construct() {
   $this->db = new Database;
   }
  public function addUser($data) {
$this->db->query('INSERT INTO user (Username,Password) VALUES(:user,:password)');
$this->db->bind(':user',$data['user']);
$this->db->bind(':password',$data['pass']);
if($this->db->execute()) {
              return true;
          } else {
              return false;
          }}
  public function getUser(){
        $this->db->query('SELECT* FROM User ORDER BY created_at	 DESC');
        $results=$this->db->resultset();
        return $results;

}

    }
?>
