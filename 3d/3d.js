var Detector = {
    canvas : !!window.CanvasRenderingContext2D,
    webgl : (function() {
	try {
	    return !!window.WebGLRenderingContext
		    && !!document.createElement('canvas').getContext(
			    'experimental-webgl');
	} catch (e) {
	    return false;
	}
    })(),
    workers : !!window.Worker,
    fileapi : window.File && window.FileReader && window.FileList
	    && window.Blob,
    getWebGLErrorMessage : function() {
	var domElement = document.createElement('div');
	domElement.style.fontFamily = 'monospace';
	domElement.style.fontSize = '13px';
	domElement.style.textAlign = 'center';
	domElement.style.background = '#eee';
	domElement.style.color = '#000';
	domElement.style.padding = '1em';
	domElement.style.width = '475px';
	domElement.style.margin = '5em auto 0';

	if (!this.webgl) {
	    domElement.innerHTML = window.WebGLRenderingContext ? [ 'Sorry, your graphics card doesn\'t support <a href="http://khronos.org/webgl/wiki/Getting_a_WebGL_Implementation">WebGL</a>' ]
		    .join('\n')
		    : [
			    'Sorry, your browser doesn\'t support <a href="http://khronos.org/webgl/wiki/Getting_a_WebGL_Implementation">WebGL</a><br/>',
			    'Please try with',
			    '<a href="http://www.google.com/chrome">Chrome</a>, ',
			    '<a href="http://www.mozilla.com/en-US/firefox/new/">Firefox 4</a> or',
			    '<a href="http://nightly.webkit.org/">Webkit Nightly (Mac)</a>' ]
			    .join('\n');

	}

	return domElement;
    },
    addGetWebGLMessage : function(parameters) {

	var parent, id, domElement;
	parameters = parameters || {};
	parent = parameters.parent !== undefined ? parameters.parent
		: document.body;
	id = parameters.id !== undefined ? parameters.id : 'oldie';

	domElement = Detector.getWebGLErrorMessage();
	domElement.id = id;
	parent.appendChild(domElement);

    }
};

var width = 1000, height = 220;

var camera, scene, renderer;

var folder = "./";

var counterX = 0, counterY = 0, mouseX = 0, mouseY = 0, mouseDown = false, lastMouseX = 0, lastMouseY = 0, velX = 0, velY = 0, mouseClicked = false, targetX = 0, targetY = 0, mouseUpCounter = 0, xMove = 50, yMove = 20, dragExtentX = 200, dragExtentY = 100, renderer, logoObject3D, snowFlakes = [], snowParticles, cdCubes, numImg = new Image(), logoMaterials = [], logoMaterial, animating = false, lightsOn = false;
// pre load numbers
numImg.src = folder + 'numbers.png';
var logoImage = new Image();
// preload logo
logoImage.src = folder + 'logo.png';

window.addEventListener("load", init3D, false);

function init3D() {

    camera = new THREE.PerspectiveCamera(27, width / height, 1, 2000);
    camera.position.z = 280;
    camera.position.y = 20;

    scene = new THREE.Scene();

    scene.add(camera);

    logoObject3D = new THREE.Object3D();

    // make the nice cubey wireframe models - we make a few on top of
    // each other to make them look all glowy :)

    addCube(0x524a55, 0.4, 1);
    addCube(0x524a55, 4, 0.2);
    addCube(0x524a55, 8, 0.2);

    // make the planes with the logo and the faded logos in the background
    makeLogoPlanes();

    // make a plane in the background - it's kinda dark purple to black radial
    // gradient
    makeGradPlane();

    scene.add(logoObject3D);
    logoObject3D.position.y = -6;

    // makeSnow();

    setupRenderer();

    // if(new Date(Date.UTC(2011,11,25,5,0,0)).getTime()>new Date().getTime()){
    // makeClock();
    // } else {
    // countdownFinished();
    // }

    var d = new Date();

    if ((d.getMonth() == 0) && (d.getDate() == 18) && (d.getYear() == 112))
	animating = true;

}

function addCube(lineColour, lineWidth, lineOpacity) {

    var material = new THREE.MeshBasicMaterial({
	color : lineColour,
	wireframe : true,
	wireframeLinewidth : lineWidth,
	opacity : lineOpacity,
	blending : THREE.AdditiveBlending,
	depthTest : false,
	transparent : true
    });

    var cubegeom = new THREE.CubeGeometry(300, 68, 68, 1, 1, 1);

    cube = new THREE.Mesh(cubegeom, material);
    cube.doubleSided = true;
    logoObject3D.add(cube);

}

