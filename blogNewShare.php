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


    
    $eventArr = "";
    $i = 0;
    $event = "";
    $sqlevent = "";
    while($blogNewRow = $blogNew ->fetch(PDO::FETCH_ASSOC)){
?>            
            <div class='blog-item'>
                <div class='blog-img'>
                    <a href='blogContent.php?planNo={$blogHotRow['planNo']}'><img src='images/event/Best-Survival-Schools.jpg'></a>
                </div>
                
                <div class='blog-info'>
                    <div class='blog-author'>
                       <!-- <img src='images/member/{$blogHotRow['memNo']}>/big_head1.png'> -->
                       <span class='authorName'><?php  echo $memId;?></span>
                    </div>  
                     <span class='blogDate'><?php echo $noteDate;?></span>
                </div>
                
                <div class='blog-name'>
                    <a href='blogContent.php?planNo=<?php echo $planNo;?>'><h2><?php echo $noteName;?></h2></a>
                </div>
                
                <!-- event -->
                <div class='event-wrap'>
                <?php
                // $eventArr = explode(',',$blogHotRow['planList']);
                $sqlevent = "select * from `event` where entNo in ({$blogNewRow['planList']})";
                    // $sqlevent = "SELECT * FROM `event` where entNo ={$eventArr[$i]}" ;
                $event = $pdo -> query($sqlevent);
                $event -> bindColumn('entName',$entName);
                $event -> bindColumn('entPhoto',$entPhoto);
                while($event ->fetch(PDO::FETCH_ASSOC)){
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
                       <span class='likeNum' id='likeNum'><?php echo $noteLikeTime;?></span> 
                    </div>
                    <div class='blogCommentBtn'>
                      <img src='images/blog/留言.png' alt='comment'>
                      <span class='commNum' id='commNum'><?php echo $noteMsgTime;?></span>  
                    </div>
                </div>
            </div>
            <?php
            }
            
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>