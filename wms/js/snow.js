// JavaScript Document
var lyz=lyz||{};
lyz.snow=function(option){
	option=option||{};
	var G=function(id){
		return document.getElementById(id);
	}
	var g=function(id){
		if(typeof id=='string'){
			return G(id);
		}else if(typeof id=='object'){
			return id;
		}
	}
	var snowspeed=[100,80,60,40,20];
	var snowflakes = option.sym||'*';//雪花样式
	var drops = option.num||100;//雪花数目
	var stopdiv = option.stopdiv||null;
	var speed = snowspeed[option.speed]||50;
	var snowflake = new Array(); 
	var x = new Array(); 
	var y = new Array(); 
	var mv = new Array();
	var maxx = document.documentElement.clientWidth;
	var	maxy = document.documentElement.clientHeight;
	for(i = 0; i < drops; i++){
		document.write('<div id="lyz_snow'+i+'" style="position:absolute;color:white;cursor:default">'+snowflakes+'</div>');
		snowflake[i] = G('lyz_snow'+i)
		x[i] = Math.random()*maxx-40;
		y[i] = -Math.random()*maxy;
		snowflake[i].style.left = x[i]+'px';
		snowflake[i].style.top = y[i]+'px';
		mv[i] = (Math.random()*5)+0.5;
		snowflake[i].style.fontSize = ((Math.random()-0.5)*10)+16;
	}
	var startsnow=function(){
		var stopsnow = true;
		for(i=0; i<drops; i++){
			var movex = (Math.random()-0.75)*2.5;
			if(stopdiv){
				if(x[i]<g(stopdiv).offsetLeft||x[i]>g(stopdiv).offsetLeft+g(stopdiv).offsetWidth||y[i]<g(stopdiv).offsetTop-15-window.scrollY||y[i]>g(stopdiv).offsetTop+g(stopdiv).offsetHeight-15-window.scrollY){
					x[i]+=movex;
					y[i]+=mv[i];
					stopsnow = false;
				}
			}else{
				x[i]+=movex;
				y[i]+=mv[i];
				stopsnow = false;
			}//endOfElse
			if(x[i] < 0||x[i]>maxx){
				x[i] = Math.random()*maxx-40;
				y[i] = 10;
			}
			if(y[i] > maxy-40){
				y[i] = 10;
			}
			snowflake[i].style.left = x[i]+'px';
			snowflake[i].style.top = y[i]+document.body.scrollTop+'px';
		}//endOfFor
		if(!stopsnow){
			setTimeout(startsnow,speed);
		}
	}//endOfStartSnow
	startsnow();
}