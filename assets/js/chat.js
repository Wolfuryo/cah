;window.chat={

id:null,
ably:null,

elems:{

form:query('.chat-bar>form'),
input:query('.chat-mbar'),

},

save:function(message){
post('/api/chat', {
message:message,
})
},

send:function(message){
this.ably.send(message);
},

parse:function(message){
if(parseInt(message)===1){
console.log('someone sent a message');
}
},

events:function(){
(function(that){
listen(that.elems.form, 'submit', function(e){
e.preventDefault();
var message=that.elems.input.value;
if(message.length>0){
that.save(message);
that.send('1');
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
}

}

chat.init();