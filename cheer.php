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
<link rel="stylesheet" type="text/css" href="./css/cheer.css">
</head>
<?php
    $con = mysqli_connect("127.0.0.1:3308", "user1", "12345", "term_project");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 응원 버튼이 눌린 팀 이름 가져오기
        $team_name = $_POST["team_name"];

        // 해당 팀의 cheer_count 값을 1 증가시키는 쿼리문
        $sql = "update team_cheer set cheer_count = cheer_count + 1 where team_name = '$team_name'";
    
        $con->query($sql);
    }

    // cheer_count 값을 가져와서 배열에 저장
    $cheer_count = array();
    $sql = "select cheer_count from team_cheer order by id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cheer_count[] = $row['cheer_count'];
        }
    }
?>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section class="intro">
		<video src="./video.mp4" autoplay muted loop></video>
      		<div id="cheer_box">
				<div id="cheer_box_cover"></div>
	    		<div id="cheer_title">
		    		<span>Cheer Up</span>
	    		</div>
                <form name="cheer_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="cheer_content">
                    <div class="cheer_card">
                        <h2>한화</h2>
                        <div class="team_logo">
                            <img src="./img/hanhwa_logo.png" alt="한화 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[0]?></div>
                        <button class="cheer_button" name="team_name" value="한화">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>NC</h2>
                        <div class="team_logo">
                            <img src="./img/nc_logo.png" alt="NC 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[1]?></div>
                        <button class="cheer_button" name="team_name" value="NC">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>SSG</h2>
                        <div class="team_logo">
                            <img src="./img/ssg_logo.png" alt="SSG 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[2]?></div>
                        <button class="cheer_button" name="team_name" value="SSG">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>KT</h2>
                        <div class="team_logo">
                            <img src="./img/kt_logo.png" alt="KT 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[3]?></div>
                        <button class="cheer_button" name="team_name" value="KT">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>키움</h2>
                        <div class="team_logo">
                            <img src="./img/kiwoom_logo.png" alt="키움 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[4]?></div>
                        <button class="cheer_button" name="team_name" value="키움">응원하기</button>
                    </div>
                </div>
                <div id="cheer_content">
                    <div class="cheer_card">
                        <h2>기아</h2>
                        <div class="team_logo">
                            <img src="./img/kia_logo.png" alt="기아 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[5]?></div>
                        <button class="cheer_button" name="team_name" value="기아" >응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>두산</h2>
                        <div class="team_logo">
                            <img src="./img/dusan_logo.png" alt="두산 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[6]?></div>
                        <button class="cheer_button" name="team_name" value="두산">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>LG</h2>
                        <div class="team_logo">
                            <img src="./img/lg_logo.png" alt="LG 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[7]?></div>
                        <button class="cheer_button" name="team_name" value="LG">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>삼성</h2>
                        <div class="team_logo">
                            <img src="./img/samsung_logo.png" alt="삼성 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[8]?></div>
                        <button class="cheer_button" name="team_name" value="삼성">응원하기</button>
                    </div>
                    <div class="cheer_card">
                        <h2>롯데</h2>
                        <div class="team_logo">
                            <img src="./img/lotte_logo.png" alt="롯데 로고">
                        </div>
                        <div class="cheer_count"><?=$cheer_count[9]?></div>
                        <button class="cheer_button" name="team_name" value="롯데">응원하기</button>
                    </div>
                </div>
                </form>
    		</div> <!-- cheer_box -->
		</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>