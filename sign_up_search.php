<?
  include ('db_connect.php');
  $id = $_POST['id'];
  $nic = $_POST['name'];
  $pw = $_POST['passw'];
  $date=date("Y-m-d");
  $sql = mq("insert into user (id, nic_name, pw, user_date) values ('".$id."','".$nic."','".$pw."','".$date."')");
  echo "
  <script>
    location.href='index.php'
  </script>";
?>
