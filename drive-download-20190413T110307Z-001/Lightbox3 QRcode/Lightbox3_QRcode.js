var Lightbox_click=document.getElementById("Lightbox_click");
var Lightbox3_QRcode_close=document.getElementById("Lightbox3_QRcode_close");
Lightbox_click.addEventListener("click",function(){
    document.getElementById("Lightbox3_QRcode").style.display="block";
});
Lightbox3_QRcode_close.addEventListener("click",function(){
    document.getElementById("Lightbox3_QRcode").style.display="none";
});
