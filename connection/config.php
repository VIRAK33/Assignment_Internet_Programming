<?php
    // $con = new mysqli($sername, $username, $password);
    // $query = "insert into post ()";
    // $con->query($query);
    // $con->close();
?>

<?php
    // function execute select statement
  function run_query($sql)
  {
    //   $con = mysqli_connect('sql7.freemysqlhosting.net', 'sql7349909', '23WgS9BkN3', 'sql7349909');// Online Database
      $con = mysqli_connect('localhost', 'root', '', 'awesome_shop'); //Localhost Database
      
      $result = mysqli_query($con, $sql);
      mysqli_close($con);
      return $result;
  }
  function run_non_query($sql)
  {
      $con = mysqli_connect('localhost', 'root', '', 'awesome_shop');
      $i = mysqli_query($con, $sql);
      mysqli_close($con);
      return $i;
  }

?>
