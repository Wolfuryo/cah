window.game=window.game||{};
game.data;
game.users;
game.id;
game.elems={
loader:query('.loader'),
header:{
title:query('.r_title'),
author:query('.r_author'),
},
ulist:query('.game-users'),
}
game.update_rate=10000;
game.requests=0;
game.get=function(){
get('/api/get/'+game.id, function(data){
game.data=data[0];
game.users=data[1];
game.update();
if(game.requests===0){
game.elems.loader.classList.add('loaded');
}
game.requests++;
setTimeout(function(){
game.get();
}, game.update_rate);
});
}
game.init=function(){
game.id=urls.data[1];
game.get();
}
game.update=function(){
game.elems.header.title.innerHTML=game.data.name;
game.elems.header.author.innerHTML=game.data.creator_name;

var len=game.data[1].length, e, us='';
var us='';
for(var i=0;i<len;i++){
if(game.data.creator_name===game.data.names[i]){
us+='<span class="game-player game-master">'+game.users[i].name+'</span>';
} else {
us+='<span class="game-player">'+game.users[i].name+'</span>';
}
}
game.elems.ulist.innerHTML=us;

}
game.init();