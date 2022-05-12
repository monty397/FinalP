<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST['removeItem'])){
            foreach($_SESSION['cart'] as $keys => $values){
                print_r($keys);
                // if($value['item_name']==$_POST['item_name']){
                //     unset($_SESSION['cart'][$key]);
                //     $_SESSION['cart']=array_values($_SESSION['cart']);
                //     echo "<script>
                //     alert('Item Removed');
                //     window.location.href='shoppingcart.php';
                //     </script>";
                // }
                
            }
        }
    }

?>