function get(url, type='json'){
fetch(url).then(function(data){
if(type==='json') data.json();
return data;
})
.catch(function() {
console.log('error loading '.$url); //to do:actually log this error
});
}