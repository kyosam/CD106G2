//步驟與上一步,下一步功能
var index = $('.step.active').index('.step'),
stepsCount = $('.step').length,
processCount = $('process_light').length,
first_sun = $('.first_sun'),
prevBtn = $('#pre_btn'),
nextBtn = $('#next_btn');
console.log(index);
console.log(stepsCount);

nextBtn.click(function() {
    if(index == 3){
        index = 3;
    }else{
        index++;
    }

    //暫存訂票
    if(index == 1){
        saveTicket();
    }
    //秀出購票清單
    if(index == 2){
        let tbody = document.getElementById("ticketList");
        let trs = tbody.childNodes;
        let length = trs.length;
        for( let i=length-1; i>=0; i--){
            tbody.removeChild(trs[i]);
        }
        if(parseInt(adultsCount[0]) == 0){
        }else if(parseInt(adultsCount[0]) != 0){
            $('#ticketList').append(`<tr><td>${adultsCount[1]}</td><td>${parseInt(adultsCount[2])}</td><td>${adultsCount[0]}</td><td>${parseInt(adultsCount[0])*parseInt(adultsCount[2])}</td></tr>`);
        }
        if(parseInt(studentCount[0]) == 0){
        }else if(parseInt(studentCount[0]) != 0){
            $('#ticketList').append(`<tr><td>${studentCount[1]}</td><td>${parseInt(studentCount[2])}</td><td>${studentCount[0]}</td><td>${parseInt(studentCount[0])*parseInt(studentCount[2])}</td></tr>`);
        }
        if(parseInt(childCount[0]) == 0){
        }else if(parseInt(childCount[0]) != 0){
            $('#ticketList').append(`<tr><td>${childCount[1]}</td><td>${parseInt(childCount[2])}</td><td>${childCount[0]}</td><td>${parseInt(childCount[0])*parseInt(childCount[2])}</td></tr>`);
        }
        //票券小計
        $('#tkt_total').html(`票券小計：${parseInt(adultsCount[0])*parseInt(adultsCount[2])+parseInt(studentCount[0])*parseInt(studentCount[2])+parseInt(childCount[0])*parseInt(childCount[2])}`);
        
        //判斷有沒有選日期,在顯示
        if(`${oderDate}` == 0){
            $('#entrance_date').html('');
        }else{
            $('#entrance_date').html(`${cyear.innerHTML+ctitle.innerHTML+oderDate}`);
        }

        //活動價錢加總
        var actprice = document.getElementsByClassName('act_price');
        var total =0;
        for( var i=0; i<actprice.length; i++){
            var total =  total + parseInt(actprice[i].innerHTML);
        }
        $('#act_total').html(`活動小計：${total}`);
    }

    if(index == 3){
        var tkt_total = document.getElementById('tkt_total').innerHTML.split('：');
        var act_total = document.getElementById('act_total').innerHTML.split('：');
        var memPoint = document.getElementById('memPoint').innerHTML;
        $('#allTotal').html(`總金額：${parseInt(tkt_total[1])+parseInt(act_total[1])}`);
        $('#sumPayable').html(`應付金額：${parseInt(tkt_total[1])+parseInt(act_total[1])-memPoint/10}`);
    }
    
    console.log(index);
    if($("#next_btn").text() == '送出'){
        checkCredit(); //檢查信用卡資訊
        

    }

    prevBtn.css('display', 'block');
    first_sun.css('display','none');

    if (index < stepsCount) {
        $('.step').removeClass('active').eq(index).addClass('active');
        $('.process_light').removeClass('roll').eq(index).addClass('roll');
    }

    if (index == stepsCount - 1) {
        $(this).text('送出');
        // $('#next_btn').css('display','none');
    }
});


prevBtn.click(function() {
    nextBtn.css('display', 'block');
    console.log(index);
    if (index == 0) {
        $(this).css('display','none');
    }else {
        $('.step').removeClass('active').eq(index-1).addClass('active');
        $('.process_light').removeClass('roll').eq(index-1).addClass('roll');
        index -= 1;
        console.log('pre: ',index);
        if( index == 0 )
        $(this).css('display','none');
        if( index == 0)
        $('.first_sun').css('display','block');
    }
    nextBtn.text('下一步');
});

