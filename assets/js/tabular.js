var tnav=_query('.tab-menu>span');
var tcon=_query('.tab-con>span');
var len=tnav.length;
for(var i=0;i<len;i++){
(function(i){
listen(tnav[i], 'click', function(){
_query('.t-menu-active, .t-active').forEach((elem)=>{
elem.classList.remove('t-menu-active');
elem.classList.remove('t-active');
tnav[i].classList.add('t-menu-active');
tcon[i].classList.add('t-active');
});
})
})(i);
}