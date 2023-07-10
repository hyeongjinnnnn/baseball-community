<?php
// 댓글 작성 처리
$con = mysqli_connect("127.0.0.1:3308", "user1", "12345", "term_project");
if (isset($_POST['comment_content'])) {
    $comment_content = $_POST['comment_content'];
    $regist_day = date("Y-m-d H:i:s");

    $userid = $_SESSION["userid"];
    $query = "SELECT * FROM members WHERE id='$userid'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $name = $row["name"];
    $team = $row["team"];

    // comments 테이블에 댓글 데이터를 삽입하는 쿼리
    $query = "INSERT INTO comments (board_id, writer_name, content, regist_day)
              VALUES ('$num', '$name', '$comment_content', '$regist_day')";
    $result = mysqli_query($con, $query);
} 

// 댓글 삭제 처리
if (isset($_POST['delete_comment'])) {
    $delete_comment_id = $_POST['delete_comment'];

    // comments 테이블에서 해당 댓글을 삭제하는 쿼리
    $query = "DELETE FROM comments WHERE comment_id = '$delete_comment_id'";
    $result = mysqli_query($con, $query);
}
?>    
            <form name="comment" method="POST" action="board_view.php?num=<?=$num?>&page=<?=$page?>">
                <li id="input_comment">
                    <span class="col1"><b>댓글</b></span>
                    <?php 
                        if($userid) {
                    ?>
                    <input type="text" name="comment_content">
                    <button type="submit">작성</button>
                    <?php
                        } 
                    ?>
			</li>
            </form>
			<div id="view_content_comment">
            <?php
                // comments 테이블에서 해당 게시글의 댓글을 조회하는 쿼리
                $query = "select * from comments where board_id = '$num'";
                $result = mysqli_query($con, $query);

                // 댓글이 존재하는 경우
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $comment_id = $row['comment_id'];
                        $comment_writer = $row['writer_name'];
                        $query2 = "SELECT * FROM members WHERE name='$comment_writer'";
                        $result2 = mysqli_query($con, $query2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $comment_writer_id = $row2['id'];
                        $comment_writer_team = $row2['team'];
                        $comment_content = $row['content'];
                        $comment_regist_day = $row['regist_day'];
                ?>
                <div class="comment">
                    <span class="col1"><b><?= $comment_writer."({$comment_writer_team})"; ?></b></span>
                    <span class="col2"><?= $comment_regist_day; ?></span>
                    <p><?= $comment_content; ?></p>
                    <?php if (isset($_SESSION["userid"])) 
                        if ($_SESSION["userid"] ==  $comment_writer_id) {?>
                        <form method="POST" action="board_view.php?num=<?=$num?>&page=<?=$page?>">
                            <button type="submit" name="delete_comment" value="<?=$comment_id?>">삭제</button>
                        </form>
                    <?php } ?>
                </div>
                <?php
                    }
                } else {
                    // 댓글이 없는 경우
                    echo '<p>작성된 댓글이 없습니다.</p>';
                }
                mysqli_close($con);
            ?>