function makeLogoPlanes() {

    var geom = new THREE.PlaneGeometry(200, 200 * (115 / 460), 2, 1);

    for ( var i = 0; i < (Detector.webgl ? 20 : 3); i++) {

	material = new THREE.MeshBasicMaterial({
	    map : THREE.ImageUtils.loadTexture(folder + 'logo.png'),
	    opacity : (i == 0) ? 0.9 : (i >= 3) ? 0.012 : 0.1,
	    blending : THREE.AdditiveBlending,
	    depthTest : false,
	    transparent : true
	});

	if (i == 1)
	    geom = new THREE.PlaneGeometry(200, 200 * (115 / 460), 1, 1);

	var logo = new THREE.Mesh(geom, material);
	logo.position.z = (i >= 3) ? (i - 2) * 10 : i * -60;
	logo.position.y = -2;

	logoObject3D.add(logo);
	if (i > 0) {
	    logoMaterials.push(material);
	} else {
	    logoMaterial = material;
	}

    }

}

function makeGradPlane() {

    var geom = new THREE.PlaneGeometry(350, 200, 1, 1);
    var gradPlane = new THREE.Mesh(geom, new THREE.MeshBasicMaterial({
	map : THREE.ImageUtils.loadTexture(folder + 'grad6.jpg'),
	blending : THREE.AdditiveBlending,
	depthTest : false,
	transparent : true
    }));

    gradPlane.scale.x = 1.5;
    scene.add(gradPlane);

}

function setupRenderer() {

    if (Detector.webgl) {
	renderer = new THREE.WebGLRenderer({
	    antialias : true,
	    clearColor : 0x040006
	});
	setInterval(loop, 1000 / 30);

    } else if (Detector.canvas) {
	renderer = new THREE.CanvasRenderer({
	    clearColor : 0x040006
	});
	setInterval(loop, 1000 / 20);

    } else {

	// oh super noes! No canvas or WebGL? WTF!? Best just leave it as a jpg
	return;

    }

    renderer.setSize(width, height);

    var imgElement = document.getElementById('bannerimg');
    imgElement.parentNode.replaceChild(renderer.domElement, imgElement);

    var canvas = renderer.domElement;

    canvas.style.background = "#020003";

    var canvas = renderer.domElement;
    window.addEventListener("mousemove", onMouseMove, false);
    canvas.addEventListener("mousedown", onMouseDown, false);
    window.addEventListener("mouseup", onMouseUp, false);

}

//

function loop() {

    var diffX, diffY, speed = 0.5;

    if (mouseDown) {
	targetX = camera.position.x + ((mouseX - lastMouseX) * 0.1);
	targetY = camera.position.y + ((mouseY - lastMouseY) * -0.1);

	if (targetX > dragExtentX)
	    targetX = dragExtentX;
	else if (targetX < -dragExtentX)
	    targetX = -dragExtentX;
	if (targetY > dragExtentY)
	    targetY = dragExtentY;
	else if (targetY < -dragExtentY)
	    targetY = -dragExtentY;

    } else if (!mouseClicked) {
	targetX = Math.sin(counterX) * xMove;
	targetY = Math.cos(counterY) * yMove;

	counterX += 0.012;
	counterY += 0.01;
	speed = 0.01;

    }
    mouseUpCounter++;
    if (mouseUpCounter > 200)
	mouseClicked = false;

    velX *= 0.8;
    velY *= 0.8;

    diffX = (targetX - camera.position.x) * speed;
    diffY = (targetY - camera.position.y) * speed;

    velX += diffX;
    velY += diffY;
    camera.position.x += velX;
    camera.position.y += velY;

    updateSnow();

    if (logoObject3D.targetPosition) {
	var diff = logoObject3D.targetPosition.clone();
	diff.subSelf(logoObject3D.position);
	diff.multiplyScalar(0.2);
	logoObject3D.position.addSelf(diff);

    }

    lastMouseX = mouseX;
    lastMouseY = mouseY;

    if (cdCubes) {
	cdCubes.updateSpin();
    }

    if (document.body.scrollTop > 250 || window.pageYOffset > 250)
	return;
    camera.lookAt(scene.position);

    if (animating) {
	var rnd = Math.random();
	if (rnd < 0.01) {
	    lightsOn = true;
	} else if (rnd > 0.95) {
	    lightsOn = false

	}

	if (lightsOn) {
	    logoMaterial.opacity = Math.random() * 0.3 + 0.5;// Math.random()*0.025;
	} else {
	    logoMaterial.opacity = Math.random() * 0.01 + 0.05;
	}
	// logoMaterials[0].opacity = Math.random()*0.025;
	for ( var i = 0; i < logoMaterials.length; i++) {
	    logoMaterials[i].opacity = logoMaterial.opacity * 0.01;

	}

	// CODE FOR RAY STUFF
	// for(var i = logoMaterials.length-1; i>0;i--) {
	// 			
	// var mat1 = logoMaterials[i];
	// var mat2 = logoMaterials[i-1];
	// mat1.opacity = mat2.opacity;
	// 			
	// mat1.map = mat2.map;
	// }

    }

    renderer.render(scene, camera);
}

