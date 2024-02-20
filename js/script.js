document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('starfield');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const stars = 2000; // Number of stars, adjust density here
    const starArray = [];
    let speedFactor = 0.005; // Normal speed

    let mouseX = 0;
    let mouseY = 0;

    document.addEventListener('mousemove', function(e) {
        mouseX = (e.clientX / canvas.width) * 2 - 1;
        mouseY = (e.clientY / canvas.height) * 2 - 1;
    });

    // Listen for mouse down and up events to adjust the speed factor
    document.addEventListener('mousedown', function() {
        speedFactor = 0.01; // Increase speed when mouse is clicked
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

    let mouseX = 0, mouseY = 0; // Target positions
    let circleX = 0, circleY = 0; // Current positions of the cursorCircle
    const speed = 0.1; // Control the lag effect, lower value = more lag

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursorDot.style.left = `${mouseX}px`;
        cursorDot.style.top = `${mouseY}px`;
        // No immediate update for cursorCircle here
    });

    function animate() {
        // Calculate the distance to the target position
        const dx = mouseX - circleX;
        const dy = mouseY - circleY;

        // Update the circle position fractionally closer to the target position
        circleX += dx * speed;
        circleY += dy * speed;

        // Apply the updated position to cursorCircle
        cursorCircle.style.left = `${circleX}px`;
        cursorCircle.style.top = `${circleY}px`;

        requestAnimationFrame(animate); // Continue the animation loop
    }

    animate(); // Start the animation loop

    // Scale functions as previously defined
    const scaleCursorCircle = (scale) => {
        cursorCircle.style.transform = `translate(-50%, -50%) scale(${scale})`;
    };

    document.addEventListener('mousedown', () => scaleCursorCircle(2));
    document.addEventListener('mouseup', () => scaleCursorCircle(1));
    document.querySelectorAll('a, button, [onclick], input, textarea').forEach(el => {
        el.addEventListener('mouseenter', () => scaleCursorCircle(2));
        el.addEventListener('mouseleave', () => scaleCursorCircle(1));
    });
});


