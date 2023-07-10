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
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("127.0.0.1:3308", "user1", "12345", "term_project");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	// 사용자의 응원 팀 정보 가져오기
	$user_sql = "select team from members where name = '$name'";
	$user_result = mysqli_query($con, $user_sql);
	
	if ($user_result) {
    	$user_row = mysqli_fetch_array($user_result);
    	$team = $user_row["team"];
    } else {
    	$team = ""; 
   	}
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>	
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section class="intro">
	<video src="./video.mp4" autoplay muted loop></video>
   	<div id="board_box">
	    <div id="board_box_cover"></div>
		<div id="board_top">
			<ul class="buttons">
					<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
					<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
					<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
					<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
			</ul>
			<h3 class="title">
				내용보기
			</h3>
		</div>	
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name."({$team})"?> | <?=$regist_day?></span>
			</li>
			<div id="view_content_con">
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
				<?=$content?>
			</div>	
				<?php include "comments.php";?>
			</div>
	    </ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
