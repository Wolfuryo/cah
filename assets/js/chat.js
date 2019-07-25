;window.chat={

id:null,
ably:null,

send:function(message){
this.ably.send(message);
},

parse:function(message){

},

init:function(){
this.id=urls.data[1];
this.ably=new ab('chat'+this.id, this.parse);
}

}

chat.init();