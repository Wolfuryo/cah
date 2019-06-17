anime({
targets:'.feat',
opacity:1,
top:0,
easing:'cubicBezier(.5, .05, .1, .3)',
delay:function(el, i, l){
return i*200;
},
});

anime({
targets:'.start-i>a',
skew:'360deg',
loop:true,
delay:5000,
duration:100
})	