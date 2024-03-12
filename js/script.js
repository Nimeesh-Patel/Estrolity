document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('starfield');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const stars = 2000; 
    const starArray = [];
    let speedFactor = 0.005;

    let mouseX = 0;
    let mouseY = 0;

    document.addEventListener('mousemove', function(e) {
        mouseX = (e.clientX / canvas.width) * 2 - 1;
        mouseY = (e.clientY / canvas.height) * 2 - 1;
    });

    // Listen for mouse down and up events to adjust the speed factor
    document.addEventListener('mousedown', function() {
        speedFactor = 0.02; // Increase speed when mouse is clicked
    });

    document.addEventListener('mouseup', function() {
        speedFactor = 0.005; // Return to normal speed when mouse is not clicked
    });

    for (let i = 0; i < stars; i++) {
        // Adjust star initialization to cover a wider area
        starArray.push({
            x: Math.random() * canvas.width - canvas.width / 2, // Spread stars more widely
            y: Math.random() * canvas.height - canvas.height / 2, // Spread stars more widely
            z: Math.random(), // Depth component for speed variation
            size: Math.random() * 1.25, // Adjust star size for better visibility
            opacity: Math.random()
        });
    }

    function drawStars() {
        ctx.fillStyle = "black";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        starArray.forEach(star => {
            star.z -= speedFactor; // Use speedFactor to adjust speed based on mouse click

            if (star.z <= 0) {
                star.x = Math.random() * canvas.width - canvas.width / 2; // Reinitialize off-screen
                star.y = Math.random() * canvas.height - canvas.height / 2; // Reinitialize off-screen
                star.z = 1 + Math.random(); // Ensure stars reset with a depth that varies
                star.size = Math.random() * 1.25; // Reset size for variety
                star.opacity = Math.random(); // Reset opacity for variety
            }

            const perspectiveSize = star.size / star.z;
            let dx = star.x / star.z;
            let dy = star.y / star.z;

            // Adjust dx and dy based on mouse position for dynamic perspective
            dx -= mouseX * 500 * star.z; // Adjust for a subtler perspective shift
            dy -= mouseY * 500 * star.z; // Adjust for a subtler perspective shift

            ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
            ctx.beginPath();
            // Position stars relative to the center of the canvas
            ctx.arc((canvas.width / 2) + dx, (canvas.height / 2) + dy, perspectiveSize, 0, Math.PI * 2);
            ctx.fill();
        });

        requestAnimationFrame(drawStars);
    };

    drawStars();
});

document.addEventListener('DOMContentLoaded', () => {
    const cursorDot = document.getElementById('cursorDot');
    const cursorCircle = document.getElementById('cursorCircle');
    const cursorSvg = document.getElementById('cursorSvg'); // Ensure you have this SVG inside your cursorCircle or elsewhere in HTML
    const cardsContainers = document.querySelectorAll('.cards-container'); // Select all containers

    let mouseX = 0, mouseY = 0; // Mouse position
    let circleX = 0, circleY = 0; // Cursor circle position
    const speed = 0.1; // Movement speed of the cursor circle

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursorDot.style.left = `${mouseX}px`;
        cursorDot.style.top = `${mouseY}px`;
    });

    function animate() {
        const dx = mouseX - circleX;
        const dy = mouseY - circleY;

        circleX += dx * speed;
        circleY += dy * speed;

        cursorCircle.style.left = `${circleX}px`;
        cursorCircle.style.top = `${circleY}px`;
        requestAnimationFrame(animate);

    }

    animate();

    // Adjust cursor appearance for hover over cards and interactive elements
    const adjustCursorForCards = (showSvg) => {
        if (showSvg) {
            cursorCircle.style.display = 'none';
            cursorSvg.style.display = 'block';
            cursorDot.style.transform = 'scale(20)';
            
             // Enlarge dot
        } else {
            cursorCircle.style.display = 'block';
            cursorSvg.style.display = 'none';
            cursorDot.style.transform = `translate(-50%, -50%) scale(1)`; // Reset dot size
        }
    };

        const scaleCursorCircle = (scale) => {
        cursorCircle.style.transform = `translate(-50%, -50%) scale(${scale})`;
    };

    // Apply hover effects to all cards
    cardsContainers.forEach(container => {
        container.addEventListener('mouseenter', () => adjustCursorForCards(true));
        container.addEventListener('mouseleave', () => adjustCursorForCards(false));
    });

    // Interactive elements hover effect
    document.addEventListener('mousedown', () => scaleCursorCircle(2));
    document.addEventListener('mouseup', () => scaleCursorCircle(1));
    document.querySelectorAll('a, button, [onclick], input, textarea').forEach(el => {
        el.addEventListener('mouseenter', () => scaleCursorCircle(2));
        el.addEventListener('mouseleave', () => scaleCursorCircle(1));
    });
});