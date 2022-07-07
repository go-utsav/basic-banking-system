<?php
global $acno;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="contactstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
     
  </head>

<body>
<?php 
   include "navigationbar.php";
  ?>
<!--Connection with database-->
<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "smbank";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if(!$conn){
        die("Connection not established: ".mysqli_connect_error());
    }else{
        $sql = "SELECT * FROM `users`;";
        $result = mysqli_query($conn, $sql);
    }

    if(isset($_GET['reads']))
    { 
        $acno = $_GET['reads'];
    }
    $sqlname = "SELECT * FROM `users` WHERE `accno` = '{$acno}' ;";
    $result1=mysqli_query($conn,$sqlname);
    if($result1){
    $useracname = mysqli_fetch_assoc($result1)['name'];
    }
?>



<h2 class="text-center pt-4">Transfer Coins</h2>
<br>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <!--<div class="screen-body-item left">
          <img class="img-fluid" src="img/p1.jpg" style="border: none; border-radius: 50%;">
        </div> -->
        <div class="screen-body-item">
          <form class="transfercoin.php" method="post">
            <div class="app-form-group">
              <label for="">Sender Account No.</label>
              <input class="app-form-control" type="text" name="accno1" required value="<?php echo $acno; ?>"> 
            </div>
            <label for="">Total Coins to Transfer :</label>
            <div class="app-form-group">
            <i class="fa-solid fa-coin-vertical fa-2x"></i>
              <input  type="number" name="amount" style=" width: 100%;
    padding: 10px 0;
    background: lightgreen;
    border: 4px dashed black;
    border-radius: 40px;
    color: #810000;
    font-size: 40px;
    outline: none;
    transition: border-color .2s;
    text-align: center;"   required>
            </div>
            <div class="app-form-group">
              <label for="">Reciver Account No.</label>
              <input class="app-form-control" type="text" name="accno2" placeholder="00 00 00" required> 
            </div>
            <div> 
            <br>
            <button type="submit" class="btn btn-success text-center" style="width:100%;" href="viewcustomer.php">  Transfer Coin</button>
            </div>
            
            <div class="app-form-group button " style="width:100%;">
              
              
            </div>
            <br> <a href="viewcustomer.php"> 
            <button type="button" class="btn btn-info">View Account Numbers</button>
            </a>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<p style="background-color:black; color:white; margin-bottom: 0px; font-size:20px; text-align:center;"> Design And Developed by &copy; <a href="https://in.linkedin.com/in/mr-utsav-gohel">Utsav Gohel</a></p>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){

    
    $sender = $_POST['accno1'];
    $amount = $_POST['amount'];
    $reciever = $_POST['accno2'];
   
    
    $checkblcquery = "SELECT blc FROM users where accno='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['blc'];

    if($ava_blc >= $amount){
    $sql1 = "UPDATE users SET blc= blc-$amount WHERE accno='$sender'";
    $sql2 = "UPDATE users SET blc= blc+$amount WHERE accno='$reciever'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if($result1 && $result2){
        echo '<div class="alert alert-success align-items-center text-center" style="width:50%; padding:50px; margin-left:375px;" role="alert">
        <div >   
        <h2><i class="fas fa-check-circle"></i>
          Amount Transfered Successfully!</h2></div>
        </div>
      </div>';

      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'succeed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" style="width:50%  padding:50px; margin-left:375px;" role="alert">
        <div>
        <i class="fas fa-times-circle"></i>
        Oops! Something went wrong!
        </div>
      </div>';
      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
    }
}else{
    echo '<div class="alert alert-danger align-items-center text-center" style="width:50%  padding:50px; " role="alert">
        <div  class="align-items-center text-center >   
        <h2><i class="fas fa-times-circle"></i>
        Not Sufficient Balance in Account!</h2></div>
        </div>
      </div>
      ';
      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
}
}

?>