// 選擇日期
function highLight(e){
    var obj = e.target;
    obj.style.color = '#FF4500';
    obj.style.transition = '.2s';
    obj.style.transform = 'scale(1.2)';
}
function normal(e){
    var obj = e.target;
    obj.style.color= '#8d4a16';
    obj.style.transform = 'scale(1)';
}
// 點擊前後月份刷新註冊
function refreshMonth(){
    selectDate = document.querySelectorAll('li.dark');
    for( var i=0; i<selectDate.length; i++){
        selectDate[i].onmouseover = highLight;
        selectDate[i].onmouseout = normal;
    }
    function highLight(e){
        var obj = e.target;
        obj.style.color = '#FF4500';
        obj.style.transition = '.2s';
        obj.style.transform = 'scale(1.2)';
    }
    function normal(e){
        var obj = e.target;
        obj.style.color= '#8d4a16';
        obj.style.transform = 'scale(1)';
    }
}

// 儲存訂購門票內容
var storage = sessionStorage;

function saveTicket(){
    storage['adults'] = [document.getElementById('t_adults').innerHTML,document.getElementById('t_type_adults').innerHTML,document.getElementById('t_price_adults').innerHTML];
    storage['student'] = [document.getElementById('t_student').innerHTML,document.getElementById('t_type_student').innerHTML,document.getElementById('t_price_student').innerHTML];
    storage['child'] = [document.getElementById('t_child').innerHTML,document.getElementById('t_type_child').innerHTML,document.getElementById('t_price_child').innerHTML];
    adultsCount = storage['adults'].split(',');
    studentCount = storage['student'].split(',');
    childCount = storage['child'].split(',');
}

// 關掉燈箱
$(document).ready(function(){
    $('.close').click(function(){
        $(".light_box_wrap").fadeOut(500);
    });
});

// 檢查信用卡資訊功能
function checkCredit(){
    var cn = document.querySelectorAll('input.credit');
    var Safe_length = document.getElementById('safe').value.length;

    for(i=0;i<cn.length;i++){
        if(cn[i].value.length != 4 || isNaN(cn[i].value)==true){
            alert(cn[i].name.replace('credit',`卡號輸入欄,第${i+1}欄`)+'不正確');
            return;
        }
    }
    if(Safe_length != 3){
        alert('安全碼錯誤');
        return;
    }else{
        $('.light_box_wrap').fadeIn(1000);
    }
}

// 加減票
function addTicket(){
    add_temp = parseInt(this.previousElementSibling.innerHTML);
    // add_temp++;
    // this.previousElementSibling.innerHTML = add_temp;

    if(add_temp <=49){
        add_temp++;
    }else{
        add.disable = true;
    }
    this.previousElementSibling.innerHTML = add_temp;
}
function lessTicket(){
    less_temp = parseInt(this.nextElementSibling.innerHTML);
    if(less_temp >= 1){
        less_temp--;
    }else{
        less.disable = true;
        less_temp = 0;
    }
    this.nextElementSibling.innerHTML = less_temp;
    console.log()
}

// 點不規劃行程
function checkMark(){
    var check = document.getElementById('noPlan');//點擊不規劃行
    var check_x = check.getElementsByClassName('check_x');//所有新生成的span
    // 點擊不規劃，將活動清單內容移除
    var tbody = document.getElementById("testPanel");
    var trs = tbody.childNodes;
    var length = trs.length;
    for( var i=length-1; i>=0; i--){
        tbody.removeChild(trs[i]);
    }
    if( check_x.length == 0){ //一開始沒有標籤為0,會新生成
        var newSpan = document.createElement('span');
        check.appendChild(newSpan).setAttribute('class','check_x');
    }else{
        check.removeChild(check_x[0]);
    }
    if(check_x.length == 1){
        $('.heartBox').css('display','none');
    }
    
}

//點選擇行程
function chooseOne(){
    var check_x = document.getElementsByClassName("check_x");
    var check = document.getElementById('noPlan');
    var myTarget = this.nextElementSibling;
    console.log(this.parentNode.lastElementChild.innerHTML);
    let planlist = this.parentNode.lastElementChild.innerHTML;
    //..................... GET EVENT DATA
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){

    // console.log(xhr.responseText);
    document.getElementById("testPanel").innerHTML = xhr.responseText;
    }
    xhr.open("get", "page/order_ajax.php?planlist=" + planlist);
    xhr.send(null)

    //........................
    $('.heartBox').css('display','none');
    myTarget.style.display = 'block';
    // console.log(check_x.length);
    if( check_x.length != 0){
        check.removeChild(check_x[0]);
        myTarget.style.display = 'block';
    }
}

// 使用紅利點數
function use_point(){
    var memPoint = document.getElementById('memPoint').innerHTML;
    $('#discountPoint').html(`紅利折抵：${memPoint/10}`);
}

