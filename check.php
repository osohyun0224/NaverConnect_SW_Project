<?php
	include ('db_connect.php');
	if($_GET["userid"]){
		$uid = $_GET["userid"];
		$sql = mq("select * from user where id='".$uid."'");
		$member = $sql->fetch_array();
		if($member==0)
		{
	?>
		<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
		<button value="닫기" onclick="id_check()">닫기</button>
	<?php
		}else{
	?>
		<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>중복된아이디입니다.<div>
			<button value="닫기" onclick="window.close()">닫기</button>
	<?php
		}
	?>
	<?
	}
	elseif ($_GET["usernic"]) {
		$uid = $_GET["usernic"];
		$sql = mq("select * from user where nic_name='".$uid."'");
		$member = $sql->fetch_array();
		if($member==0)
		{
	?>
		<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 사용가능한 닉네임입니다.</div>
		<button value="닫기" onclick="nic_check()">닫기</button>
	<?php
		}else{
	?>
		<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>중복된닉네임입니다.<div>
			<button value="닫기" onclick="window.close()">닫기</button>
	<?php
		}

	}
	?>
	<script>
	function id_check(){
		opener.document.getElementById("id_ch").value =1;
		window.close();
	}
	function nic_check(){
		opener.document.getElementById("nik_ch").value =1;
		window.close();
	}
	</script>
