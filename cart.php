<?php
class cart{
  private $db;
  public function __construct() {
   $this->db = new Database;
   }
 public function addquantity($pid,$q){
  $this->db->query('UPDATE cart SET quantity=$q WHERE id=$pid'); 

}
public function delcart(){
  $this->db->query('DELETE FROM cart'); 

}
public function addProduct($data) {
$this->db->query('INSERT INTO cart (id,title,quantity,price,category) VALUES (:id,:title,:quantity,:price,:category)');
$this->db->bind(':id',$data['id']);
$this->db->bind(':title', $data['title']);
$this->db->bind(':price', $data['price']);
$this->db->bind(':quantity',"1");
$this->db->bind(':category',$data["category"]);
if($this->db->execute()) {
              return true;
          } else {
              return false;
          }}
  public function getProduct(){
        $this->db->query('SELECT* FROM cart ORDER BY created_at DESC');
        $results=$this->db->resultset();
        return $results;
    }

}
?>