// Adapated from the following Processing example:
// https://processing.org/examples/follow3.html
// and the chain example port for Paper.js:
// http://paperjs.org/examples/chain/
var x = [],
  y = [],
  segNum = 25,
  segLength = 35;

for (var i = 0; i < segNum; i++) {
  x[i] = 0;
  y[i] = 0;
}

function setup() {
  var canvas = createCanvas(windowWidth*0.8,windowHeight*0.8);
  canvas.parent("canvasdemo");
  frameRate(60);
  strokeWeight(20);
  stroke(228, 20, 27);
}

function draw() {
  background(255);
  dragSegment(0, mouseX, mouseY);
  for( var i=0; i<x.length-1; i++) {
    dragSegment(i+1, x[i], y[i]);
  }
}

function dragSegment(i, xin, yin) {
  var dx = xin - x[i];
  var dy = yin - y[i];
  var angle = atan2(dy, dx);
  x[i] = xin - cos(angle) * segLength;
  y[i] = yin - sin(angle) * segLength;
  segment(x[i], y[i], angle);
}

function segment(x, y, a) {
  push();
  translate(x, y);
  rotate(a);
  line(0, 0, segLength, 0);
  pop();
}

function windowResized(){
  resizeCanvas(windowWidth, windowHeight);
  background(0,30,50);
}
