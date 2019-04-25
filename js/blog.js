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
//寫手札前看有沒有登入
function checkSession() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
      if (xhr.status == 200) {
          if (xhr.responseText == 'login') {
              window.location.href = 'blogShare.php';
          } else if (xhr.responseText == 'logout') {
              alert('請登入');
          }
      } else {
          alert(xhr.status);
      }
  }
  url = "session.php";
  xhr.open("Get", url, true);
  xhr.send(null);
};
//最新
function sendFormShare(){
    // event.preventDefault();
      var xhr = new XMLHttpRequest();
    //   alert('share');
      xhr.onreadystatechange = function (){
        if( xhr.readyState == 4){
        if( xhr.status == 200 ){
          document.getElementById("container").innerHTML = xhr.responseText;  
        
          //瀑布流
          $('#container').masonry({
            itemSelector: '.blog-item',
            columnWidth: 0,
            animate:true
        });
            
            init();
            // alert('scoreok');

        }else{
          alert( xhr.status );
        }
      }
  }
      xhr.open("post", "blogNewShare.php", false);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      
      var data;
      xhr.send(data);    
    }


//最熱門
function sendFormScore(){
    // event.preventDefault();
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function (){
    if( xhr.readyState == 4){
    if( xhr.status == 200 ){
      document.getElementById("container").innerHTML = xhr.responseText;  
      //瀑布流
    
      $('#container').masonry({
        itemSelector: '.blog-item',
        columnWidth: 0,
        animate:true
    });
      init();
    //   alert('scoreok');

    }else{
      alert( xhr.status );
    }
  }
}
  xhr.open("post", "blogHighScore.php", false);
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
  
  var data;
  xhr.send(data);    
}

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
    $id("blogShareBtn").onclick =checkSession;
    $id("HighScore").onclick = sendFormScore;
    $id("NewShare").onclick = sendFormShare;
}
window.addEventListener('load',init);
