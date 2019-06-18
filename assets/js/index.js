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
targets:'.start-i',
bottom:20.5,
opacity:1,
});