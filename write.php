<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<style>
  #board_write {
    width:900px;
    position:relative;
    margin:0 auto;
  }
  #write_area {
    margin-top:70px;
    font-size:14px;
  }
  #in_title {
    margin-top:30px;
  }
  #in_title textarea {
    font-weight:bold;
    font-size:26px;
    color:#333;
    width: 900px;
    border:none;
    resize: none;
  }
  .wi_line {
    border:solid 1px lightgray;
    margin-top:10px;
  }
  #in_content {
    margin-top:10px;
  }
  #in_content textarea {
    font:14px;
    color:#333;
    width: 900px;
    height: 400px;
    resize: none;
  }
  .bt_se {
    margin-top:20px;
    text-align:center;
  }
  .bt_se button {
    width:100px;
    height:30px;
  }
</style>
</head>
<body>
  <?$board_id=$_GET['board_id'];?>
    <div id="board_write">
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form enctype="multipart/form-data" action="write_ok.php?board_id=<?echo $board_id;?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>

                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>

                      <input type="file" name="SelectFile" />


                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
