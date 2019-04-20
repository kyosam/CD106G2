<?php
    ob_start();
    session_start();

try {
    require_once("connectDb.php");
    //第一名手札
    $sqlranking="SELECT * FROM `plan` as p JOIN `member` as m ON p.memNo = m.memNo where noteStatus = 1 limit 1";
    $ranking = $pdo -> query($sqlranking);
    $ranking -> bindColumn("planNo",$planNo);
    $ranking -> bindColumn("noteName",$noteName);
    $ranking -> bindColumn("noteDate",$noteDate);
    $ranking -> bindColumn("planPhoto",$planPhoto);
    $ranking -> bindColumn("planList",$planList);
    $ranking -> bindColumn("noteContent",$noteContent);
    $ranking -> bindColumn("noteLikeTime",$noteLikeTime);
    $ranking -> bindColumn("noteMsgTime",$noteMsgTime);
    $ranking -> bindColumn("memId",$memId);
    $ranking -> bindColumn("memImg",$memImg);
    //最新排列手札
    $sqlNewblog = "SELECT * FROM `plan` p LEFT JOIN `member` m ON p.memNo = m.memNo where noteStatus = 1 order by noteDate";
    $blogNew = $pdo -> query($sqlNewblog);
    $blogNew -> bindColumn("planNo",$planNo);
    $blogNew -> bindColumn("noteName",$noteName);
    $blogNew -> bindColumn("noteDate",$noteDate);
    $blogNew -> bindColumn("planPhoto",$planPhoto);
    $blogNew -> bindColumn("planList",$planList);
    $blogNew -> bindColumn("noteContent",$noteContent);
    $blogNew -> bindColumn("noteLikeTime",$noteLikeTime);
    $blogNew -> bindColumn("noteMsgTime",$noteMsgTime);
    $blogNew -> bindColumn("memId",$memId);
    $blogNew -> bindColumn("memImg",$memImg);
    //熱門排列手札
    $sqlHotblog = "SELECT * FROM `plan` p LEFT JOIN `member` m ON p.memNo = m.memNo where noteStatus = 1 order by noteLikeTime";
    $blogHot = $pdo -> query($sqlHotblog);
    $blogHot -> bindColumn("planNo",$planNo);
    $blogHot -> bindColumn("noteName",$noteName);
    $blogHot -> bindColumn("noteDate",$noteDate);
    $blogHot -> bindColumn("planPhoto",$planPhoto);
    $blogHot -> bindColumn("planName",$planName);
    $blogHot -> bindColumn("planList",$planList);
    $blogHot -> bindColumn("noteContent",$noteContent);
    $blogHot -> bindColumn("noteLikeTime",$noteLikeTime);
    $blogHot -> bindColumn("noteMsgTime",$noteMsgTime);
    $blogHot -> bindColumn("memId",$memId);
    $blogHot -> bindColumn("memImg",$memImg);
    //活動
    // $sqlevent ="SELECT * FROM `event`";
    // $event = $pdo -> query($sqlevent);
    // $event -> bindColumn("entNo",$entNo);
    // $event -> bindColumn("entName",$entName);
    // $event -> bindColumn("entPhoto",$entPhoto);
    // $event -> bindColumn("entDate",$entDate);
    // $event -> bindColumn("entPrice",$entPrice);
    // $event -> bindColumn("entSco",$entPrice);
    // $event -> bindColumn("entSurVal",$entSurVal);
    // $event -> bindColumn("entHanVal",$entHanVal);
    // $event -> bindColumn("entPcVal",$entPcVal);

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
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/svg_style.css">
    <link rel="stylesheet" href="css/header.css">    
    <link rel="Shortcut Icon" type="image/x-icon" href="images/new/favicon.png" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/hbgClick.js"></script>
    <script src="js/copyLink.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <title>森存者｜手札分享</title>
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
        <div data-depth="0.2" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
    </div>
       <script>
          parallaxInstance = new Parallax( document.getElementById( "scene1" ));
      </script>


    <div class="blogRanking">
    <?php
    while($ranking->fetch(PDO::FETCH_ASSOC)){
    ?>
    
        <a href="blogContent.php?planNo=<?php echo $planNo;?>"><h2><?php echo $noteName;?></h2></a>
        <div class="blogRanking-info">
            <div class="blogRanking-author">
                <!-- <img src="images/member/<?php echo $memNo;?>/big_head1.png" alt="大頭貼"> -->
                <span><?php echo $memId;?></span>
                <span><?php echo $noteDate;?></span>
            </div>
            <div class="blogContent-share">
                <input type="text" id="copyurl" value="blogContent.php?planNo=<?php echo $planNo;?>" >
                <img src="images/blog/Share.png" alt="分享" id="copybtn">
            </div>
        </div>
        <div class="blogRanking-article">
            <div class="blogRanking-article-left">
                <div class="blogRanking-photo">
                    <!-- <img src="images/plan/<?php echo $planNo;?>/<?php echo $planPhoto;?>" alt="手札圖片" onerror="javascript:this.src='images/planDef/planDef.jpg'"> -->
                </div>
                <p><?php echo $noteContent;?>
                    <a href="blogContent.php?planNo=<?php echo $planNo;?>"><span class="readMore" >繼續閱讀</span></a> </p>
            </div>
            
          
          <!-- event -->
            <div class="blogRanking-event-wrap">
    
            <?php
            $eventArr = explode(",",$planList);
            for($i=0;$i<count($eventArr);$i++){
                $sqlevent ="SELECT * FROM `event` where entNo =$eventArr[$i]";
                $event = $pdo -> query($sqlevent);
                // $event -> bindColumn("entNo",$entNo);
                $event -> bindColumn("entName",$entName);
                $event -> bindColumn("entPhoto",$entPhoto);
                $event -> bindColumn("entDate",$entDate);
                $event -> bindColumn("entPrice",$entPrice);
                $event -> bindColumn("entSco",$entPrice);
                $event -> bindColumn("entSurVal",$entSurVal);
                $event -> bindColumn("entHanVal",$entHanVal);
                $event -> bindColumn("entPcVal",$entPcVal);
                $event ->fetch(PDO::FETCH_ASSOC)
            ?>
            <div class="blogRanking-event">
                 <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                 <div class="blogRanking-event-info">
                    <h3 class="event-name"><?php echo $entName;?></h3>
                    <span class="event-hr"><?php echo $entDate;?>小時</span>
                       <div class="event-value">
                        <table class="event-value-table">
                            <tr>
                                <td><img src="images/blog/value_family.png" alt="親子值"></td>
                                <td><?php echo $entPcVal;?></td>
                                <td><img src="images/blog/value_handmade.png" alt="手作值"></td>
                                <td><?php echo $entHanVal;?></td>
                                <td><img src="images/blog/value_survive.png" alt="生存值"></td>
                                <td><?php echo $entSurVal;?></td>
                            </tr>
                        </table> 
                      </div>
                      <div class="avgScore">
                          <span>平均</span>
                          <img src="images/blog/fire.png" alt="評分火數">
                          <img src="images/blog/fire.png" alt="評分火數">
                          <img src="images/blog/fire.png" alt="評分火數">
                          <img src="images/blog/fire.png" alt="評分火數">
                          <img src="images/blog/fire.png" alt="評分火數">
                      </div>
                      <div class="event-price"><?php echo $entPrice;?></div>
                 </div>    
            </div>
             <?php
            }
            ?> 
          
        </div>

         <div class="blogRanking-btnContainer">
            <div class="blogLikeBtn">
               <img src="images/blog/愛心.png" alt="like">
               <span class="likeNum" id="likeNum"><?php echo $noteLikeTime;?></span> 
            </div>
            <div class="blogCommentBtn">
              <img src="images/blog/留言.png" alt="comment">
              <span class="commNum" id="commNum"><?php echo $noteMsgTime;?></span>  
            </div>
         </div>



        
        <div class="addBtn">
            <button>加入我的行程</button>
        </div>
    </div>
    <?php  }?>
    </div>
    
   <!-- bg fly -->
    <div id="scene2">
        <div data-depth="0.6" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
    </div>
    <script>
        parallaxInstance = new Parallax( document.getElementById( "scene2" ));
    </script>
    <!-- blog share -->
    <div class="blogShare">
        <button class="blogShareBtn"><a href="blogShare.html">編著手札</a></button>
        <img src="images/blog/back.png" alt="手札分享" class="blogShareImg" data-mobile="images/blog/bear.png" data-desktop="images/blog/back.png">
        <div class="blogShare-beforehover">
            你是不是很想寫下你的美好經驗！
        </div>
        <div class="blogShare-afterhover">
            點下去就可以實現你的願望！
        </div>
    </div>
    <script>
    //jquery rwd
    $(function(){ 
    var device = $(window).width() > 767 ? "desktop" : "mobile";
    $(".blogShareImg").each(function() {
    $(this).attr("src", $(this).data(device));
    });
    //改變尺寸
    $(window).resize(function()
    { 
    var device = $(window).width() > 767 ? "desktop" : "mobile";
    $("img").each(function() {
    $(this).attr("src", $(this).data(device));
    });
    }); 
    });
    //換圖片
    $(document).ready(function(){
         $(".blogShareBtn").hover(
            function() {
               $(".blogShareImg").attr("src","images/blog/bear.png");
            },
            function() {
               $(".blogShareImg").attr("src","images/blog/back.png");
            }
         );
      });
      $(document).ready(function(){
         $(".blogShareBtn").hover(
            function() {
               $(".blogShare-beforehover").css("visibility","hidden");
               $(".blogShare-afterhover").css("visibility","inherit");
            },
            function() {
                $(".blogShare-beforehover").css("visibility","inherit");
               $(".blogShare-afterhover").css("visibility","hidden");
            }
         );
      });
    </script>
    <div id="scene3">
        <div data-depth="1" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
    </div>
        <script>
            parallaxInstance = new Parallax( document.getElementById( "scene3" ));
        </script>
    <!-- blog forum -->
    <div class="blogForum">
        <div class="blogForum-optContainer">
            <!-- 下拉選單 -->
            <select name="blogForum-option">
                <option value="optHigh">依熱門排列</option>
                <option value="optNew">依時間排列</option>
            </select>
        </div>
     <div id="scene4">
        <div data-depth="1" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
    </div>
        <script>
            parallaxInstance = new Parallax( document.getElementById( "scene4" ));
        </script>

        <!-- 瀑布文章 -->
        <div id="container">
            <div class="blog-item">
                <div class="blog-img">
                   <a href="blogContent.html"><img src="images/event/Best-Survival-Schools.jpg" alt="手札圖片"></a>
                </div>
                
                <div class="blog-info">
                    <div class="blog-author">
                       <img src="images/blog/big_head1.png" alt="大頭照">
                       <span class="authorName">董董</span>
                    </div>  
                     <span class="blogDate">2019-04-09</span>
                </div>
                
                <div class="blog-name">
                    <a href="blogContent.html"><h2>原來山泉水這麼甜!!</h2></a>
                </div>
                
                <!-- event -->
                <div class="event-wrap">
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>生火術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>淨水術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                </div>
               
                <div class="blog-item-btnContainer">
                    <div class="blogLikeBtn">
                       <img src="images/blog/愛心.png" alt="like">
                       <span class="likeNum" id="likeNum">100</span> 
                    </div>
                    <div class="blogCommentBtn">
                      <img src="images/blog/留言.png" alt="comment">
                      <span class="commNum" id="commNum">100</span>  
                    </div>
                </div>
            </div>

            <div class="blog-item">
                <div class="blog-img">
                    <img src="images/event/Best-Survival-Schools.jpg" alt="手札圖片">
                </div>
                
                <div class="blog-info">
                    <div class="blog-author">
                       <img src="images/event/Best-Survival-Schools.jpg" alt="大頭照">
                       <span class="authorName">sam</span>
                    </div>  
                     <span class="blogDate">2019-04-09</span>
                </div>

                <div class="blog-name">
                    <h2>手札名稱</h2>
                </div>
                
                <!-- event -->
                <div class="event-wrap">
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>生火術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>淨水術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                </div>
               
                <div class="blog-item-btnContainer">
                    <div class="blogLikeBtn">
                       <img src="images/blog/愛心.png" alt="like">
                       <span class="likeNum" id="likeNum">100</span> 
                    </div>
                    <div class="blogCommentBtn">
                      <img src="images/blog/留言.png" alt="comment">
                      <span class="commNum" id="commNum">100</span>  
                    </div>
                </div>
            </div>

            <div class="blog-item">
                <div class="blog-img">
                    <img src="images/event/Best-Survival-Schools.jpg" alt="手札圖片">
                </div>
                
                <div class="blog-info">
                    <div class="blog-author">
                       <img src="images/event/Best-Survival-Schools.jpg" alt="大頭照">
                       <span class="authorName">sam</span>
                    </div>  
                     <span class="blogDate">2019-04-09</span>
                </div>

                <div class="blog-name">
                    <h2>手札名稱</h2>
                </div>
                
                <!-- event -->
                <div class="event-wrap">
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>生火術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>淨水術</h3>
                     </div>
                    
                </div>
               
                <div class="blog-item-btnContainer">
                    <div class="blogLikeBtn">
                       <img src="images/blog/愛心.png" alt="like">
                       <span class="likeNum" id="likeNum">100</span> 
                    </div>
                    <div class="blogCommentBtn">
                      <img src="images/blog/留言.png" alt="comment">
                      <span class="commNum" id="commNum">100</span>  
                    </div>
                    
                </div>
            </div>

            <div class="blog-item">
                <div class="blog-img">
                    <img src="images/event/Best-Survival-Schools.jpg" alt="手札圖片">
                </div>
                
                <div class="blog-info">
                    <div class="blog-author">
                       <img src="images/event/Best-Survival-Schools.jpg" alt="大頭照">
                       <span class="authorName">sam</span>
                    </div>  
                     <span class="blogDate">2019-04-09</span>
                </div>

                <div class="blog-name">
                    <h2>手札名稱</h2>
                </div>
                
                <!-- event -->
                <div class="event-wrap">
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>生火術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>淨水術</h3>
                     </div>
                     <div class="event-item">
                        <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="活動圖片">
                        <h3>基本求生</h3>
                     </div>
                </div>
               
                <div class="blog-item-btnContainer">
                    <div class="blogLikeBtn">
                       <img src="images/blog/愛心.png" alt="like">
                       <span class="likeNum" id="likeNum">100</span> 
                    </div>
                    <div class="blogCommentBtn">
                      <img src="images/blog/留言.png" alt="comment">
                      <span class="commNum" id="commNum">100</span>  
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
        // 瀑布流
        $('#container').masonry({
            itemSelector: '.blog-item',
            columnWidth: 0,
            animate:true
        });

        //燈箱
        var copybtn=document.getElementById("copybtn");
    
        copybtn.addEventListener("click",function(){
        
        var copyurl = document.getElementById("copyurl");    
        copyurl.select();    
        document.execCommand("copy");
        document.getElementById("copyok").style.display="inline-block"; 
        
        setTimeout(function(){ document.getElementById("copyok").style.display="none";  }, 3000);
        });

    </script>
    </div>
    
    
<!-- copylink lightbox -->
<div id="copyok">
        <p>複製成功! 3秒後關閉。</p>
</div>
</body>
</html>