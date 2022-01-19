<?php 

if ($_FILES['product_image']['type'] == 'image/png') {
    $fileName = md5($_FILES['product_image']['name'].rand(1,999)).'.png';

    if(isset($_FILES['product_image'])){
        move_uploaded_file($_FILES['product_image']['tmp_name'], 'imagens/'.$fileName);
    }

}elseif($_FILES['product_image']['type'] == 'image/jpeg'){
    $fileName = md5($_FILES['product_image']['name'].rand(1,999)).'.jpg';

    if(isset($_FILES['product_image'])){
        move_uploaded_file($_FILES['product_image']['tmp_name'], 'imagens/'.$fileName);
    }
}else{
    echo "Só é possivel enviar imagens jpg e png <br>";
}

$image = $fileName;

?>