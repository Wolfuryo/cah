//array methods
Array.prototype.rem=function(...ids){

var len=this.length, result=[];
for(var i=0;i<len;i++){
if(ids.indexOf(i)===-1) result.push(this[i]);
}

return result;
}