<?php
class products{
  private $db;
  public function __construct() {
   $this->db = new Database;
   }
 public function addProduct($data) {
  print_r($data);
$this->db->query('INSERT INTO products (ID,title,price,feature,product_image,category,description) VALUES(:id,:title,:price,:feature,:filename,:category,:description)');
$this->db->bind(':id',$data['id']);
$this->db->bind(':title', $data['title']);
$this->db->bind(':price', $data['price']);
$this->db->bind(':feature', $data['feature']);
$this->db->bind(':filename', $data['pImage']);
$this->db->bind(':category',$data["category"]);
$this->db->bind(':description',$data['description']);
if($this->db->execute()) {
              return true;
          } else {
              return false;
          }}
  public function getProduct(){
        $this->db->query('SELECT* FROM products ORDER BY ID DESC');
        $results=$this->db->resultset();
        return $results;

}
 public function getCategory(){
        $this->db->query('SELECT DISTINCT category FROM products');
        $results=$this->db->resultset();
        return $results;
}
  
    }
?>