// 初始化
var controller = new ScrollMagic.Controller();


// 第二屏動畫 start
var tlts1 = new TimelineMax();
tlts1.fromTo('.runningBear', 1, {
    x: '0',
    y: '75vh'
}, {
    x: '80vw',
    y: '75vh'
},0).fromTo('.butterfly', 1, {
    x: '1vw',
    y: '60vh'
}, {
    x: '81vw',
    y: '60vh'
},0);

var scene_s = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    duration: '100%',
    triggerHook: 0,
})
.setPin('.section_pupularEvent')
.setTween(tlts1)
// .addIndicators({
//     name: 'popularPlans'
// })
.addTo(controller);

// 第二屏動畫 end


// 第三屏動畫 start

var tween = TweenLite.to("#dropBear", 1, {bezier:{values:MorphSVGPlugin.pathDataToBezier("m735.99968,113.99982c0,0 -793.99893,229.99969 -525.99929,375.9995c267.99964,145.9998 667.9991,181.99976 517.9993,277.99963c-149.9998,95.99987 -747.999,175.99976 -543.99927,335.99955c203.99973,159.99979 229.99969,187.99975 229.99969,187.99975", {align:"dropBear"}), type:"cubic"}});  

var scene_s = new ScrollMagic.Scene({
    triggerElement: "#trigger_02",
    duration: '220%',
    triggerHook: 0.2,
})
.setTween(tween)
.addIndicators({
    name: 'monthPlans'
})
.addTo(controller);




// function positionTheDot() {

//     // What percentage down the page are we? 
//     var scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);
  
//     // Get path length
//     var path = document.getElementById("theMotionPath");
//     var pathLen = path.getTotalLength();
    
//     // Get the position of a point at <scrollPercentage> along the path.
//     var pt = path.getPointAtLength(scrollPercentage * pathLen);
    
//     // Position the red dot at this point
//     var dot = document.getElementById("dropBear");
//     dot.setAttribute("transform", "translate("+ pt.x + "," + pt.y + ")");
    
//   };
  
//   // Update dot position when we get a scroll event.
//   window.addEventListener("scroll", positionTheDot);
  
//   // Set the initial position of the dot.
//   positionTheDot();

// 第三屏動畫 end
