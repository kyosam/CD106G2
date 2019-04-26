<?php
ob_start();
session_start();
$errMsg = "";
$memNo = 1;

try{
    require_once("page/connect_order.php");
    $sql = "select * from ticket where tktNo = 1";
    $ticket = $pdo->query($sql);
    $sql2 = "select * from ticket where tktNo = 2";
    $ticket2 = $pdo->query($sql2);
    $sql3 = "select * from ticket where tktNo = 3";
    $ticket3 = $pdo->query($sql3);

    $sql4 = "select * from plan where memNo = $memNo";
    $plan = $pdo->query($sql4);

}catch(PDOException $e){
    $errMsg .= "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號" . $e->getLine() . "<br>";
}
echo $errMsg;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/svg_style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/new/favicon.png" />
    <script src="js/parallax.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/hbgClick.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/owl.carousel.min.js"></script>


    <title>森存者｜線上訂票</title>
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

    <div class="wrap_bg">
        <div class="cloud1_bg"></div>
        <div class="cloud2_bg"></div>
        <div class="airBalloon"></div>
        <div class="light_box_wrap">
            <div class="light_box">
                <!-- <canvas id="drawing_canvas"></canvas> -->
                <a class="close_link" href="order.php">
                    <div class="close">
                        <img src="images/order/icon-close.png" alt="close">
                    </div>
                </a>
                <h3>訂購完成<br>您預定的QRcode</h3>
                <div class="qr_code">
                    <img src="images/order/QRcode.png" alt="qrcode">
                </div>
                <p>訂單已儲存至會員中心</p>
                <a href="member.html"><p>前往會員中心</p></a>
            </div>
        </div>
        <div class="wrap">
            <!-- 訂購步驟 -->
            <div class="step_group">
                <div class="step_process roll">訂購門票
                    <div class="process_light first_sun">
                        <img src="images/order/sun.png" alt="sun">
                    </div>
                </div>
                <div class="step_process">選擇行程
                    <div class="process_light">
                        <img src="images/order/sun.png" alt="sun">
                    </div>
                </div>
                <div class="step_process">確認資訊
                    <div class="process_light">
                        <img src="images/order/sun.png" alt="sun">
                    </div>
                </div>
                <div class="step_process">付款
                    <div class="process_light">
                        <img src="images/order/sun.png" alt="sun">
                    </div>
                </div>
            </div>
            <!-- <form action=""> -->
                <!-- 訂票門票 -->
                <div id="step1" class="step active order_container">
                    <div class="calendar">
                        <img src="images/order/map_background.png" alt="board">
                        <div class="box">
                            <div class="calender_mon_title">
                                <span id="prev"><i class="fas fa-chevron-left"></i></span>
                                <span id="calendar-year"></span>
                                <span id="calendar-month"></span>
                                <span id="next"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            <div class="body">
                                <div class="light body-list">
                                    <ul>
                                        <li>日</li>
                                        <li>一</li>
                                        <li>二</li>
                                        <li>三</li>
                                        <li>四</li>
                                        <li>五</li>
                                        <li>六</li>
                                    </ul>
                                </div>
                                <div class="dark body-list">
                                    <ul id="days"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ticket">
                        <div class="ticket_group">
                            <div class="t_content">
                                <img src="images/order/ticketBg.png" alt="ticketBg">
                                <div class="t_w">
                                    <div class="t_txt">
                                    <?php
                                        while( $tTitle = $ticket->fetch()){
                                    ?>
                                        <span id="t_type_adults" class="species"><?php echo $tTitle["tktName"]?></span>
                                        <span class="age"><?php echo $tTitle["tktDesc"]?></span>
                                        <span  id="t_price_adults" class="price"><?php echo $tTitle["tktPrice"]?>元</span>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="t_quantity">
                                        <button class="t_less">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="t_adults" class="t_num">0</span>
                                        <button class="t_add">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="t_content">
                                <img src="images/order/ticketBg.png" alt="ticketBg">
                                <div class="t_w">
                                    <?php
                                        while( $tTitle2 = $ticket2->fetch()){
                                    ?>
                                    <div class="t_txt">
                                        <span id="t_type_student" class="species"><?php echo $tTitle2["tktName"]?></span>
                                        <span class="age"><?php echo $tTitle2["tktDesc"]?></span>
                                        <span id="t_price_student" class="price"><?php echo $tTitle2["tktPrice"]?>元</span>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="t_quantity">
                                        <button class="t_less">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="t_student" class="t_num">0</span>
                                        <button class="t_add">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="t_content">
                                <img src="images/order/ticketBg.png" alt="ticketBg">
                                <div class="t_w">
                                    <?php
                                        while( $tTitle3 = $ticket3->fetch()){
                                    ?>
                                    <div class="t_txt">
                                        <span id="t_type_child" class="species"><?php echo $tTitle3["tktName"]?></span>
                                        <span class="age"><?php echo $tTitle3["tktDesc"]?></span>
                                        <span id="t_price_child" class="price"><?php echo $tTitle3["tktPrice"]?>元</span>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="t_quantity">
                                        <button class="t_less">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="t_child" class="t_num">0</span>
                                        <button class="t_add">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- 選擇行程 -->
                <div id="step2" class="step activity_container">
                    <h3>匯入我的行程</h3>
                    <div class="activity_group owl-carousel owl-theme">
                        <?php
                            while( $planRow = $plan->fetch()){
                        ?>
                        <div class="a_item">
                            <div class="item_img">
                                <!-- <img src="images/plan/<?php echo $planRow["planNo"]?>/<?php echo $planRow["planPhoto"]?>" alt="fire"> -->
                                <img src="images/order/Fishing.png" alt="fire">
                            </div>
                            <!-- <h4>形成名稱</h4> -->
                            <h4><?php echo $planRow["planName"]?></h4>
                            <button class="import">選擇</button>
                            <div class="heartBox">
                                <div class="heart"></div>
                            </div>
                            <div class="hidePlanList" id="hidePlanList" style="display:none"><?php echo $planRow["planList"];?></div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="activity_none">
                        <p>
                            <span id="noPlan" class="check">不規劃行程</span>
                        </p>
                    </div>
                </div>
                <!-- 確認資訊 -->
                <div id="step3" class="step confirm_container">
                    <div class="confirm_box">
                        <h3>訂票清單</h3>
                        <div class="confirm">
                            <table>
                                <thead>
                                    <tr>
                                        <th>票總</th>
                                        <th>單價</th>
                                        <th>數量</th>
                                        <th>小計</th>
                                    </tr>
                                </thead>
                                <tbody id="ticketList">
                                </tbody>
                            </table>
                        </div>
                        <span id="tkt_total"></span>
                    </div>
                    <div class="confirm_box">
                        <h3>行程活動清單</h3>
                        <div class="confirm" id="testPanel">
                            <table>
                                <thead>
                                    <tr>
                                        <th>活動</th>
                                        <th>小計</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <tr>
                                        <td>生火術</td>
                                        <td>700</td>
                                    </tr>
                                </tbody> -->
                            </table>
                        </div>
                        <span id="act_total">活動小計：4400</span>
                    </div>
                    <div class="entrance_date">
                        <div class="entrance">入園日期：<span id="entrance_date">2019.04.09</span></div>
                    </div>
                </div>
                <!-- 付款 -->
                <div id="step4" class="step credit_container">
                    <div class="ct_rule">
                        <h3>訂購條款</h3>
                        <p>若於入營前7天退訂，可全額退款。</p>
                        <p>若於入營前3-7天退訂，可半額退款。</p>
                        <p>若於入營前3天內退訂，則是20%退款。</p>
                        <p>若園區暫停營業為天災人禍之因素，無條件全額退款。</p>
                        <div class="ct_rule_check">
                            <label>使用紅利點數折抵
                                <input type="checkbox">
                                <span class="check_mark"></span>
                            </label>
                                <p>您持有的紅利點數為：<span id="memPoint">0</span>點</p>
                                <p>(每10點可折抵1元)</p>
                            <label>我已詳閱並同意購買的條款
                                <input type="checkbox">
                                <span class="check_mark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="ct_credit">
                        <h3>信用卡資訊</h3>
                        <div class="ct_credit_txt">
                            <ul>
                                <li>
                                    <label>
                                        <span>持卡人姓名</span>
                                        <span>
                                            <input type="text" maxlength="15">
                                        </span>
                                    </label>
                                </li>
                                <li>
                                    <label for="">
                                        <span>信用卡卡號</span>
                                        <span id="credit">
                                            <input type="tel" name="credit" maxlength="4" class="credit">
                                            <input type="tel" name="credit" maxlength="4" class="credit">
                                            <input type="tel" name="credit" maxlength="4" class="credit">
                                            <input type="tel" name="credit" maxlength="4" class="credit">
                                        </span>
                                    </label>
                                </li>
                                <li>
                                    <span>到期月/年</span>
                                    <span>
                                        <label for="month">
                                            <select name="month" id="month" class="credit_month" value="0">
                                                <option value="0">月</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>                
                                        </label>
                                        <label for="year">
                                            <select name="year" id="year" class="credit_year" value="0">
                                                <option value="0">年</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                        </label>
                                    </span>
                                </li>
                                <li>
                                    <label for="safe">
                                        <span>安全碼</span>
                                        <span>
                                            <input type="tel" id="safe" maxlength="3">
                                        </span>
                                    </label>
                                </li>
                                <li class="ct_icon">
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                    <i class="fab fa-cc-jcb"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all_total">
                        <span id="allTotal">總金額：1000</span>
                        <span id="point">紅利折抵：22</span>
                        <span id="">應付金額：1111</span>
                    </div>
                </div>
                <div class="btn_group">
                    <div id="pre_btn" style="display:none">上一步</div>
                    <div id="next_btn">下一步</div>
                </div> 
            <!-- </form> -->
        </div>
        <footer>
            <p>Copyright©2019 森存者</p>
        </footer>
    </div>
    <script src="js/calendar.js"></script>
    <script src="js/order.js"></script>
    <script src="js/order_tweenMax.js"></script>
</body>
</html>