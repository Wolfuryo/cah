//returns an array of elements
function _query(e){
this.f=document.querySelectorAll(e);
if(this.f && this.f.length){
return this.f;
} else {
console.log('_query error:'+e);
}
}

//returns a single element
function query(e){
this.f=document.querySelector(e);
if(this.f===null){
console.log('query error:'+e);
} else {
return this.f;
}
}

//listen for an event, then call cback
function listen(element, event, cback){
return element.addEventListener(event, function(e){
cback(e);
});
}