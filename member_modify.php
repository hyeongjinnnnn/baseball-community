<?php
    $id = $_GET["id"];
    $con = mysqli_connect("127.0.0.1:3308", "user1", "12345", "term_project");
    $sql    = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $original_name = $row["name"];

    $id = $_GET["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $team = $_POST["team"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    $sql = "update members set pass='$pass', name='$name', team='$team', email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);
    $sql2 = "update board set name='$name' where name='$original_name'";
    mysqli_query($con, $sql2);
    $sql3 = "update comments set writer_name='$name' where writer_name='$original_name'";
    mysqli_query($con, $sql2);
    mysqli_query($con, $sql3);
    mysqli_close($con);     
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    $_SESSION["userid"] = $id;
    $_SESSION["username"] = $name;
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
