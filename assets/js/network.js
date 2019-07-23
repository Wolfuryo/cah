function get(url, cback, type='json'){
fetch(url).then(response=>{
if(type==='json'){
return response.json();
}
}).then(data=>{
cback(data);
}).catch(function() {
console.log('error loading '.$url); //to do:actually log this error
});
}