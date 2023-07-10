<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Baseball Community</title>
<script
    src="https://kit.fontawesome.com/424f232f43.js"
    crossorigin="anonymous"
></script>
<link
    href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap"
    rel="stylesheet"
/>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap"
    rel="stylesheet"
/>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<?php    
   	$con = mysqli_connect("127.0.0.1:3308", "user1", "12345", "term_project");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
	$team = $row["team"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>
	<section class="intro">
		<video src="./video.mp4" autoplay muted loop></video>
      		<div id="join_box">
			<div id="join_box_cover"></div>
          	<form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
				<div class="mem">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$userid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">닉네임</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
					<div class="clear"></div>
                    <div class="form">
    <div class="col1">응원팀</div>
    <div class="col2">
        <select name="team">
            <option value="한화" <?= ($team == "한화") ? "selected" : "" ?>>한화</option>
            <option value="NC" <?= ($team == "NC") ? "selected" : "" ?>>NC</option>
            <option value="SSG" <?= ($team == "SSG") ? "selected" : "" ?>>SSG</option>
            <option value="KT" <?= ($team == "KT") ? "selected" : "" ?>>KT</option>
            <option value="키움" <?= ($team == "키움") ? "selected" : "" ?>>키움</option>
            <option value="기아" <?= ($team == "기아") ? "selected" : "" ?>>기아</option>
            <option value="두산" <?= ($team == "두산") ? "selected" : "" ?>>두산</option>
            <option value="LG" <?= ($team == "LG") ? "selected" : "" ?>>LG</option>
            <option value="삼성" <?= ($team == "삼성") ? "selected" : "" ?>>삼성</option>
            <option value="롯데" <?= ($team == "롯데") ? "selected" : "" ?>>롯데</option>
        </select>
    </div>                 
</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
							       type="text" name="email2" value="<?=$email2?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
				</div>
           	</form>
        	</div> <!-- join_box -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

