var key='bgpxyg.GkS-Sg:s-x0tmQfIG4KTO2R';
var instance=null;
function ab(channel, parser=function(e){}){
if(instance===null) instance=new Ably.Realtime(key);

this.channel=instance.channels.get(channel);

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