function init(){
    less = document.getElementsByClassName('t_less');
    add = document.getElementsByClassName('t_add');
    for(i = 0;i < less.length;i++){
        less[i].addEventListener('click',lessTicket);
        add[i].addEventListener('click',addTicket);
    }
    selectDate = document.querySelectorAll('li.dark');
    for( var i=0; i<selectDate.length; i++){
        selectDate[i].onmouseover = highLight;
        selectDate[i].onmouseout = normal;
    }
    var nextMonth = document.getElementById('next');
    var prevMonth = document.getElementById('prev');
    nextMonth.addEventListener('click',refreshMonth);
    prevMonth.addEventListener('click',refreshMonth);

    var noPlan = document.getElementById('noPlan');//不規劃行程
    noPlan.addEventListener('click',checkMark);
    
    var chooseActs = document.querySelectorAll('.import');//選擇行程按鈕
    var length = chooseActs.length;
    for( var i=0; i<length; i++){
        chooseActs[i].addEventListener('click',chooseOne);
    }

    //使用紅利點數
    document.getElementById('use_point').addEventListener('click',use_point);
}

window.addEventListener('load',init);




$('.owl-carousel').owlCarousel({
    loop:true,
    // margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        1200:{
            items:3
        }
    },
});




// function createXHR() {
//     var xhr = null;
//     if (window.XMLHttpRequest) {
//         xhr = new XMLHttpRequest();
//     }else if (window.ActiveXObject) {
//         xhr = new ActiveXObject('Microsoft.XMLHTTP');
//     }
//     return xhr
// }

// function showList() {
//     xhr = createXHR();  // 建立請求物件
//     if (xhr != null) {
//         var url = "order_ajax.php";
//         // 利用 GET 方法、請求目的地 url、true 為非同步
//         xhr.open("GET", url, true);
//         // 回應處理函式 displayResult，稍後定義
//         // xhr.onreadystatechange = displayResult;
//         xhr.send(null);  // 送出請求（由於為 GET 所以參數為 null）
//     }
// }

// window.onload = showList;













// //撒花
// const TWO_PI = Math.PI * 2;
// const HALF_PI = Math.PI * 0.5;

// // canvas settings
// var viewWidth = 500,
//     viewHeight = 350,
//     drawingCanvas = document.getElementById("drawing_canvas"),
//     ctx,
//     timeStep = (1.5 / 60);

// Point = function (x, y) {
//     this.x = x || 0;
//     this.y = y || 0;
// };

// Particle = function (p0, p1, p2, p3) {
//     this.p0 = p0;
//     this.p1 = p1;
//     this.p2 = p2;
//     this.p3 = p3;

//     this.time = 0;
//     this.duration = 3 + Math.random() * 2;
//     this.color = '#' + Math.floor((Math.random() * 0xffffff)).toString(16);

//     this.w = 8;
//     this.h = 6;

//     this.complete = false;
// };

// Particle.prototype = {
//     update: function () {
//         this.time = Math.min(this.duration, this.time + timeStep);

//         var f = Ease.outCubic(this.time, 0, 1, this.duration);
//         var p = cubeBezier(this.p0, this.p1, this.p2, this.p3, f);

//         var dx = p.x - this.x;
//         var dy = p.y - this.y;

//         this.r = Math.atan2(dy, dx) + HALF_PI;
//         this.sy = Math.sin(Math.PI * f * 10);
//         this.x = p.x;
//         this.y = p.y;

//         this.complete = this.time === this.duration;
//     },
//     draw: function () {
//         ctx.save();
//         ctx.translate(this.x, this.y);
//         ctx.rotate(this.r);
//         ctx.scale(1, this.sy);

//         ctx.fillStyle = this.color;
//         ctx.fillRect(-this.w * 0.5, -this.h * 0.5, this.w, this.h);

//         ctx.restore();
//     }
// };

// Loader = function (x, y) {
//     this.x = x;
//     this.y = y;

//     this.r = 24;
//     this._progress = 0;

//     this.complete = false;
// };

// Loader.prototype = {
//     reset: function () {
//         this._progress = 0;
//         this.complete = false;
//     },
//     set progress(p) {
//         this._progress = p < 0 ? 0 : (p > 1 ? 1 : p);

//         this.complete = this._progress === 1;
//     },
//     get progress() {
//         return this._progress;
//     },
//     draw: function () {
//         ctx.fillStyle = '#000';
//         ctx.beginPath();
//         ctx.arc(this.x, this.y, this.r, -HALF_PI, TWO_PI * this._progress - HALF_PI);
//         ctx.lineTo(this.x, this.y);
//         ctx.closePath();
//         ctx.fill();
//     }
// };

