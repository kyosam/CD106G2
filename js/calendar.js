//兩種不同年的年份
var month_olympic = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var month_normal = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var holder = document.getElementById("days");
var prev = document.getElementById("prev");
var next = document.getElementById("next");
var ctitle = document.getElementById("calendar-month");
var cyear = document.getElementById("calendar-year");
var mylist = document.getElementById("days");

var temp;
var my_date = new Date(); //獲取當前時間
var my_year = my_date.getFullYear(); //獲取當前年份
var my_month = my_date.getMonth(); //獲取當前月份
var my_day = my_date.getDate(); //獲取當前日期

//獲取某年某月的某一天是星期幾
function dayStart(month, year) {
  var tmpDate = new Date(year, month, 1);
  return (tmpDate.getDay());
}
//計算是不是閏年（前年份除以4的餘數）
function daysMonth(month, year) {
  var tmp = year % 4;
  if (tmp == 0) {
    return (month_olympic[month]);
  } else {
    return (month_normal[month]);
  }
}

prev.onclick = function (e) {
  e.preventDefault();
  my_month--;
  if (my_month < 0) {
    my_year--;
    my_month = 11;
  }
  refreshDate();
}
next.onclick = function (e) {
  e.preventDefault();
  my_month++;
  if (my_month > 11) {
    my_year++;
    my_month = 0;
  }
  refreshDate();
}

function refreshDate() {
  var str = "";
  var totalDay = daysMonth(my_month, my_year); //獲取該月天數
  var firstDay = dayStart(my_month, my_year); //獲取該月第一天星期幾
  var myclass;
  for (var i = 1; i < firstDay; i++) {
    str += "<li> </li>"; //期使日期之前空白
  }
  for (var i = 1; i <= totalDay; i++) {
    if ((i < my_day && my_year == my_date.getFullYear() && my_month == my_date.getMonth()) || my_year < my_date.getFullYear() || (my_year == my_date.getFullYear() && my_month < my_date.getMonth())) {
      myclass = " class='light'"; //在當日期今天之前，灰色字
    } else if (i == my_day && my_year == my_date.getFullYear() && my_month == my_date.getMonth()) {
      myclass = " class='c_font c_box'"; //當天日期背景顯示

    } else {
      myclass = " class='dark'"; //在當日期今天之後，黑色字
    }

    str += "<li" + myclass + ">" + i + "</li>"; //創建日期節點
  }
  holder.innerHTML = str; //設置日期顯示
  ctitle.innerHTML = month_name[my_month]; //設置英文月份顯示
  cyear.innerHTML = my_year; //設置年份顯示
}
mylist.addEventListener('click',  function(e){
  var tempDate = document.querySelectorAll("#days li");
  
  for (i = 0; i < tempDate.length; i++) {
    if(tempDate[i].className.indexOf("c_font c_box") != -1){
        tempIndex = i;
    }
  }
  if(e.target.className ==='light'||e.target.className ==='c_font c_box'){
    // alert("步行點唷!!!")
    // console.log("HI");
  }
  else{
  tempDate[tempIndex].className ='dark';
  e.target.className ='c_font c_box';
}
  console.log(e.target);
});



// function chooseDate(){
//   var tempDate = document.querySelectorAll("#days li");
  
//   for (i = 0; i < tempDate.length; i++) {
//     if(tempDate[i].className.indexOf("c_font c_box") != -1){
//       tempIndex = i;
//     }
//   }
//   if(e.target.className ==='light'||e.target.className ==='c_font c_box'){
//     // alert("步行點唷!!!")
//     // console.log("HI");
//   }
//   else{
//     tempDate[tempIndex].className ='dark';
//     e.target.className ='c_font c_box';
//   }
// }
// -----------------------------



window.onload = function () {
  refreshDate(); //執行函數
}

// function init(){
//   var nextMonth = document.getElementById('next');
//   var prevMonth = document.getElementById('prev');
//   nextMonth.addEventListener('click',chooseDate);
//   prevMonth.addEventListener('click',chooseDate);
// }
// window.addEventListener("load",init);