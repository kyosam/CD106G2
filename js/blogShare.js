function $id(id){
    return document.getElementById(id);
}	

function selectPlan(){
    // event.preventDefault();
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function (){
    if( xhr.readyState == 4){
    if( xhr.status == 200 ){
      document.getElementById("selectPlan").innerHTML = xhr.responseText;  
      
      init();

    }else{
      alert( xhr.status );
    }
  }
}
  url = "selectPlan.php?planNo=" + $id("selectPlanNo").value;
  xhr.open("Get", url, true);
  xhr.send(null);
  console.log($id("selectPlanNo").value); 
  $id("hiddenplanNo").value =$id("selectPlanNo").value;   
};
function saveNote(){
  // alert();
  console.log(document.querySelector("#noteContent").value);
  document.querySelector("#noteContent").value = document.querySelector(".ql-editor").innerHTML;
}


//註冊
function init(){
    $id("selectPlanNo").onchange = selectPlan;
    // $id("selectPlanNo").onchange = changePlan;
    $id("noteSubmitbtn").onclick = saveNote;
}
window.addEventListener('load',init);