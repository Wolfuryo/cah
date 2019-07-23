;window.urls=window.urls||{};
urls.data;
urls.parse=function(){
var url=document.URL;
//break the url in pieces
var pieces=url.split('/');
//remove the first 3 pieces(http(s), " " and the host);
pieces=pieces.rem(0,1,2);
urls.data=pieces;
}
urls.parse();