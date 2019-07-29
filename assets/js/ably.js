var key='bgpxyg.GkS-Sg:s-x0tmQfIG4KTO2R';
var instance=null;
function ab(channel, parser=function(e){}){
this.instance=new Ably.Realtime(key);

this.channel=this.instance.channels.get(channel);

(function(parser, channel){
channel.subscribe('message', function(message){
parser(message.data);
});
})(parser, this.channel);

this.send=function(message){
this.channel.publish('message', message);
}

return this;

}