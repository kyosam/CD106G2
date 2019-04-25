<?php
    ob_start();
    session_start();

try {
    //先取得memNo
    // $memNo = $_SESSION['memNo'];
    // 下面登入功能寫好要刪掉
    $memNo =1;
    $planNo= $_REQUEST["planNo"];
    require_once("connectDb.php");
    //內容
    $sql = "SELECT * FROM `plan` where memNo = $memNo AND planNo = $planNo";
    $planSelect = $pdo -> prepare($sql);
    $planSelect -> bindColumn("planNo",$planNo);
    $planSelect -> bindColumn("planName",$planName);
    $planSelect -> bindColumn("planPhoto",$planPhoto);
    $planSelect -> bindColumn("planList",$planList);

    $planSelect ->execute();
    while($planSelect ->fetch(PDO::FETCH_ASSOC)){
?>            
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
            <?php
            }
            
} catch (PDOException $e) {
	echo "錯誤 : ", $e -> getMessage(), "<br>";
	echo "行號 : ", $e -> getLine(), "<br>";
}
?>