<?php
session_start();
try{
  require_once('connectDb.php');
//   $sql = 'select * from admins';
//   $adm = $pdo->query($sql);
}catch (PDOException $e) {
  echo "失敗",$e->getMessage(),"<br>";
  echo "行號",$e->getLine();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>森存者後台 - 後台系統管理</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/new/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <!-- nav start -->
        <?php include_once('back_nav.php'); ?>

        <!-- conent start -->
        <main  class="col-md-10 ml-sm-auto px-4">
                <h2>QRCode管理</h2>
                <div class="scranqrcode"><i class="fas fa-camera"></i></div>
                <input type="button" value="掃描QRCode">
            </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script>
        // $(document).ready(function () {
        //     $('.menu').click(function () {
        //         var $clicked = $(this)
        //         $('.menu').each(function () {
        //             var $menu = $(this);
        //             if (!$menu.is($clicked)) {
        //                 $($menu.attr('data-item')).hide();
        //                 $menu.removeClass('selected');
        //             }
        //         });
        //         $($clicked.attr('data-item')).toggle();
        //         $clicked.addClass('selected');
        //     });
        // });


    </script>

</body>

</html>