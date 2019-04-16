<?php
session_start();
try{
  require_once('connectDb.php');
  $sql = 'select * from photoreport';
  $photoRep = $pdo->query($sql);
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
        <main class="col-md-10 ml-sm-auto px-4">
                <h2>尋找森存者遊戲照片檢舉管理</h2>
                <form class="searchbar form-inline mt-2 mt-md-0 justify-content-end">
                    <input class="form-control mr-sm-2 form-control-sm" type="text" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0 btn-sm" type="submit">搜尋</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>照片檢舉編號</th>
                                <th>照片</th>
                                <th>檢舉原因</th>
                                <th>檢舉狀態異動</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($photoRepRow = $photoRep->fetch()){?>
                            <tr>
                                <td><?php echo $photoRepRow['photoRepNo']; ?></td>
                                <td><img class="gamephoto" src="images/<?php echo $photoRepRow['photoNo']; ?>" alt=""></td>
                                <td><?php echo $photoRepRow['photoReprReason']; ?></td>
                                <td><button type="button" class="btn btn-danger btn-sm">刪除照片</button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="pagination">
                    <ul class="pagination pagination-sm justify-content-end">
                        <li class="page-item disabled">
                            <span class="page-link">上一頁</span>
                        </li>
                        <li class="page-item"><a class="page-link " href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                2
                                <span class="sr-only">(current)</span>
                            </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">下一頁</a>
                        </li>
                    </ul>
                </nav>
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