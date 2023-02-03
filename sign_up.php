<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <style media="screen">
    <style>
      * {margin: 0; padding: 0;}
      #sign_up_box{
        width:400px;
        height:150px;
        border:solid 2px gray;
        position: absolute;
        left: 50%; top: 50%;
        margin-left: -200px;
        margin-top: -100px;
        background-color: orange;
      }
      #sign_up_button{
        position: absolute;
        left: 40%; top: 80%;
      }

    </style>
    <script>
      function check_id(){
        var userid = document.getElementById("uid").value;
        if(userid)
	       {
		         url = "check.php?userid="+userid;
			       window.open(url,"chkid","width=300,height=100");
		     }
         else{
			        alert("아이디를 입력하세요");
		          }
	        }

      function check_nik(){
        var usernic = document.getElementById("nic").value;
        if(usernic)
         {
             url = "check.php?usernic="+usernic;
             window.open(url,"chkid","width=300,height=100");
         }
         else{
              alert("닉네임을 입력하세요");
              }
          }

      function passwordCheck(){
          var pw = document.getElementById("pw").value;
          var pw_ck = document.getElementById("pw_ck").value;
          var id_ch = document.getElementById("id_ch").value;
          var nik_ch = document.getElementById("nik_ch").value;
          if (pw=="")  {
            alert("비밀번호를 입력해주세요.");
          }
          else if(id_ch==0){
            alert("아이디 중복확인을 해주세요");
          }
          else if(nik_ch==0){
            alert("닉네임 중복확인을 해주세요");
          }
          else if(pw != pw_ck){
            alert("비밀번호가 일치하지 않습니다 확인해 주세요.");
          }
          else{
            document.getElementById("sign").submit();

          }
      }
    </script>
  </head>
  <body>
    <div id="sign_up_box">


    <form class="" action="sign_up_search.php" method="post" id="sign">
      <table>
        <tr>
          <td>아이디</td>
          <td>
            <input type="text" name="id" id="uid">
          </td>
          <td>
            <button type="button" name="button" onclick="check_id()">중복확인</button>
            <input type="hidden" id="id_ch" name="" value="0">
          </td>
        </tr>
        <tr>
          <td>닉네임</td>
          <td>
            <input type="text" name="name" id="nic">
          </td>
          <td>
            <button type="button" name="button" onclick="check_nik()">중복확인</button>
            <input type="hidden" id="nik_ch" name="" value="0">
          </td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td>
            <input type="password" id="pw" name="passw">
          </td>
        </tr>
        <tr>
          <td>비밀번호 확인</td>
          <td>
            <input type="password" id="pw_ck" name="pass_check">
          </td>
        </tr>
      </table>
      <button id="sign_up_button" type="button" name="button" align="right" onclick="passwordCheck()">회원가입</button>

    </form>
    </div>
  </body>
</html>
