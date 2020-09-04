<?php

if(!extension_loaded("soap")){
    dl("php_soap.dll");
}
ini_set("soap.wsdl_cache_enabled","0");

$server = new SoapServer("wsdl/product.wsdl");

function listProducts($id){

    $resultData= array();

    $conn = mysqli_connect("localhost","root","");

    if($conn) {
        $result = mysqli_select_db($conn,"northwind");
        if(!$result){
          throw new SoapFault("Server","Nije se spojio na bazu.");
        }
              
        $sql = "SELECT p.ProductName, su.CompanyName, c.CategoryName, p.QuantityPerUnit, p.UnitPrice, p.UnitsInStock , p.UnitsOnOrder, p.ReorderLevel, p.Discontinued 
        FROM products as p
        INNER JOIN suppliers as su ON p.SupplierID = su.SupplierID
        INNER JOIN categories as c ON p.CategoryID = c.CategoryID
        WHERE p.ProductID = '$id'";
    
    
        $result2 = mysqli_query($conn, $sql);
        if(!$result2){
          throw new SoapFault("Server","Nije dohvatio rezultat.");
        }
        
        while($row = mysqli_fetch_array($result2)) {
            $resultData[]=$row;
        }
        
        return $resultData;
        mysqli_close($conn);
      }
      else {
      throw new SoapFault("Server","Nije se spojio na server baze.");
      }
}
    $server->AddFunction("listProducts");
    $server->handle();
?>