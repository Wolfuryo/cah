function get(url, cback, type='json'){
fetch(url).then(response=>{
if(type==='json'){
return response.json();
}
}).then(data=>{
cback(data);
}).catch(function(error) {
console.log(error); //to do:actually log this error
});
}