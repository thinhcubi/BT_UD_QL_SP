<?php
 namespace Controller;

 use Model\Product;
 use Model\ProductDB;
 use Model\DBConnection;

 class ProductController
 {
     public ProductDB $productDB;

     public function __construct()
     {
         $connection = new DBConnection("mysql:host=localhost;dbname=product_2","root","Cubi@2712");
         $this->productDB = new ProductDB($connection->connect());

     }
     public function index()
     {
         $products = $this->productDB->getAll();
         include 'view/list.php';
     }
     public function add()
     {
         if($_SERVER['REQUEST_METHOD']==='GET'){
             include 'view/add.php';
         } else {
             $errors = [];
             $fields = ['name','price','description','producer'];

             foreach ($fields as $field){
                 if(empty($_POST[$field])){
                     $errors[$field] = 'Khong duoc de trong';
                 }
             }

             if (empty($errors)){
                 $name = $_POST['name'];
                 $price = $_POST['price'];
                 $description = $_POST['description'];
                 $producer = $_POST['producer'];
                 $product = new Product($name,$price,$description,$producer);
                 $this->productDB->create($product);
                 header('Location: index.php');
             } else {
                 include 'view/add.php';
             }
         }
     }
     public function delete()
     {
         $id = $_GET['id'];
         $this->productDB->delete($id);
         header('Location: index.php');
     }
     public function edit()
     {

         if($_SERVER['REQUEST_METHOD']==='GET'){
             $id = $_REQUEST['id'];
             $product = $this->productDB->getID($id);
             include 'view/edit.php';
         }else{

             $errors = [];
             $fields = ['name','price','description','producer'];

             foreach ($fields as $field){
                 if(empty($_POST[$field])){
                     $errors[$field] = 'Khong duoc de trong';
                 }
             }
             $id = $_REQUEST['id'];

             if (empty($errors)) {
                 $product = new Product($_POST['name'],$_POST['price'],$_POST['description'],$_POST['producer']);
                 $product->setId($id);
                 $this->productDB->update($id,$product);
                 header('Location: index.php');
             }else{
                 $product = $this->productDB->getID($id);
                 include 'view/edit.php';
             }
         }
     }
 }