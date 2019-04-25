function clickLike(e){
    // alert();
    if(e.target.className == 'like'){
        // alert();
        var photoNo = e.target.id.split("|")[1];
        // console.log(photoNo);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(e){
        if( xhr.readyState == 4){
            if( xhr.status == 200){
                // document.getElementsByClassName("likeNum").innerHTML = xhr.responseText; 
                // console.log(xhr.responseText);
                document.querySelector("#likeNum"+photoNo).innerHTML = xhr.responseText; 
                // likeTime = e.target.nextSibling.innerHTML;
                // likeTime = document.querySelector("#likeNum"+photoNo).innerHTML;
                // addlike = parseInt(likeTime)+1;
                // document.getElementById("likeNum").innerHTML = addlike;
            }
            else{
                alert( xhr.status );
            }
            
        } 
            
    }
            url = "photoDoLike.php?photoNo=" + photoNo;
            xhr.open("Get", url, true);
            xhr.send(null);
    e.target.className ='liked';
    }else{
        var photoNo = e.target.id.split("|")[1]; 
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if( xhr.readyState == 4){
                if( xhr.status == 200){
                    // document.getElementsByClassName("likeNum").innerHTML = xhr.responseText;
                    // likeTime = document.querySelector("#likeNum"+photoNo).innerHTML;
                    // dislike = parseInt(likeTime)-1;
                    // document.getElementById("likeNum").innerHTML = dislike;
                    document.querySelector("#likeNum"+photoNo).innerHTML = xhr.responseText; 
                }
            else{
                alert( xhr.status );
            }
    
            
        }
            
        }
            url = "photoDeletLike.php?photoNo=" + photoNo;
            xhr.open("Get", url, true);
            xhr.send(null);
    e.target.className ='like';
    }
}

//上傳照片前看有沒有登入
function uploadCheck() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
      if (xhr.status == 200) {
          if (xhr.responseText == 'login') {
            document.getElementById("photoUploadArea").display = 'block';
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
function init(){
    var like = document.getElementsByClassName("like");
    for(var i = 0; i < like.length; i++){
        like[i].addEventListener("click",clickLike,false);
    }
    var liked = document.getElementsByClassName("liked");
    for(var i = 0; i < liked.length; i++){
        liked[i].addEventListener("click",clickLike,false);
    }
    //上傳照片
    document.getElementById("uploadCheck").onclick = uploadCheck;
    document.getElementById("upFile").onchange = function(e){
        var file = e.target.files[0];
		var reader = new FileReader();
		reader.onload = function(e){
		document.getElementById("imgPreview").src = reader.result;
		}
		reader.readAsDataURL(file);
    }
}

window.addEventListener("load",init,false);

