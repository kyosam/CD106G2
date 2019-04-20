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
    
    console.log(index);
    if($("#next_btn").text() == '送出'){
        checkCredit();
    }

    prevBtn.css('display', 'block');
    first_sun.css('display','none');

    if (index < stepsCount) {
        $('.step').removeClass('active').eq(index).addClass('active');
        $('.process_light').removeClass('roll').eq(index).addClass('roll');
    }

    if (index == stepsCount - 1) {
        $(this).text('送出');
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

var less = document.getElementsByClassName('t_less')[0];
var add = document.getElementsByClassName('t_add')[0];
var t_adults = document.getElementById('t_adults');
var t_student = document.getElementById('t_student');
var t_child = document.getElementById('t_child');

var count = 0;

function addTicket(){
    count = count + 1;
    t_adults.innerHTML = count;
}
function lessTicket(){
    if(count >= 1){
        count--;
    }else{
        less.disable = true;
        count = 0;
    }
    t_adults.innerHTML = count;
}



function init(){
    var less = document.getElementsByClassName('t_less')[0];
    var add = document.getElementsByClassName('t_add')[0];
    less.addEventListener("click",lessTicket);
    add.addEventListener("click",addTicket);
}

window.addEventListener('load',init);


// $('.owl-carousel').owlCarousel({
//     loop:true,
//     // margin:10,
//     nav:true,
//     responsive:{
//         0:{
//             items:1
//         },
//         768:{
//             items:2
//         },
//         1200:{
//             items:3
//         }
//     }
// });






















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

