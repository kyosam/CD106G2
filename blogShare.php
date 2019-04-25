<?php
    ob_start();
    session_start();

try {
    //先取得memNo
    // $memNo = $_SESSION['memNo'];
    // 下面登入功能寫好要刪掉
    $memNo =1;
    require_once("connectDb.php");
    //內容
    $sql = "SELECT * FROM `plan` where memNo = $memNo";
    $planSelect = $pdo -> prepare($sql);
    $planSelect -> bindColumn("planNo",$planNo);
    $planSelect -> bindColumn("planName",$planName);
    $planSelect -> bindColumn("planPhoto",$planPhoto);
    $planSelect -> bindColumn("planList",$planList);

    $planSelect ->execute();
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
    <link rel="stylesheet" href="css/blogShare.css">
    <!-- <link rel="stylesheet" href="css/svg_style.css"> -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/new/favicon.png" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/hbgClick.js"></script>
    <script src="js/blogShare.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="//cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
    <link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.0.0/quill.bubble.css" rel="stylesheet">
    <title>森存者｜分享手札</title>
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
    <div class="header_title_background"><img src="images/blogShare/title_back_edit.png" alt=""></div> 
    <!-- blog share -->
     <!-- bg fly -->
     <div id="scene2">
        <div data-depth="0.6" class="fly1"><img src="images/blog/drop.png" alt="fly"></div>
    </div>
       <script>
          parallaxInstance = new Parallax( document.getElementById( "scene2" ));
      </script>
    <div class="blogShare">
        <div class="blogShare-board">
            <img src="images/blogShare/edit_blog_paper-01.png" alt="board">
        </div>
        <div class="previewPlan" id="previewPlan">
            <div class="selectPlan">
                <div>選擇你想分享的行程</div>
                    <select name="planNo" id="selectPlanNo" >
                    <?php
                    while($planSelect->fetch(PDO::FETCH_ASSOC)){
                    ?>
                　      <option value="<?php echo $planNo;?>"><?php echo $planName;?></option>
                    <?php
                    } 
                    ?>
                    </select>
            </div>
            <div id="selectPlan">
            <div class="plan-photo">
                <img src="images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg" alt="行程圖片">
                <!-- <img src="images/plan/<?php echo $planNo;?>/*.jpg" alt="行程圖片"> -->
            </div> 
            <!-- event -->
            <div class="event-wrap">
                <?php
                    $sqlevent = "select * from `event` where entNo in ($planList)";
                    $event = $pdo -> query($sqlevent);
                    $event -> bindColumn('entName',$entName);
                    $event -> bindColumn('entPhoto',$entPhoto);
                while($event ->fetch(PDO::FETCH_ASSOC)){
                ?>
                     <div class='event-item'>
                        <img src='images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg'>
                        <!-- <img src="images/event/<?php echo $entName;?>.jpg"> -->
                        <h3><?php echo $entName;?></h3>
                     </div>
                <?php
                }
                ?> 
            </div>
            </div>
        </div>   
        

        <div class="blogSummit">
            <div class="blogSummit-pin">
                <img src="images/pin.png" alt="圖釘">
            </div>
            
                <form action="noteSubmit.php" id="noteform" method="post">
                        <input type="hidden" name="planNo" value="" id="hiddenplanNo">
                        <input type="text" placeholder="輸入你的手札名稱" id="typeBlogName" name="noteName">    
                        <div class="blogTextarea" id="blogTextarea"></div>
                        <textarea name="noteContent" id="noteContent" cols="30" rows="10" style="display:none;"></textarea>
                        <div class="blogShare-btnContainer">
                           <button id="noteSubmitbtn">發布手札</button>
                        </div>
                </form>
              <!-- bg fly -->
                <div id="scene3">
                    <div data-depth="0.2" class="fly1"><img src="images/blog/fly1.gif" alt="蝴蝶"></div>
                </div>
                <script>
                    parallaxInstance = new Parallax( document.getElementById( "scene3" ));
                </script> 
        </div>
    </div>
  
     
</div>
<script>
var quill = new Quill("#blogTextarea", {
			theme: "snow", // 模板
			modules: {
				toolbar: [
					// 工具列列表[註1]
					[{ 'color': [] }],
					[{ 'background': [] }], // 顏色          
					['bold'],
					['italic'],
					['underline'], // 粗體、斜體、底線和刪節線
					[{ 'list': 'ordered' }],
					[{ 'list': 'bullet' }], // 清單
					['image'],
					[{ 'header': [1, 2, 3, 4, 5, 6, false] }],// 標題
				
				]
			}
		})
</script>
</body>
</html>