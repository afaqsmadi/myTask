<!DOCTYPE html>
<html>
<head>
   <title>Profile</title>
   <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
<!-- <div class="header">
      <h2> profile</h2>
  </div> -->
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Insert your image </h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>   
                </table>  
           </div>


<?php
$username="";
$email="";
// Create connection
$conn=mysqli_connect('localhost','root','','registration');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// $sql = "SELECT id, username, email FROM users";
 // $sql =SELECT LAST_INSERT_ID() INTO  users ;


$sql = "SELECT username,email FROM users ORDER BY id DESC LIMIT 1" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

         // echo "<div class="header" >" . "profile page" . "<div>";
         echo "<h2>  ". " username: ". $row["username"]. "<h2>";
         echo "<h2>" ."email :".$row["email"]."<h2";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>