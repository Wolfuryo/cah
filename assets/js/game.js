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
join:query('.room-join'),
start:query('.room-start'),
pre:query('.room-full'),
choices:_query('.choice'),
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

game.choices=[];
game.choice=function(i){

var id=parseInt(game.elems.choices[i].getAttribute('data-id'));
var iid=game.choices.indexOf(id);
if(iid!=-1){
game.choices=game.choices.rem(iid);
game.elems.choices[i].classList.remove('choosen');
} else {

if(iid==-1 && game.choices.length!=2){
game.choices.push(id);
game.elems.choices[i].classList.add('choosen');
}

}

}

game.joined=function(){
console.log('joined');
}

game.join=function(){
post('/api/game/', {

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
listen(game.elems.join, 'click', function(e){
e.preventDefault();
game.join();
});
}

if(game.elems.start){
listen(game.elems.start, 'click', function(e){
post('/api/game', {
op:'start',
room:game.id,
}, function(data){
if(data.state){
game.started();
} else {
alert('There was an error while attempting to start the game');
}
})
})
}

if(game.elems.choices){
var len=game.elems.choices.length, i=0;
for(;i<len;i++){
(function(i){
listen(game.elems.choices[i], 'click', function(){
game.choice(i);
})
})(i);
}
}

}

game.started=function(){
game.elems.pre.remove();
game.elems.choose.classList.add('s-choose');
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