document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('starfield');
    const ctx = canvas.getContext('2d');

    // Remove references to 'starfield-container' as it's no longer used
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas(); // Call initially to set canvas size.

    let mouseX = window.innerWidth / 2; // Center by default
    let mouseY = window.innerHeight / 2; // Center by default

    const stars = 1000; // Increased density of stars
    const starArray = [];

    // random value assigment

    for (let i = 0; i < stars; i++) {
        starArray.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 1.5,
            speed: Math.random() * 0.5 + 0.5,
            opacity: Math.random()
        });
    }

    document.addEventListener('mousemove', function(e) {
        const rect = canvas.getBoundingClientRect();
        mouseX = e.clientX - rect.left;
        mouseY = e.clientY - rect.top;
    });

    function drawStars() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        starArray.forEach(star => {
            let dx = star.x - mouseX;
            let dy = star.y - mouseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            let forceDirection = distance < 50 ? -1 : 1; // Influence radius of the mouse

            // Move stars based on mouse position
            star.x += (dx / distance) * star.speed * forceDirection;
            star.y += (dy / distance) * star.speed * forceDirection;

            // Draw each star
            ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
            ctx.fill();

            // Reset star position if it moves off canvas
            if (star.x < 0 || star.x > canvas.width || star.y < 0 || star.y > canvas.height) {
                star.x = Math.random() * canvas.width;
                star.y = Math.random() * canvas.height;
                star.speed = Math.random() * 0.5 + 0.5; // Reset speed and opacity for variety
                star.opacity = Math.random();
            }
        });

        requestAnimationFrame(drawStars);
    }

    drawStars();
});




