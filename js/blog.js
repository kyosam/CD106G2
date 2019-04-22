function $id(id){
    return document.getElementById(id);
}	
//寫手札前看有沒有登入
function checkSession() {
  var xhr = new XMLHttpRequest();
  xhr.onload = function () {
      // alert(xhr.status);
      if (xhr.status == 200) {
          if (xhr.responseText == 'login') {
              window.location.href = 'blogShare.php?addlog=-1';
          } else if (xhr.responseText == 'logout') {
              // alert('未登入');
              // var winLogin = document.querySelector(".memLogin");
              // winLogin.style.display = 'block';
          }
      } else {
          // alert(xhr.status);
      }
  }
  // var url = "session.php";
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
      xhr.open("post", "blogNewShare.php", true);
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
  xhr.open("post", "blogHighScore.php", true);
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
  
  var data;
  xhr.send(data);    
}

//註冊
function init(){
    $id("blogShareBtn").onclick = checkSession;
    $id("HighScore").onclick = sendFormScore;
    $id("NewShare").onclick = sendFormShare;
}
window.addEventListener('load',init);
