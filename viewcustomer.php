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

          <h1 class="text-center" style="background-color: lightpink; border: 2px solid black; border-radius: 10px; width:800px; margin: 30px 400px 0 400px;  ">Our Customer Details</h1>
      <div class="border">
      <!--tabel-->
      <table class="table table-success table-striped">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Account No</th>
          <th>Wallet</th>
          <th> View Customer</th>
        </thead>
        <?php
                echo "<tbody>";
              while($row = mysqli_fetch_assoc($result)){
              echo    '
                  <tr class="table-active">
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['accno'].'</td>
                    <td>'.$row['blc'].'</td>
                    <td style="padding:10px 10px 10px 10px">
                    <a href="createuser.php?reads='.$row['accno'].'"
                    <button type="button" class="btn mybtn btn-dark" style="width:100%; border-radius:10px;"> View </button>
                    </a>
                    </td>
                  </tr>';
              }
             echo "</tbody>";
            ?>
        </tbody>
      </table>
      </div>
      <p style="background-color:black; color:white; margin-bottom: 0px; font-size:20px; text-align:center;"> Design And Developed by &copy; <a href="https://in.linkedin.com/in/mr-utsav-gohel">Utsav Gohel</a></p>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
