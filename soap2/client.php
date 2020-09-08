<?php

  if (isset($_POST["id"])) {
    $id = $_POST['id'];

  try{
  ini_set('soap.wsdl_cache_enabled',0);
  ini_set('soap.wsdl_cache_ttl',0);

    $sClient = new SoapClient('http://localhost/soap2/wsdl/order.wsdl',
              array('cache_wsdl'=>WSDL_CACHE_NONE,'trace' => 1)
              );
    $response = $sClient->listOrders($id);
    //var_dump($sClient->__getLastRequest()); //Ako treba ispisat SOAP req objekt, za resp _getLastResponse
    $sClient->__getLastRequest();

  }catch(SoapFault $e){
    var_dump($e);
    echo $e;
  }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Northwind baza</title>
</head>
<body>
<style>
.footer{
float:center; 
background-color:#B0E0E6;
text-align:center;
padding:15px;
margin-top:7px;
color:#000000;
width:100%;
}
</style>
<header>
<div style="background-color:#708090;padding:15px;text-align:center;">
  <img src="data:image/png;base64,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" style="width:50%;">
</div>
</header>
    <div class="col-12 header">
      <h1 class="col-8">Northwind</h1>
      <p class="col-4 logo">  </p>
    </div>
    
    <div class="row">
      <div class="col-12 menu">
        <ul>

             <a class="btn btn-primary" href="orders.html" role="button">Orders</a>

         </ul>
      </div>

        <div class="col-9">
          <div class="main_frame">
            <div class="search_form">
            <p>Upisite ShipperID:</p>  
              <form id="form" action="./client.php" method="post">
                 <input type="text" id="id" name="id">  
                  <button type="submit">Pretraži</button>
                </form>
            </div>
            <div class="frame1">
                  <?php
		                for($j=0;$j<sizeof($response);$j++) {
                          echo "<hr><div class='customers'>
                                <p><i>OrderID: </i> <b><i>".$response[$j][0]."</i></b></p>
                                <p><i>OrderDate: </i> <b><i>".$response[$j][1]."</i></b></p>
                                <p><i>RequiredDate: </i> <b><i>".$response[$j][2]."</i></b></p>
                                <p><i>ShippedDate: </i> <b><i>".$response[$j][3]."</i></b></p>
                                <p><i>Freight: </i> <b><i>".$response[$j][4]."</i></b></p>
								<p><i>ShipName: </i> <b><i>".$response[$j][5]."</i></b></p>
                                <p><i>ShipAddress: </i> <b><i>".$response[$j][6]."</i></b></p>
                                <p><i>ShipCity: </i> <b><i>".$response[$j][7]."</i></b></p>
                                <p><i>ShipRegion: </i> <b><i>".$response[$j][8]."</i></b></p>
								<p><i>ShipPostalCode: </i> <b><i>".$response[$j][9]."</i></b></p>
								<p><i>ShipCountry: </i> <b><i>".$response[$j][10]."</i></b></p>
                            </div>";
					            }
				            ?>
              </div>
            </div>
      </div>

     
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div class="footer">Grupa 6:Karlo Popović i Antonio Markić</div>
    </body>
</html>