// // pun intended
// Exploader = function (x, y) {
//     this.x = x;
//     this.y = y;

//     this.startRadius = 0;

//     this.time = 0;
//     this.duration = .1;
//     this.progress = 0;

//     this.complete = false;
// };

// Exploader.prototype = {
//     reset: function () {
//         this.time = 0;
//         this.progress = 0;
//         this.complete = false;
//     },
//     update: function () {
//         this.time = Math.min(this.duration, this.time + timeStep);
//         this.progress = Ease.inBack(this.time, 0, 1, this.duration);

//         this.complete = this.time === this.duration;
//     },
//     draw: function () {
//         ctx.fillStyle = '#000';
//         ctx.beginPath();
//         ctx.arc(this.x, this.y, this.startRadius * (1 - this.progress), 0, TWO_PI);
//         ctx.fill();
//     }
// };

// var particles = [],
//     loader,
//     exploader,
//     phase = 0;

// function initDrawingCanvas() {
//     drawingCanvas.width = viewWidth;
//     drawingCanvas.height = viewHeight;
//     ctx = drawingCanvas.getContext('2d');

//     createLoader();
//     createExploader();
//     createParticles();
// }

// function createLoader() {
//     loader = new Loader(viewWidth * 0.5, viewHeight * 0.5);
// }

// function createExploader() {
//     exploader = new Exploader(viewWidth * 0.5, viewHeight * 0.5);
// }

// function createParticles() {
//     for (var i = 0; i < 128; i++) {
//         var p0 = new Point(viewWidth * 0.5, viewHeight * 0.5);
//         var p1 = new Point(Math.random() * viewWidth, Math.random() * viewHeight);
//         var p2 = new Point(Math.random() * viewWidth, Math.random() * viewHeight);
//         var p3 = new Point(Math.random() * viewWidth, viewHeight + 64);

//         particles.push(new Particle(p0, p1, p2, p3));
//     }
// }

// function update() {

//     switch (phase) {
//         case 0:
//             loader.progress += (1 / 45);
//             break;
//         case 1:
//             exploader.update();
//             break;
//         case 2:
//             particles.forEach(function (p) {
//                 p.update();
//             });
//             break;
//     }
// }

// function draw() {
//     ctx.clearRect(0, 0, viewWidth, viewHeight);

//     switch (phase) {
//         case 0:
//             loader.draw();
//             break;
//         case 1:
//             exploader.draw();
//             break;
//         case 2:
//             particles.forEach(function (p) {
//                 p.draw();
//             });
//             break;
//     }
// }

// window.onload = function () {
//     initDrawingCanvas();
//     requestAnimationFrame(loop);
// };

// function loop() {
//     update();
//     draw();

//     if (phase === 0 && loader.complete) {
//         phase = 1;
//     } else if (phase === 1 && exploader.complete) {
//         phase = 2;
//     } else if (phase === 2 && checkParticlesComplete()) {
//         // reset
//         phase = 0;

//         exploader.reset();
//         particles.length = 0;
//         createParticles();
//     }

//     requestAnimationFrame(loop);
// }

// function checkParticlesComplete() {
//     for (var i = 0; i < particles.length; i++) {
//         if (particles[i].complete === false) return false;
//     }
//     return true;
// }

// // math and stuff

// /**
//  * easing equations from http://gizma.com/easing/
//  * t = current time
//  * b = start value
//  * c = delta value
//  * d = duration
//  */
// var Ease = {
//     inCubic: function (t, b, c, d) {
//         t /= d;
//         return c * t * t * t + b;
//     },
//     outCubic: function (t, b, c, d) {
//         t /= d;
//         t--;
//         return c * (t * t * t + 1) + b;
//     },
//     inOutCubic: function (t, b, c, d) {
//         t /= d / 2;
//         if (t < 1) return c / 2 * t * t * t + b;
//         t -= 2;
//         return c / 2 * (t * t * t + 2) + b;
//     },
//     inBack: function (t, b, c, d, s) {
//         s = s || 1.70158;
//         return c * (t /= d) * t * ((s + 1) * t - s) + b;
//     }
// };

// function cubeBezier(p0, c0, c1, p1, t) {
//     var p = new Point();
//     var nt = (1 - t);

//     p.x = nt * nt * nt * p0.x + 3 * nt * nt * t * c0.x + 3 * nt * t * t * c1.x + t * t * t * p1.x;
//     p.y = nt * nt * nt * p0.y + 3 * nt * nt * t * c0.y + 3 * nt * t * t * c1.y + t * t * t * p1.y;

//     return p;
// }

