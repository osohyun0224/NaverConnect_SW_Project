<?php
		include ('db_connect.php');
		$board_id = $_GET['board_id'];
    $bno = $_GET['idx'];
		$username = $_SESSION['userid'];
		$date = date("Y-m-d H:i:s");
    if($bno && $username && $_POST['content']){
        $sql = mq("insert into ".$board_id."_reply (con_num,id,name,content,date) values ('".$bno."','".$username."','".$username."','".$_POST['content']."','".$date."');");
        echo "<script>alert('댓글이 작성되었습니다.');
        location.href='read.php?board_id=$board_id&idx=$bno;';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }

?>
