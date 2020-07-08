<?php 

if(empty($_GET['page'])){
    include 'src/pages/dashboard.php';
}else if($_GET['page']){
    include 'src/pages/'.$_GET['page'].'.php';
}else{
    include 'src/pages/home.php';
}

?>