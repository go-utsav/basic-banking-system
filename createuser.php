<?php 
global $useracname, $useracemail;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="contactstyle.css">
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

    $sqlemail = "SELECT `email` FROM `users` WHERE `accno` = '{$acno}' ;";
    $result2=mysqli_query($conn,$sqlemail);
    if($result2){
    $useracemail = mysqli_fetch_assoc($result2)['email'];
    }

    
    $sqlblc = "SELECT `blc` FROM `users` WHERE `accno` = '{$acno}' ;";
    $result3=mysqli_query($conn,$sqlblc);
    if($result3){
    $useracblc = mysqli_fetch_assoc($result3)['blc'];
    }
   
    $sqlacno = "SELECT `accno` FROM `users`  WHERE `accno` = '{$acno}'  ;";
    $result4 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result4)
    
?>



<h2 class="text-center pt-4">USER Information</h2>
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
        <div class="screen-body-item left">
          <img class="img-fluid" src="img/p1.jpg" style="border: none; border-radius: 50%;"> <br><br><br> <br>
          <h2 class="text-center">The Spark Foundation</h2>
        </div>
        <div class="screen-body-item">
          <form class="app-form" method="post">
            <div class="app-form-group">
              <label for="">Account No.</label>
              <input class="app-form-control" placeholder="NAME" type="text" name="name" required value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"> 
            </div>
            <label for="">Name</label>
            <div class="app-form-group">
              <input class="app-form-control"  type="name" name="name" value= "<?php if(isset($useracname)) {echo $useracname;}  ?>">
            </div>
            <label for="">Email ID:</label>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL" type="email" name="email" value="<?php if(isset($useracemail)) {echo $useracemail;}?>" > 
            </div>
            <label for="">Coins in the Wallet</label>
            <div class="app-form-group">
              <input class="app-form-control"  type="number" name="balance" value="<?php if(isset($useracblc)) {echo $useracblc;}?>">
            </div>
            
            <br>
            <div class="app-form-group button">
            
             
              <?php
            for($x = 1; $x <=1; $x++) {
                echo '
                <a href="transfercoin.php?reads='.$acno.'">
                 <button type="button" class="btn mybtn btn-success"> Transfer Coin </button>
                 </a>';
            }
            
          ?>
              <a href="index.php"> <input type="button" class="btn mybtn btn-success " value="View All Customer"></a>
              <!--<input class="app-form-button" type="reset" value="RESET" name="reset"></input> -->
            </div>
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

if(isset($_GET['reads']))
{ 
    $acno = $_GET['reads'];
}

//echo $acno;

$sqlname = "SELECT * FROM `users` WHERE `accno` = '{$acno}' ;";

$result1=mysqli_query($conn,$sqlname);
if($result1){

$useracname = mysqli_fetch_assoc($result1)['name'];
$useracemail = mysqli_fetch_assoc($result1)['email'];
}
/*if(!isset($sqlname))
{ 
    echo $sqlname; 
}*/
if(!isset($useracname)) {echo $useracname;}
?>