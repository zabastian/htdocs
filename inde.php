<?php
$conn = mysqli_connect("localhost", "root", 111111);
mysqli_select_db($conn, "opentutorials");
$result = mysqli_query($conn, "SELECT * FROM topic");



?>
<!--$conn = mysqli_connect("localhost", "root", 121049); 은 mysql -hlocalhost -uroot -p 명령어와 같다. -->
<!--mysqli_select_db($conn, "opentutorials"); 은 mysql>use opentutirials 명령어와 같다. -->
<!-- $result = mysqli_query($conn, "SELECT * FROM topic");은 mysql> SELECT * FROM topic; 과 같다. -->
<!-- row에 연관배열을 가져온다. -->


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
    <!-- 이 웹페이지 탭의 속성들을 통해 style.css라는 링크를 불러온다.  -->
</head>

<body>
    <header>
        <h1><a href="http://localhost/">JavaScript</a></h1>
    </header>

    <nav>
        <ol>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href = "http://localhost/inde.php?id=' . $row['id'] . ' ">' . $row['title'] . '</a></li>' . "\n";
            }
            ?>
        </ol>
    </nav>
    <div id='control'>
        <input type="button" value="white" onclick="document.getElementById('target').className='white'" />
        <input type="button" value="black" onclick="document.getElementById('target').className='black'" />

    </div>
    <article>

        <?php
        echo file_get_contents($_GET['id'] . ".txt");
        ?>
    </article>


</body>

</html>