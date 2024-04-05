const canvas = document.getElementById('canvasasmi');
const ctx = canvas.getContext('2d');

// Set canvas size
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Function to draw a star and other drawing functions...


// Function to draw a star
function drawStar(x, y, radius, color) {
    ctx.beginPath();
    ctx.fillStyle = color;
    for (let i = 0; i < 5; i++) {
        ctx.lineTo(Math.cos((18 + i * 72) / 180 * Math.PI) * radius + x,
                    -Math.sin((18 + i * 72) / 180 * Math.PI) * radius + y);
        ctx.lineTo(Math.cos((54 + i * 72) / 180 * Math.PI) * radius / 2 + x,
                    -Math.sin((54 + i * 72) / 180 * Math.PI) * radius / 2 + y);
    }
    ctx.closePath();
    ctx.fill();
}

// Draw stars
function drawStars() {
    const numStars = 1000;
    for (let i = 0; i < numStars; i++) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const radius = Math.random() * 2;
        const brightness = Math.random() * 255;
        drawStar(x, y, radius, `rgb(${brightness},${brightness},${brightness})`);
    }
}

// Draw Orion constellation
function drawOrion() {
    ctx.beginPath();
    ctx.strokeStyle = 'white';
    ctx.moveTo(100, 300);   // Betelgeuse
    ctx.lineTo(200, 400);   // Bellatrix
    ctx.lineTo(300, 300);   // Rigel
    ctx.moveTo(200, 400);   // Bellatrix (double line)
    ctx.lineTo(200, 500);   // Mintaka
    ctx.moveTo(200, 400);   // Bellatrix (double line)
    ctx.lineTo(100, 500);   // Alnilam
    ctx.moveTo(300, 300);   // Rigel (double line)
    ctx.lineTo(400, 400);   // Saiph
    ctx.moveTo(300, 300);   // Rigel (double line)
    ctx.lineTo(300, 400);   // Meissa
    ctx.stroke();
}

function drawTaurus() {
    ctx.beginPath();
    ctx.strokeStyle = 'white';
    ctx.moveTo(500, 300);   
    ctx.lineTo(550, 275);
    ctx.lineTo(600, 250);
    ctx.lineTo(650, 225);
    ctx.moveTo(600, 250); 
    ctx.lineTo(700, 200);
    ctx.moveTo(600, 250); 
    ctx.lineTo(650, 275);
    ctx.stroke();
}


function drawUrsaMajor() {
    ctx.beginPath();
    ctx.strokeStyle = 'white';
    ctx.moveTo(200, 200);   
    ctx.lineTo(250, 250);   
    ctx.lineTo(300, 200);   
    ctx.lineTo(350, 250);   
    ctx.lineTo(400, 200);   
    ctx.lineTo(450, 250);   
    ctx.lineTo(500, 200);   
    ctx.stroke();
}

// Clear canvas and redraw stars and constellations
function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawStars();
    drawOrion();
    drawTaurus();
    drawUrsaMajor();
}

// Initial draw
draw();

// Redraw when window is resized
window.addEventListener('resize', draw);