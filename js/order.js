上一步,下一步功能
var index = $(".step.active").index(".step"),
stepsCount = $(".step").length,
prevBtn = $("#pre_btn"),
nextBtn = $("#next_btn");

prevBtn.click(function() {
    nextBtn.css("display", "block");

    if (index > 0) {
        index--;    
        $(".step").removeClass("active").eq(index).addClass("active");
    };

    if (index === 0) {
        $(this).css("display","none");
    }

    nextBtn.text("下一步");
});

nextBtn.click(function() {
    prevBtn.css("display", "block");

    if (index < stepsCount - 1) {
        index++;
        $(".step").removeClass("active").eq(index).addClass("active");
    };

    if (index === stepsCount - 1) {
        $(this).text("送出");
    }
});


// 檢查信用卡資訊功能
function checkCredit(){
    var cn = document.querySelectorAll('input.credit')

    for(i=0;i<cn.length;i++){
        if(cn[i].value.length != 4){
        alert(cn[i].name.replace("credit",`卡號輸入欄,第${i+1}欄`)+'長度不正確');
        return;
        }
    }
    
    var Safe_length=document.getElementById("safe").value.length;
    
    if(Safe_length != 3){
        alert('安全碼錯誤');
    }
}

function init(){
    var elSubmit = document.getElementById('next_btn');
    elSubmit.addEventListener('click',checkCredit);
}

window.addEventListener('load',init);