<?php 
    $p=1;
while($p<100)
    {
    $b=(string)$p;
    if(!empty($_POST[$b]))
    {

        $tid=$_POST['trainid'.$b];
        $tn=$_POST['tname'.$b];
        $tf=$_POST['fromcity'.$b];
        $tt=$_POST['tocity'.$b];
        $tr=$_POST['check'];
        $tc=substr($tr,0,2);
        $tr=(int)(substr($tr,3));
        if($tc=='SL')
        {
            $totic=$_POST['numbs'.$b];
        }
        elseif($tc=='AC')
        {
            $totic=$_POST['numba'.$b];
        }
        elseif($tc=='2A')
        {
            $totic=$_POST['numb2a'.$b];
        }
        else
        {
            $totic=$_POST['numb3a'.$b];
        }
        
        echo "<script>localStorage.setItem('ntrain','$p');</script>";
        echo "<script>localStorage.setItem('tid','$tid');</script>";
        echo "<script>localStorage.setItem('tn','$tn');</script>";
        echo "<script>localStorage.setItem('tf','$tf');</script>";
        echo "<script>localStorage.setItem('tt','$tt');</script>";
        echo "<script>localStorage.setItem('tr','$tr');</script>";
        echo "<script>localStorage.setItem('nv',2);</script>";
        echo "<script>localStorage.setItem('tc','$tc');</script>";
        echo "<script>localStorage.setItem('totic','$totic');</script>";
        include "passenger_details.html"; 
        break;
    }
    else{
        $p=$p+1;
    }
}
?>
