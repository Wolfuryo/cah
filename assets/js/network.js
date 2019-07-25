function get(url, cback, type='json'){
fetch(url).then(response=>{
if(type==='json'){
return response.json();
}
}).then(data=>{
cback(data);
}).catch(function(error){
console.log(error); //to do:actually log this error
});
}

function post(url, data, cback){
var fdata=new FormData();
Object.keys(data).forEach(function(key){
fdata.append(key, data[key]);
});
fetch(url, {
method:'POST',
body:fdata,
}).then((res)=>res.json())
 .then((response)=>cback(response))
 .catch((err)=>console.log(err))
}