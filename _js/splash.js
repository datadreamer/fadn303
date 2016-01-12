// Aaron Siegel wrote this for FADN303.net. (datadreamer.com 2016)

var points = []
var deadpoints = [];
var connectRadius = 0.25;
var fadeSpeed = 2;
var releaseRate = 50;
var lastRelease = 0;

function setup(){
  var canvas = createCanvas(windowWidth, windowHeight);
  canvas.parent("splash");
  frameRate(60);
  noStroke();
  background(0);
  ellipseMode(CENTER);
  blendMode(SCREEN);
}

function draw(){
  for(var i=0; i<points.length; i++){
    // move and draw current
    points[i].move();
    points[i].draw();
    // check for dead points
    if(points[i].dead){
      deadpoints.push(points[i]);
    }
  }
  // remove the dead points from render list
  for(var n=0; n<deadpoints.length; n++){
    var index = points.indexOf(deadpoints[n]);
    if(index > -1){
      points.splice(index, 1);
    }
  }
  deadpoints = [];
  console.log(points.length);
}

function getColor(pos){
  // returns a color falue
  var r = color(255,0,0);
  var g = color(0,255,0);
  var b = color(0,0,255);
  if(pos >= 0 && pos < 85){ // R to G
    return lerpColor(r, g, (pos / 85));
  } else if(pos >= 85 && pos < 170){  // G to B
    return lerpColor(g, b, ((pos-85) / 85));
  } else {  // B to R
    return lerpColor(b, r, ((pos-170) / 85));
  }
}

function getMouseX(){
  return mouseX / windowWidth;
}

function getMouseY(){
  return mouseY / windowHeight;
}

function mouseMoved(){
  if(millis() - lastRelease > releaseRate){
    points.push(new Point(mouseX, mouseY));
    lastRelease = millis();
  }
}

function windowResized(){
  resizeCanvas(windowWidth, windowHeight);
}


/* CLASSES */

function Point(x, y){
  this.birth = millis();
  this.death = 0;
  this.lifespan = random(1000, 2000);
  this.deathspan = 1000;
  this.dead = false;
  this.dying = false;
  this.x = x;
  this.y = y;
  this.d = random(2, 10);
  this.c = getColor((millis() * 0.01) % 255);
  this.xvec = random(-1,1);
  this.yvec = random(-1,1);
  this.damping = 0.997;
  this.maxalpha = 50;
  this.alpha = this.maxalpha;
  this.angle = 0 - Math.atan2(this.xvec, this.yvec);
}

Point.prototype = {
  constructor: Point,

  draw:function(){
    fill(red(this.c), green(this.c), blue(this.c), this.alpha);
    ellipse(this.x, this.y, this.d, this.d);
  },

  getNormX(){
    return this.x / windowWidth;
  },

  getNormY(){
    return this.y / windowHeight;
  },

  move:function(){
    this.xvec += random(-0.1, 0.1);
    this.yvec += random(-0.1, 0.1);
    this.xvec *= this.damping;
    this.yvec *= this.damping;
    this.angle = 0 - Math.atan2(this.xvec, this.yvec);
    this.x += this.xvec;
    this.y += this.yvec;
    // kill this fucker if it goes outside the window
    if(millis() - this.birth > this.lifespan){
      if(!this.dying){
        this.dying = true;
        this.death = millis();
      }
    }
    // if dying, let it die
    if(this.dying){
      if(this.progress() < 1){
        this.alpha = this.maxalpha - (this.progress() * 255);
      } else {
        this.alpha = 0;
        this.dead = true;
      }
    }
  },

  progress:function(){
    return (millis() - this.death) / this.deathspan;
  }
}