function onMouseDown(event) {
    event.preventDefault();
    mouseClicked = true;
    mouseDown = true;
    lastMouseX = mouseX;
    lastMouseY = mouseY;
}

function onMouseUp(event) {
    mouseDown = false;
    mouseUpCounter = 0;

    if (targetX / xMove > 1)
	targetX = xMove;
    else if (targetX / xMove < -1)
	targetX = -xMove;
    if (targetY / yMove > 1)
	targetY = yMove;
    else if (targetY / yMove < -1) {
	targetY = -yMove;
	makeClock();
    }
    counterX = Math.asin(targetX / xMove);
    counterY = Math.acos(targetY / yMove);

}
function onMouseMove(event) {
    var canvas = renderer.domElement;
    // if(event.offsetX){
    // mouseX = event.offsetX;
    // mouseY = event.offsetY;
    // } else {
    // for browsers that don't support offsetX and offsetY (Fx)
    mouseX = event.pageX - canvas.offsetLeft;
    mouseY = event.pageY - canvas.offsetTop;
    // }

    mouseX -= (width / 2);
    mouseY -= (height / 2);

}

function makeClock() {

    if (cdCubes)
	return;

    logoObject3D.targetPosition = logoObject3D.position.clone();
    logoObject3D.targetPosition.y = 20;
    cdCubes = new CountDownCubes();
    scene.add(cdCubes);

    cdCubes.startTicking();
    cdCubes.position.y = -40;

}

function makeSnow() {

    if (Detector.webgl) {

	var geometry = new THREE.Geometry();

	for (i = 0; i < 600; i++) {

	    vector = new THREE.Vector3(Math.random() * 600 - 300,
		    Math.random() * 1200 + 80, Math.random() * 500 - 300);

	    var vertex = new THREE.Vertex(vector);

	    geometry.vertices.push(vertex);

	    snowFlakes.push({
		vertex : vertex,
		velX : Math.random() - 0.5,
		velY : Math.random() * -0.8 - 0.5,
		landed : false
	    });

	}

	var material = new THREE.ParticleBasicMaterial({
	    size : 15,
	    blending : THREE.AdditiveBlending,
	    depthTest : false,
	    transparent : true,
	    map : THREE.ImageUtils.loadTexture(folder + 'snowparticle.png')
	});

	snowParticles = new THREE.ParticleSystem(geometry, material);
	scene.add(snowParticles);
	snowParticles.sortParticles = false;
    } else {

	var program = function(c) {

	    c.save();

	    c.rotate(Math.PI / 4);
	    c.beginPath();
	    c.moveTo(0, -1);
	    c.lineTo(0.7, -0.7);
	    c.lineTo(1, 0);
	    c.lineTo(0.7, 0.7);
	    c.lineTo(0, 1);
	    c.lineTo(-0.7, 0.7);
	    c.lineTo(-1, 0);
	    c.lineTo(-0.7, -0.7);
	    c.closePath();
	    c.fill();

	    c.restore();

	};

	for ( var i = 0; i < 200; i++) {

	    particle = new THREE.Particle(new THREE.ParticleCanvasMaterial({
		color : 0xffccee,
		program : program,
		depthTest : false,
		transparent : true,
		blending : THREE.AdditiveBlending
	    }));
	    particle.position.x = Math.random() * 600 - 300;
	    particle.position.y = Math.random() * 400 + 80;
	    particle.position.z = Math.random() * 400 - 200;
	    particle.scale.x = particle.scale.y = 1;
	    scene.add(particle);

	    snowFlakes.push({
		vertex : particle,
		velX : Math.random() - 0.5,
		velY : Math.random() * -0.8 - 0.5,
		landed : false
	    });

	}

    }

}

