<?php 
    $p=1;
    $v=$_POST['bts0'];
    $v=(int)$v;
    echo $v;
    while($p<=$v)
    {
        if(!empty($_POST['b'.(string)$p]))
        {
            $cost=$_POST['rate'.(string)$p];
            $cost=(int)$cost;
            echo $cost;
            echo "<script>localStorage.setItem('cost',$cost)</script>";
            break;
        }
        else{
            $p=$p+1;
        }

    }
?>