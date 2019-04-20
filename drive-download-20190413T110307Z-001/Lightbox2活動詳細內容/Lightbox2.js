var Lightbox_click=document.getElementById("Lightbox_click");
var Lightbox2_close=document.getElementById("Lightbox2_close");
Lightbox_click.addEventListener("click",function(){
    document.getElementById("Lightbox2").style.display="block";
});
Lightbox2_close.addEventListener("click",function(){
    document.getElementById("Lightbox2").style.display="none";
});
