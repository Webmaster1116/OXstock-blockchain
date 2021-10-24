<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
        require_once 'classes/configure.php'; 
        include(DIR_BASE.'user_header.php');
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "oxstock");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $card_number =  $_REQUEST['card_number'];
        $expire_date = $_REQUEST['expire_date'];
        $cvv =  $_REQUEST['cvv'];
        $full_name = $_REQUEST['full_name'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO cards (user_id, card_number, expire_date, cvv, user_fullname) VALUES ('$userId', '$card_number', 
            '$expire_date','$cvv','$full_name')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"
                . "<a href='wallet.php'>back</a>"; 
  
            echo nl2br("\n$card_number\n $expire_date\n "
                . "$cvv\n $cvv \n $userId");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>