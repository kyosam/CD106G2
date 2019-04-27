var total=parseInt(adultsCount[0])*parseInt(adultsCount[2])+parseInt(studentCount[0])*parseInt(studentCount[2])+parseInt(childCount[0])*parseInt(childCount[2]);

var xhr = new XMLHttpRequest();
    xhr.onload = function(){
    let quan= adultsCount[0]+studentCount[0]+childCount[0];   

    // console.log(xhr.responseText);
    document.getElementById("testPanel").innerHTML = xhr.responseText;
    }
    xhr.open("get", "page/order_ajax1.php?planlist=" + planlist+"&total="+total+"&quan="+quan);
    xhr.send(null)