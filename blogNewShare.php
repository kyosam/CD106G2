<?php
    ob_start();
    session_start();

try {
    require_once("connectDb.php");
    $sqlNewblog = "SELECT * FROM `plan` p LEFT JOIN `member` m ON p.memNo = m.memNo where noteStatus = 1 order by noteDate desc";
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


    
        
        while($blogNewRow = $blogNew ->fetch(PDO::FETCH_ASSOC)){
        
        $html="
            <div class='blog-item'>
                <div class='blog-img'>
                    <a href='blogContent.php?planNo={$blogNewRow['planNo']}'><img src='images/event/Best-Survival-Schools.jpg'></a>
                </div>
                
                <div class='blog-info'>
                    <div class='blog-author'>
                       <!-- <img src='images/member/{$blogNewRow['memNo']}>/big_head1.png'> -->
                       <span class='authorName'>{$blogNewRow['memId']}</span>
                    </div>  
                     <span class='blogDate'>{$blogNewRow['noteDate']}</span>
                </div>
                
                <div class='blog-name'>
                    <a href='blogContent.php?planNo={$blogNewRow['planNo']}'><h2>{$blogNewRow['noteName']}</h2></a>
                </div>
                
                <!-- event -->
                <div class='event-wrap'>
                <?php
                $eventArr = explode(',',{$blogNewRow['planList']});
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
                       <span class='likeNum' id='likeNum'>{$blogNewRow['noteLikeTime']}</span> 
                    </div>
                    <div class='blogCommentBtn'>
                      <img src='images/blog/留言.png' alt='comment'>
                      <span class='commNum' id='commNum'>{$blogNewRow['noteMsgTime']}</span>  
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