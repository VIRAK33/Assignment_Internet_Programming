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
    
      //$con = mysqli_connect('localhost', 'root', '', 'awesome_shop'); //Localhost Database
      $con = mysqli_connect('68.183.118.104', 'virak', 'VIRAKseam33@gic', 'awesome_shop'); //Online Database
      $result = mysqli_query($con, $sql);
      mysqli_close($con);
      return $result;
  }
  function run_non_query($sql)
  {
      //$con = mysqli_connect('localhost', 'root', '', 'awesome_shop');
      $con = mysqli_connect('68.183.118.104', 'virak', 'VIRAKseam33@gic', 'awesome_shop'); //Online Database
      $i = mysqli_query($con, $sql);
      mysqli_close($con);
      return $i;
  }

?>
