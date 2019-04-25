<?php
    ob_start();
    session_start();

try {
    require_once("connectDb.php");
    $sql="SELECT * FROM `photo` as p JOIN `member` as m ON p.memNo = m.memNo order by photoNo desc";
    $photo = $pdo -> query($sql);
    $photo -> bindColumn("photoNo",$photoNo);
    $photo -> bindColumn("photoWForester",$photoWForester);
    $photo -> bindColumn("photoLikeCnt",$photoLikeCnt);
    $photo -> bindColumn("memId",$memId);
    $photo -> bindColumn("memImg",$memImg);
    

} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="js/hbgClick.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/game.js"></script>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/new/favicon.png" />
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/svg_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <title>森存者｜尋找森存者</title>
</head>
<body>
    <!-- header --> 
    <nav>
        <div class="icon" id="icon">
            <div class="hamburger" id="hamburger"></div>  
        </div>

        <div id="small-forester_logo">
                <a href="index.html"><h1><img src="images/logo.svg" alt="手機板森存者商標" ></h1></a>
        </div>
        <div id="header-member" >
            <a href="login.html" ><img src="images/icon_user.png" alt="會員大頭像"></a>
        </div>
        
        <div class="cloud">
            <div class="doc doc--bg2">
                <canvas id="canvas" width="1444" height="119"></canvas>
            </div>
        </div>
        <!--  -->

        <div class="header-background-cloud">
            <span id="show_span" >
                <ul><li></li>
                    <li><a href="plan.html">活動規劃</a></li>
                    <li><a href="order.html">線上訂票</a></li>
                    <li><a href="index.html"><h1> <img id="forester_logo" src="images/logo.svg" alt="森存者商標"></h1></a></li>
                    <li><a href="blog.html">手札分享</a></li>
                    <li><a href="game.html">尋找森存者</a></li> 
                    <li class="header-member"><a href="login.html" ><img src="images/icon_user.png" alt="會員大頭像"></a></li>
                </ul>                 
            </span>
        </div>        
    </nav>
    <!-- header -->
    <script src="js/header.js"></script>
         
    <div class="wrap">
     <!-- bg fly -->
     <div id="scene1">
            <div data-depth="0.8" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
    </div>
       <script>
          parallaxInstance = new Parallax( document.getElementById( "scene1" ));
      </script> 
    <!-- map -->
    <div class="game-container">
        <div class="game-map">
            <img src="images/game/island-map.png" alt="營區地圖">
        </div>
        <!-- 地圖按鈕 -->
        <div class="game-rule">
            <img src="images/game/mapbtn.png" alt="遊戲規則按鈕">
        </div>

        <div class="game-rule-content">
            <div id="close"></div>
            <h2>遊戲規則</h2>
            <p>看地圖尋找到營區裡的森存者，和他合照並上傳，即可獲得點數</p>
            <!-- <img src="images/blog/talk.png" alt="熊"> -->
            <div class="game-rule-bearTalk">
                <span>快來找我喔！</span>
            </div>
        </div>
    </div>
    <script>
    $("#close").click(function(){
        $(".game-rule-content").hide();
    });
    $(".game-rule").click(function(){
        $(".game-rule-content").show();
    });
    </script>
    <!-- bg fly -->
     <div id="scene2">
            <div data-depth="0.5" class="fly1"><img src="images/blog/drop.png" alt="蝴蝶"></div>
    </div>
        <script>
            parallaxInstance = new Parallax( document.getElementById( "scene2" ));
        </script>
    <!-- photo wall -->
    <div class="photoWall">
        <div class="header_title_background"><img src="images/game/title_back_album.png" alt=""></div> 
        <div class="photoWall-container">
        <!-- bgfly -->
        <div id="scene3">
            <div data-depth="0.5" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
        </div>
        <script>
              parallaxInstance = new Parallax( document.getElementById( "scene3" ));                  
        </script> 
            <div class="photoWall-upload">
                <button id="uploadCheck">上傳與森存者合照</button>
            </div>
            <!-- <div id="photoUploadArea"> -->
            <div id="photoUploadArea" style="display:none;">
            <div id="closeUpload"></div>
                <form action="uploadPhoto.php" method="post" enctype="multipart/form-data">
                    <img src="images/game/Photoupload.png" alt="" id="imgPreview">
                    <input type="file" name="photoWForester" id="upFile">
                    <input type="submit" value="送出照片" id="photoSub">
               </form>
            </div>
        </div>
        <script>
        $("#closeUpload").click(function(){
            $("#photoUploadArea").hide();
        });
    </script>
        <div id="container">
        <?php
        while($photo ->fetch(PDO::FETCH_ASSOC)){
        ?>
            <div class="photo-item">
                <div class="photo-img">
                    <img src="images/event/Best-Survival-Schools.jpg" alt="活動圖片">
                    <!-- <img src="images/game/<?php echo $memId;?>/big_head1.png" alt="活動照"> -->
                </div>
            
                
                    <div class="photo-author">
                        <img src="images/blog/big_head1.png" alt="大頭照">
                        <!-- <img src="images/member/<?php echo $memNo;?>/big_head1.png" alt="大頭貼"> -->
                        <span class="authorName"><?php echo $memId;?></span>
                    </div>
                <div class="photoBtn">
                        <div class="photoLikeBtn">
                            <img src="images/blog/愛心.png" class="like" id="like<?php echo "|".$photoNo?>">
                            <span id="likeNum<?php echo $photoNo;?>"><?php echo $photoLikeCnt;?></span>  
                        </div>
                        <div class="photoRepBtn">
                           <a href="photoReport.php?photoNo=<?php echo $photoNo;?>"><img src="images/game/alert.png" alt="like"></a>
                        </div>
                        
                </div>
            </div>
        <?php 
        }
        ?>

        </div>

        
    </div>
    <script>
// 瀑布流
 
        $('#container').masonry({
            itemSelector: '.photo-item',
            columnWidth: 0,
            animate:true
        });


    </script>
</div>
</body>
</html>