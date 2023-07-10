<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
            <div class="logo">
                <i class="fab fa-asymmetrik"></i>
                <a href="index.php">Baseball Community</a>
            </div>
            <ul class="menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="index.php">Home</a></li>
                <li><a href="message_form.php">Message</a></li>                                
                <li><a href="board_list.php">Board</a></li>
                <li><a href="cheer.php">Cheer Up</a></li>
                <li><a href="member_form.php">Sign Up</a> </li>
                <li><a href="login_form.php">Login</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><a href="index.php">Home</a></li>
                <li><a href="message_form.php">Message</a></li>                                
                <li><a href="board_list.php">Board</a></li>
                <li><a href="cheer.php">Cheer Up</a></li>
                <li><a href="logout.php">Logout</a> </li>
                <li><a href="member_modify_form.php">Edit Profile</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        
    