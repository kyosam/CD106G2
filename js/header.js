
var show_span=document.getElementById("show_span");
var icon=document.getElementById("icon");
var forester_logo=document.getElementById("forester_logo");
var canvas=document.getElementsByClassName("cloud");


icon.addEventListener("click",function(){
    if(show_span.style.display!="block"){
         show_span.style.display="block";
         show_span.style.animation=" show_span 1s ";
         canvas.style.display="none";
    
    }
    else{
        show_span.style.display="none";
        canvas.style.display="block";
        // show_span.style.animation=" noshow_span 1s ";
        }
    });

window.addEventListener("resize",function(){
    if($(window).width() > 767)
        {   
            show_span.style.display="block";
			canvas.style.display="block";
            // show_span.style.animation=" show_span 1s ";
            // JavaScript here 
            // 當視窗寬度小於767px時執行
        } 
    else{
        show_span.style.display="none";
        // show_span.style.animation=" noshow_span 1s ";
    }

    });

    forester_logo.addEventListener("mouseover",function(){
        forester_logo.src = "images/logo.svg";
    });
    forester_logo.addEventListener("mouseout",function(){            
        forester_logo.src = "images/logo.svg";
    });


// -----------------header雲的動畫--------------------------------------
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
canvas.width = canvas.parentNode.offsetWidth;
canvas.height = canvas.parentNode.offsetHeight;


function cloudResize() {
    //如果浏览器支持requestAnimFrame则使用requestAnimFrame否则使用setTimeout  
    window.requestAnimFrame = (function () {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function (callback) {
                //-----------波浪秒數設定-----------
                window.setTimeout(callback,1);
            };
    })();

    window.onresize = function () {
        canvas.width = canvas.parentNode.offsetWidth;
        canvas.height = canvas.parentNode.offsetHeight;
    }

    //初始角度为0  
    var step = 0;
    //定义三条不同波浪的颜色  
    // var lines = ["rgba(0,222,255, 0.3)",
    //             "rgba(157,192,249, 0.3)",
    //             "rgba(0,168,255, 0.3)"
    //             ];
    var lines = ["#fff",
        "fdfbfb",
        "rgba(235,237,238, 0.5)"

    ];
    if (window.screen.width > 768) {
        function loop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            step++;
            //画3个不同颜色的矩形  
            for (var j = lines.length - 1; j >= 0; j--) {
                ctx.fillStyle = lines[j];
                //每个矩形的角度都不同，每个之间相差45度  
                var angle = (step + j *90) * Math.PI / 180;
                // console.log(angle);
                //-------------波浪幅度設定(原設定50->35)-------------------
                var deltaHeight = Math.sin(angle) *25;
                var deltaHeightRight = Math.cos(angle) * 25;
                ctx.beginPath();
                ctx.moveTo(0, canvas.height / 2.6 + deltaHeight);
                ctx.bezierCurveTo(canvas.width / 2.6, canvas.height / 2.6 + deltaHeight - 30, canvas.width / 2.6, canvas.height / 2.6 + deltaHeightRight - 30, canvas.width, canvas.height / 2.6 + deltaHeightRight);
                ctx.lineTo(canvas.width, canvas.height);
                ctx.lineTo(0, canvas.height);
                ctx.lineTo(0, canvas.height / 2.6 + deltaHeight);
                ctx.closePath();
                ctx.fill();
            }
            requestAnimFrame(loop);
        }
        loop();
    } else {
        function loop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            step++;
            //画3个不同颜色的矩形  
            for (var j = lines.length - 1; j >= 0; j--) {
                ctx.fillStyle = lines[j];
                //每个矩形的角度都不同，每个之间相差45度  
                var angle = (step + j * 110) * Math.PI / 180;
                // console.log(angle);
                //-------------波浪幅度設定(原設定50->35)-------------------
                var deltaHeight = Math.sin(angle) * 7;
                var deltaHeightRight = Math.cos(angle) * 7;
                ctx.beginPath();
                ctx.moveTo(0, canvas.height / 3.5 + deltaHeight);
                ctx.bezierCurveTo(canvas.width / 3.5, canvas.height / 3.5 + deltaHeight - 22, canvas.width / 3.5, canvas.height / 3.5 + deltaHeightRight - 22, canvas.width, canvas.height / 3.5 + deltaHeightRight);
                ctx.lineTo(canvas.width, canvas.height);
                ctx.lineTo(0, canvas.height);
                ctx.lineTo(0, canvas.height / 3.5 + deltaHeight);
                ctx.closePath();
                ctx.fill();
            }
            requestAnimFrame(loop);
        }
        loop();
    }
}

function init4() {
    cloudResize();
    window.addEventListener('resize', cloudResize);
}

window.addEventListener("load", init4);