var controller = new ScrollMagic.Controller();

//步驟緩衝出現
var plan_container_staggerFromTo = TweenMax.staggerFromTo('.plan_container_staggerFromTo', 1, {
    y: 0,
    alpha: 0
}, {
    y: 30,
    alpha: 1
}, .2)

var plan_screen = new ScrollMagic.Scene({
        triggerElement: "#desk_plan_div",
        reverse: false,
        offset: 900,
        // triggerHook: 0

    }).setTween(plan_container_staggerFromTo)
    .addIndicators()
    .addTo(controller)


//左樹木出現
TweenMax.to('#head_trunk_left', .3, {
    opacity: 1, 
    top: '26.5%',
    // transformOrigin: '50% 50%', 
    // scale:0, 
    ease: Back.easeOut
},2);

//左樹葉出現
TweenMax.to('#head_tree_left_leaf', .5, {
    opacity: 1, 
    left: '3%',
    // transformOrigin: '50% 50%', 
    ease: Sine.easeOut
},'-=1');

//右樹木出現
TweenMax.to('#head_trunk_right', .4, {
    opacity: 1, 
    right: '8%',
    // transformOrigin: '50% 50%', 
    // scale:0, 
    ease: Cubic.easeOut
},3);

//右樹葉出現
TweenMax.to('#head_tree_right_leaf', .6, {
    opacity: 1, 
    right: '5%',
    // transformOrigin: '50% 50%', 
    // scale:0, 
    ease: Sine.easeOut
},'-=1');
