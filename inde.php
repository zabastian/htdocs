<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <header class="text-center">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      <img class="img-circle" src="beach-1751455_1920.jpg" alt="img-circle" width="140" height="140">
    
        <h1><a href="http://localhost/">JavaScript</a></h1>
        </div>
    </div>
    </header>

    <nav>
        <ol>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href = "http://localhost/inde.php?id=' . $row['id'] . ' ">' . htmlspecialchars($row['title']) . '</a></li>' . "\n";
            }
            ?>
        </ol>
    </nav>
    <div id='control'>
        <input type="button" value="white" onclick="document.getElementById('target').className='white'" />
        <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
        <a href="http://localhost/write.php">쓰기</a>
    </div>
    <article>


        <!-- echo file_get_contents($_GET['id'] . ".txt"); -->

        <!-- 위 내용은 php에 저장되어있던 문장을 불러낸 것이고 아래쪽은 mysql monitor -->
        <!-- 에서 적었던 내용을 불러낸것이다. -->

        <?php
        if (empty($_GET['id']) === false) {
            $sql = 'SELECT * FROM topic WHERE id=' . $_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo strip_tags($row['description'], '<a><h1>');
        }

        // title의 mysql에서 descripttion을 불러내었다.

        // strip_tags를 이용해서 링크랑 <h1></h1> 같은 태그를 표시할수 있도록 했다.(
        // 원래는 htmlspecialchars 때문에 링크랑 태그가 다 뜨는 경우였다


        ?>
    </article>

    <h1>Hello, world!</h1>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://localhost/cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->

</body>

</html>