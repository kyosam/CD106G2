function $id(id){
    return document.getElementById(id);
}
//加入行程前看有沒有登入
function addCheck() {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            if (xhr.responseText == 'login') {
              document.getElementById("addPlanArea").display = 'block';
            } else if (xhr.responseText == 'logout') {
                alert('請登入');
            }
        } else {
            alert(xhr.status);
        }
    }
    url = 'session.php';
    xhr.open("Get", url, true);
    xhr.send(null);
};	

function clickLike(e){
    // alert();
    if(e.target.className == 'like'){
        // alert();
        var planNo = e.target.id.split("|")[1];
        // console.log(photoNo);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(e){
        if( xhr.readyState == 4){
            if( xhr.status == 200){
                document.querySelector("#likeNum"+planNo).innerHTML = xhr.responseText; 
            }
            else{
                alert( xhr.status );
            }
            
        } 
            
    }
            url = "noteDoLike.php?planNo=" + planNo;
            xhr.open("Get", url, true);
            xhr.send(null);
    e.target.className ='liked';
    }else{
        var planNo = e.target.id.split("|")[1]; 
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if( xhr.readyState == 4){
                if( xhr.status == 200){
                    document.querySelector("#likeNum"+planNo).innerHTML = xhr.responseText; 
                }
            else{
                alert( xhr.status );
            }
        }
            
        }
            url = "noteDeletLike.php?planNo=" + planNo;
            xhr.open("Get", url, true);
            xhr.send(null);
    e.target.className ='like';
    }
  }
//註冊
function init(){
    //按讚
    var like = document.getElementsByClassName("like");
      for(var i = 0; i < like.length; i++){
          like[i].addEventListener("click",clickLike,false);
      }
      var liked = document.getElementsByClassName("liked");
      for(var i = 0; i < liked.length; i++){
          liked[i].addEventListener("click",clickLike,false);
      }
      $id("addCheck").onclick = addCheck;
  }
  window.addEventListener('load',init);