function updateSnow() {

    var wind = mouseX * -0.002;
    var top = 35 + logoObject3D.position.y;

    for ( var i = 0; i < snowFlakes.length; i++) {
	var flakeData = snowFlakes[i];
	var vertex = flakeData.vertex;
	if (!flakeData.landed) {
	    with (vertex.position) {

		if (Detector.webgl && (y > top) && (y + flakeData.velY < top)
			&& (x > -150) && (x < 150) && (z > -34) && (z < 34)) {
		    flakeData.landed = true;
		    y = top;

		} else {

		    y += flakeData.velY;
		    x += flakeData.velX + wind;
		    if (x > 300)
			x -= 600;
		    else if (x < -300)
			x += 600;
		    if (y < -200) {
			y = 200;
			x = Math.random() * 600 - 300;
			z = Math.random() * 500 - 300;
		    }
		}
	    }
	} else {
	    vertex.position.y = top;
	}

    }
    if (snowParticles) {
	snowParticles.geometry.__dirtyVertices = true;
    }
}

function countdownFinished() {
    setTimeout(function() {
	logoObject3D.targetPosition.y = -6;
    }, 1000);
    animating = true;
}

CountDownCubes = function() {

    THREE.Object3D.call(this);

    this.finished = false;
    var cubeHours10 = this.cubeHours10 = new CountDownCube(3), cubeHours1 = this.cubeHours1 = new CountDownCube(), cubeMins10 = this.cubeMins10 = new CountDownCube(
	    6), cubeMins1 = this.cubeMins1 = new CountDownCube(), cubeSecs10 = this.cubeSecs10 = new CountDownCube(
	    6), cubeSecs1 = this.cubeSecs1 = new CountDownCube();

    this.allCubes = new Array();
    this.allCubes.push(cubeHours10, cubeHours1, cubeMins10, cubeMins1,
	    cubeSecs10, cubeSecs1);

    this.add(cubeHours10);
    this.add(cubeHours1);
    this.add(cubeMins10);
    this.add(cubeMins1);
    this.add(cubeSecs10);
    this.add(cubeSecs1);

    var cubewidth = 40, numberGap = 10;

    for ( var i = 0; i < this.allCubes.length; i++) {
	var cube = this.allCubes[i];
	cube.position.x = i * cubewidth
		- ((this.allCubes.length - 1) * cubewidth / 2);
	if (i % 2 == 1)
	    cube.position.x -= 5;
	setInterval(function(e) {
	    e.grow = true;
	}, i * 80, cube);

    }

};

CountDownCubes.prototype = new THREE.Object3D();
CountDownCubes.prototype.constructor = CountDownCubes;
CountDownCubes.prototype.startTicking = function() {
    this.intervalID = setInterval(function(e) {
	e.updateCountDown.call(e);
    }, 1000, this);
};
CountDownCubes.prototype.updateCountDown = function() {

    dateNow = new Date(); // grab current date

    if (this.targetDate) {
	if (!this.finished) {
	    // amount = this.targetDate.getTime() - (dateNow.getTime() -
	    // (dateNow.getTimezoneOffset() * 60000));
	    amount = this.targetDate.getTime() - (dateNow.getTime());
	    if (amount < 0) {
		amount = 0;

		for ( var i = 0; i < this.allCubes.length; i++) {
		    var cube = this.allCubes[i];
		    setInterval(function(e) {
			e.targetScale = 0;
		    }, i * 80, cube);

		}

		countdownFinished();
		this.finished = true;
	    }
	}
    } else {

	amount = dateNow.getTime() - (dateNow.getTimezoneOffset() * 60000); // calc
	// milliseconds
	// between
	// dates
	delete dateNow;
    }

    var days = 0, hours = 0, mins = 0, secs = 0;

    amount = Math.floor(amount / 1000);// kill the "milliseconds" so just secs

    days = Math.floor(amount / 86400);// days
    amount = amount % 86400;

    hours = (Math.floor(amount / 3600));// hours
    amount = amount % 3600;

    mins = Math.floor(amount / 60);// minutes
    amount = amount % 60;

    secs = Math.floor(amount);// seconds

    if (secs < 10) {
	this.cubeSecs10.setNum(0);
	this.cubeSecs1.setNum(secs);
    } else {
	secs = secs.toString();
	this.cubeSecs10.setNum(secs.charAt(0));
	this.cubeSecs1.setNum(secs.charAt(1));
    }

    if (mins < 10) {
	this.cubeMins10.setNum(0);
	this.cubeMins1.setNum(mins);
    } else {
	mins = mins.toString();
	this.cubeMins10.setNum(mins.charAt(0));
	this.cubeMins1.setNum(mins.charAt(1));
    }

    if (hours < 10) {
	this.cubeHours10.setNum(0);
	this.cubeHours1.setNum(hours);
    } else {
	hours = hours.toString();
	this.cubeHours10.setNum(hours.charAt(0));
	this.cubeHours1.setNum(hours.charAt(1));
    }
};
CountDownCubes.prototype.updateSpin = function() {

    for ( var i = 0; i < this.allCubes.length; i++) {
	this.allCubes[i].updateSpin();

    }

};

