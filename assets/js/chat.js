;window.chat={

id:null,
ably:null,
reqs:0,

elems:{
form:query('.chat-bar>form'),
input:query('.chat-mbar'),
body:query('.chat-body'),
loader:query('.mini-loader'),
},

render_message:function(message){
var m=document.createElement('div');
m.classList.add('chat-message');
var n=document.createElement('div');
n.classList.add('chat-uname');
n.innerHTML=message.name;
m.appendChild(n);
var f=document.createElement('div');
f.classList.add('chat-mess');
f.innerHTML=message.message;
m.appendChild(f);
this.elems.body.appendChild(m);
},

messages:[],

render:function(data){
console.log(data);
this.messages=data;
var len=data.length, i=0;
for(;i<len;i++){
this.render_message(data[i]);
}
},

remove_loader:function(){
this.elems.loader.remove();
},

apply:function(data){
console.log(data);
if(chat.reqs===0){
chat.remove_loader();
}
this.reqs++;

//remove the messages that we already have

var _new=[], index=0;
var len=data.length, len2=chat.messages.length;
if(len2===0){
_new=data;
} else {

var tofind=chat.messages[len2-1]; // we take the last message that we know exists and find it in the new array
var found;
//most of the time we only have 1 new message, so it makes sense to start searching from the end
for(var i=len-1;i>=0;i--){

if(tofind.id===data[i].id){
found=i;
break;
}

}

//we send the rest of the messages to render
data.forEach(function(e, i){
if(i>found){
_new[index++]=e;
}

});
};

chat.render(_new);

},

gett:function(){
var url='/api/chat/'+this.id;
(function(apply){
get(url, function(data){
apply(data);
})
})(this.apply);
},

save:function(message){
(function(send){
post('/api/chat', {
message:message,
}, function(e){

if(e===1){
send('1');
}

})
})(this.send);
},

send:function(message){
chat.ably.send(message);
},

parse:function(message){
if(parseInt(message)===1){
chat.gett();
}
},

events:function(){
(function(that){
listen(that.elems.form, 'submit', function(e){
e.preventDefault();
var message=that.elems.input.value;
if(message.length>0){
that.save(message);
} else {

that.elems.form.parentElement.style.background='orangered';
wait(300, function(){
that.elems.form.parentElement.style.background='var(--primary)';
})

}
});
})(this);
},

init:function(){
this.id=urls.data[1];
this.ably=new ab('chat'+this.id, this.parse);
this.events();
this.gett();
}

}

chat.init();