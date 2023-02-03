<?

  $connect = mysql_connect("localhost","kdhong","1234");
  mysql_set_charset("utf8",$connect);
  mysql_select_db("kdhong_db",$connect);

  $id = $_POST['userid'];
  $pw = $_POST['userpw'];

  if (!$id) {
    echo "
    <script>
      window.alert('아이디를 입력하세요');
      history.go(-1);
      </script>";
  }
  elseif (!$pw) {
    echo "
    <script>
      window.alert('패스워드를 입력하세요')
      history.go(-1)
      </script>";

  }
  else {


  $sql = "select * from user where id='$id'";
  $result = mysql_query($sql,$connect);
  $num1 = mysql_num_rows($result);

  $sql = "select * from user where id='$id' and pw='$pw'";
  $result = mysql_query($sql,$connect);
  $num2 = mysql_num_rows($result);
  if (!$num1) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  elseif (!$num2) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  else {
    session_start();
    $user = mysql_fetch_array($result);
    $_SESSION['userid'] = $id;
    $_SESSION['user_nic'] = $user[2];
    echo "
    <script>
      location.href='index.php'
    </script>";
  }
}
mysql_close($connect);
?>

<meta charset="utf-8">