CountDownCube = function(numSides) {

    if (!numSides)
	numSides = 10;

    var lineColour = 0x524a55, lineOpacity = 0.4, lineWidth = 2;

    this.targetRotX = 0;
    this.currentRotX = 0;
    this.rotVel = 0;
    this.currentNum = 0;
    this.numSides = numSides;

    this.targetScale = 1;

    THREE.Object3D.call(this);

    var material = new THREE.MeshBasicMaterial({
	color : lineColour,
	wireframe : true,
	wireframeLinewidth : lineWidth,
	opacity : lineOpacity,
	blending : THREE.AdditiveBlending,
	depthTest : false,
	transparent : true
    });

    var cubegeom = new THREE.CubeGeometry(25, 30, 30, 1, 1, 1);

    var cube = this.cube = new THREE.Mesh(cubegeom, material);
    cube.doubleSided = true;
    this.add(cube);

    var material = new THREE.MeshBasicMaterial({
	color : lineColour,
	wireframe : true,
	wireframeLinewidth : lineWidth * 3,
	opacity : lineOpacity * 0.5,
	blending : THREE.AdditiveBlending,
	depthTest : false,
	transparent : true
    });

    var cube = this.cube = new THREE.Mesh(cubegeom, material);
    cube.doubleSided = true;
    this.add(cube);

    var material = new THREE.MeshBasicMaterial({
	map : THREE.ImageUtils.loadTexture(folder + 'numbers.png'),
	blending : THREE.AdditiveBlending,
	depthTest : false,
	transparent : true
    });

    this.numbers = new Array();

    for ( var i = -1; i < numSides + 1; i++) {

	var planeContainer = new THREE.Object3D();
	var planeGeom = new THREE.PlaneGeometry(30, 30, 1, 1);
	var plane = new THREE.Mesh(planeGeom, material);
	plane.position.z = 15;
	planeContainer.add(plane);
	planeContainer.rotation.x = i * -Math.PI / 2;

	this.add(planeContainer);

	var uvs = planeGeom.faceVertexUvs[0][0];
	for ( var j = 0; j < uvs.length; j++) {
	    var uv = uvs[j];
	    uvs[j].u = (((i < 0) ? i + numSides : (i % numSides)) * 0.1)
		    + (uvs[j].u * 0.1);

	}
	this.numbers.push(plane);

    }

    this.scale.set(0.01, 0.01, 0.01);
};

CountDownCube.prototype = new THREE.Object3D();
CountDownCube.prototype.constructor = CountDownCube;
CountDownCube.prototype.updateSpin = function() {

    this.rotVel *= 0.65;

    this.rotVel += (this.targetRotX - this.currentRotX) * 0.2;
    this.currentRotX += this.rotVel;

    this.rotation.x = this.currentRotX;

    for ( var i = 0; i < this.numbers.length; i++) {
	var plane = this.numbers[i];
	var rot = (plane.parent.rotation.x + this.currentRotX);

	// if(i==0) console.log(plane.parent.rotation.x , this.currentRotX);
	// if((i==0))rot=0;//(Math.PI*5);
	if ((rot < 2) && (rot > -2))
	    plane.visible = true;
	else
	    plane.visible = false;

    }

    if (this.scale.x != this.targetScale) {
	var diff = (this.targetScale - this.scale.x) * 0.2;
	if (Math.abs(diff) < 0.001)
	    this.scale
		    .set(this.targetScale, this.targetScale, this.targetScale);
	else
	    this.scale.addSelf(new THREE.Vector3(diff, diff, diff));
    }

};

CountDownCube.prototype.setNum = function(num) {
    // console.log(num);
    this.targetRotX = num * Math.PI / 2;

    // for a clock counting down change this :
    if (this.currentNum > num)
	this.currentRotX -= ((Math.PI / 2) * this.numSides);
    // if(this.currentNum<num)
    // this.currentRotX += ((Math.PI/2)*this.numSides);

    this.currentNum = num;

};
