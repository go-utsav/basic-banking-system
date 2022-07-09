<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="Style.css"  rel="stylesheet" >
  </head>
  <body class="bodyarea">
  

    <?php 
    include "navigationbar.php";
    ?>
    <h1 class="text-center" style="background-color: lightpink; border: 2px solid black; border-radius: 10px; width:800px; margin: 30px 400px 0 400px;  ">Passbook : Transactions</h1>
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
          ?>

      <div class="border">  
      <?php

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Connection not established: ".mysqli_connect_error());
}else{

    $sql = "SELECT * FROM `transactions`";
    $result = mysqli_query($conn, $sql);
?>
        <table class="table table-dark" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th scope="col">Sender</th>
                    <th scope="col">Reciever</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <style>
                .mybtn {

                    box-shadow: 2px 2px 10px black;
                    border-radius: 30px;
                    font-weight: bold;
                    background-color: lightgreen;
                    color: green;
                }

                .mybtn:active {
                    background-color: green;
                    color: lightgreen;
                }
            </style>
            <?php
echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
    if(!(empty($row['sender']) && empty($row['receiver']) && empty($row['amount'])))
        {echo    '
        <tr>
          <td>'.$row['sender'].'</td>
          <td>'.$row['receiver'].'</td>
          <td>'.$row['amount'].'</td>
          <td>'; ?> <?php if($row['status'] == "succeed"){echo '<b><p style="color:green;">Succeed</p></b>';}else{echo '<b><p style="color:red;">Failed</p></b>';} ?>
          <?php echo '</td>
          </tr>';}
}

}
echo "</tbody>";
?>
    </div>
</center>
      
      </div>
        </body>
        </html>