var choc = 0;
var ix = 0;
function displayChat(){
	document.getElementById("lowerbox").style.display="block";
}
function greetings(){
	alert("Welcome to the 42 network!")
	document.getElementById("lowerbox").style.display="none";
}
function hitHead(){
	let audio = new Audio("resources/Punch.wav");
	audio.play();
}
function guy1(){
	let gb1 = document.getElementById("guy1");
	if (gb1.style.display !== "block")
		gb1.style.display = "block";
	else
		gb1.style.display = "none";
	let ga1 = new Audio("resources/wondering.mp3");
	ga1.play();
}
function guy2(){
	let gb2 = document.getElementById("guy2");
	if (gb2.style.display !== "block")
		gb2.style.display = "block";
	else
		lb1.style.display = "none";
	let ga2 = new Audio("resources/walking.mp3");
	ga2.play();
}
function lady1(){
	let lb1 = document.getElementById("lady1");
	if (lb1.style.display !== "block")
		lb1.style.display = "block";
	else
		lb1.style.display = "none";
	let la1 = new Audio("resources/cold.mp3");
	la1.play();
}
function lady2(){
	let lb2 = document.getElementById("lady2");
	if (lb2.style.display !== "block")
		lb2.style.display = "block";
	else
		lb2.style.display = "none";
	let la2 = new Audio("resources/vole voco she avec moi.mp3");
	la2.play();
}
function take(){
	choc++;
	if (choc > 4)
		alert("too much sugar darling :S !");
	else
		alert("you got " + choc + " candy");
}
function clean(){
	document.getElementById("lowerbox").style.display="none";
	document.getElementById("lady1").style.display="none";
	document.getElementById("lady2").style.display="none";
	document.getElementById("guy1").style.display="none";
	document.getElementById("guy2").style.display="none";
	ix = 0;
}
function sett(){
	if (document.getElementById("settings").style.display !== "block"){
		document.getElementById("settings").style.display = "block";}
	else{
		document.getElementById("settings").style.display = "none";}
}
function look(){
	let mark = document.getElementById("markdown");
	let r_bar = document.getElementById("rightbar");
	let cImg = document.getElementById("centerimg");
	if (mark.style.display !== "flex"){
		cImg.style.display = "none";
		mark.style.display = "flex";
		r_bar.style.marginTop = "-19.5vw";
	}
	else{
		r_bar.style.marginTop = "-63.5vh";
		cImg.style.display = "flex";
		mark.style.display = "none";
		
	}
}
function imgZoom(){
	let zoom = document.getElementById("clust");
	if (zoom.style.width !== "80%")
		zoom.style.width = "80%";
	else
		zoom.style.width = "53%";
}
function move(){
	switch(ix){
		case(0):
			lady1();
			ix++;
			break;
		case(1):
			guy1();
			ix++;
			break;
		case(2):
			lady2();
			ix++;
			break;
		case(3):
			guy2();
			ix++;
			break;
	}
}