$(document).ready(function () {
	var urlcompuesta = baseurl+"repoindicadoresanimales/secar";
    $("#iframe-bonis").attr("src",urlcompuesta); 

    $("#secarpreñes").on("click",function(){
    	var urlcompuesta = baseurl+"repoindicadoresanimales/secar";
    	$("#iframe-bonis").attr("src",urlcompuesta); 
    })
    $("#paratacto").on("click",function(){
    	var urlcompuesta = baseurl+"repoindicadoresanimales/tacto";
    	$("#iframe-bonis").attr("src",urlcompuesta); 
    })
    $("#aparir").on("click",function(){
    	var urlcompuesta = baseurl+"repoindicadoresanimales/aparir";
    	$("#iframe-bonis").attr("src",urlcompuesta); 
    })
    $("#repetidoras").on("click",function(){
    	var urlcompuesta = baseurl+"repoindicadoresanimales/repetidoras";
    	$("#iframe-bonis").attr("src",urlcompuesta); 
    })
    $("#indirechazo").on("click",function(){
    	var urlcompuesta = baseurl+"repoindicadoresanimales/indicaciones";
    	$("#iframe-bonis").attr("src",urlcompuesta); 
    })
});