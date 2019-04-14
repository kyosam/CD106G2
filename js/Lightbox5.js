var copybtn=document.getElementById("copybtn");

copybtn.addEventListener("click",function(){
    
    var copyurl = document.getElementById("copyurl");    
    copyurl.select();    
    document.execCommand("copy");
    document.getElementById("copyok").style.display="inline-block"; 
    
    setTimeout(function(){ document.getElementById("copyok").style.display="none";  }, 3000);
});



