window.game=window.game||{};
game.data;
game.users;
game.id;
game.elems={
room:query('.game'),
loader:query('.loader'),
header:{
title:query('.r_title'),
author:query('.r_author'),
},
ulist:query('.game-users'),
join:query('.room-ain [href="#join"]'),
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
game.elems.room.classList.add('game-visible');
}
game.requests++;
setTimeout(function(){
game.get();
}, game.update_rate);
});
}

game.joined=function(){
console.log('joined');
}

game.join=function(){
post('api/game/', {

op:'join',
room:game.id,

}, function(data){
if(data.state){
game.joined();
} else {
alert('There was an error while trying to join the room');
}
})
};

game.events=function(){
if(game.elems.join){

listen(game.elems.join, 'click', this.join());

}
}

game.init=function(){
game.id=urls.data[1];
game.get();
game.events();
}
game.update=function(){
game.elems.header.title.innerHTML=game.data.name;
game.elems.header.author.innerHTML=game.data.creator_name;

var len=game.users.length, e, us='';
var us='';
for(var i=0;i<len;i++){
if(game.data.creator_name===game.users[i].name){
us+='<span class="game-player game-master">'+game.users[i].name+'</span>';
} else {
us+='<span class="game-player">'+game.users[i].name+'</span>';
}
}
game.elems.ulist.innerHTML=us;

}
game.init();