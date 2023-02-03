<?php
	include ('db_connect.php');
  $id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .my_G {
      margin-top: 40px;
    }
    .my_G thead th{
      height:40px;
      border-top:2px solid #09C;
      border-bottom:1px solid #CCC;
      font-weight: bold;
      font-size: 17px;
    }
    .my_G tbody td{
      text-align:center;
      padding:10px 0;
      border-bottom:1px solid #CCC; height:20px;
      font-size: 14px
    }
    .list-table {
      margin-top: 40px;
    }
    .list-table thead th{
      height:40px;
      border-top:2px solid #09C;
      border-bottom:1px solid #CCC;
      font-weight: bold;
      font-size: 17px;
    }
    .list-table tbody td{
      text-align:center;
      padding:10px 0;
      border-bottom:1px solid #CCC; height:20px;
      font-size: 14px
    }
    </style>
  </head>
  <body>
    <h1>내 정보</h1>
    <table class="my_G">
      <?
      $sql = mq("select * from user where id='$id'");
      while($user = $sql->fetch_array()){
      ?>
      <tr>
        <td width="50">닉네임</td>
        <td width="100"><?echo $user["nic_name"];?></td>
      </tr>
      <tr>
        <td>가입일</td>
        <td><?echo $user["user_date"];?></td>
      </tr>
      <?}?>
    </table>
    <h1>내가 쓴글</h1>
    <table class="list-table">
    <thead>
        <tr>
            <th width="70">번호</th>
              <th width="500">제목</th>
              <th width="100">작성일</th>
              <th width="100">조회수</th>
          </tr>
      </thead>
      <?php
      // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
        $sql = mq("select * from board where id='$id' order by idx desc" );
          while($board = $sql->fetch_array())
          {
            //title변수에 DB에서 가져온 title을 선택
            $title=$board["title"];
            if(strlen($title)>30)
            {
              //title이 30을 넘어서면 ...표시
              $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
      ?>
    <tbody>
      <tr>
        <td width="70"><?php echo $board['idx']; ?></td>
        <td width="500"><a href="read.php?board_id=board&idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
        <td width="100"><?php echo $board['date']?></td>
        <td width="100"><?php echo $board['hit']; ?></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
  </body>
</html>
