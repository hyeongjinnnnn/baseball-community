        <section class="intro">
            <video src="./video.mp4" autoplay muted loop></video>
            <div class="title">
                <h1>Baseball Community Space</h1>
                <h2>Korea Baseball Organization</h2>
                <p>한국 야구 팬들의 소통 장소입니다.</p>
                <p>
                    게시판을 통한 정보 공유, 회원 간의 쪽지 기능, 
                    오늘의 야구 경기 정보를 제공합니다.
                </p>
                <p>한화, 롯데, KT, LG, SSG, 키움, 두산, NC, 삼성, KIA</p>
            </div>
            <div class="title_cover"></div>
        </section>
        <section class="baseballResult">
            <h1>KBO 경기</h1>
        </section>
        <div class="play">
            <?php
                header("Content-Type: text/html; charset=UTF-8");
                include_once "simple_html_dom.php";
                $url = "https://mykbostats.com/";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($ch);
                $html = new simple_html_dom();
                $html->load($res);
            ?>
            <div id="home__games__today" class="game-line-container">
                <?php echo $html->find("div#home__games__today", 0); ?>
            </div>
        </div>
        <div id="main_content">
            <div id="latest">
                <h4>최근 게시글</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("127.0.0.1:3308", "user1", "12345 ", "term_project");
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
        </div>