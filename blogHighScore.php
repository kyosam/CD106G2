<?php
    ob_start();
    session_start();

try {
    require_once("connectDb.php");
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


    
        
        while($blogHotRow = $blogHot ->fetch(PDO::FETCH_ASSOC)){
        
        $html="
            <div class='blog-item'>
                <div class='blog-img'>
                    <a href='blogContent.php?planNo={$blogHotRow['planNo']}'><img src='images/event/Best-Survival-Schools.jpg'></a>
                </div>
                
                <div class='blog-info'>
                    <div class='blog-author'>
                       <!-- <img src='images/member/{$blogHotRow['memNo']}>/big_head1.png'> -->
                       <span class='authorName'>{$blogHotRow['memId']}</span>
                    </div>  
                     <span class='blogDate'>{$blogHotRow['noteDate']}</span>
                </div>
                
                <div class='blog-name'>
                    <a href='blogContent.php?planNo={$blogHotRow['planNo']}'><h2>{$blogHotRow['noteName']}</h2></a>
                </div>
                
                <!-- event -->
                <div class='event-wrap'>
                <?php
                $eventArr = explode(',',{$blogHotRow['planList']});
                for($i=0;$i<count($eventArr);$i++){
                    $sqlevent ='SELECT * FROM `event` where entNo =$eventArr[$i]';
                    $event = $pdo -> query($sqlevent);
                    $event -> bindColumn('entName',$entName);
                    $event -> bindColumn('entPhoto',$entPhoto);
                    $event ->fetch(PDO::FETCH_ASSOC)
                ?>
                     <div class='event-item'>
                        <img src='images/event/Basic-Survival-Skills-Every-Man-Should-Know.jpg'>
                        <h3><?php echo $entName;?></h3>
                     </div>
                <?php
                    }
                ?> 
                </div>
               
                <div class='blog-item-btnContainer'>
                    <div class='blogLikeBtn'>
                       <img src='images/blog/愛心.png' alt='like'>
                       <span class='likeNum' id='likeNum'>{$blogHotRow['noteLikeTime']}</span> 
                    </div>
                    <div class='blogCommentBtn'>
                      <img src='images/blog/留言.png' alt='comment'>
                      <span class='commNum' id='commNum'>{$blogHotRow['noteMsgTime']}</span>  
                    </div>
                </div>
            </div>";
            echo $html;
            }
    
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>