<?php
  /**
   * @author : Unnat
   */
  class UserSignupModel
  {
    function DBConnect()
    {
        //  $servername = "MYSQL5017.Smarterasp.net";
        //  $username="9f39b3_djb";
        //  $password="P@55w0rd#";
        //  $dbName = "db_9f39b3_djb";

        $servername = "localhost";
        $username="root";
        $password="";
        $dbName = "JukeBox";

        $con = new mysqli($servername,
                $username,
                $password,
                $dbName);

        if ( $con->connect_error ) {
          echo "<script>"
              ."alert('"
              .die("Database Connection error : " . $con->connect_error)
              ."');"
            ."</script>";
      }
      return $con;
    }

    function InsertLoginDetails($username, $password)
    {
      $connection = $this->DBConnect();
      $statement = $connection->prepare("CALL sp_Signup_user(?,?)");
      $statement->bind_param('ss', $username, $password);
      $statement->execute();
      $_SESSION['username'] = $username;
      $_SESSION['loginStatus'] = 1;
      // echo "SP called successfully.";
      header('Location:../../Views/Account/CreateProfile.php');
    }

  }
?>
