<!DOCTYPE HTML>
<html>


<head>
<meta charset="utf-8">
</head>

<body>
<script>
i=0
list = new Array("하나","둘","셋");
while(i<list.length)
{
    document.write(list[i]);
    i = i + 1;
}
</script>

<?php
$list=array("아이언맨","헐크","원펀맨");
echo $list;
echo count($list);
$i=0;
while($i<count($list)){
    echo $list[$i];
    $i += 1;
}

?>

</body>


</html>