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

function findZodiacSign() {
    const birthDate = document.getElementById('birthDate').value;
    const birthday = new Date(birthDate);
    const month = birthday.getMonth() + 1; // Months are zero-based in JavaScript, so January is 0
    const day = birthday.getDate();

    let zodiacSign = '';

    if ((month == 3 && day >= 21) || (month == 4 && day <= 19)) {
        zodiacSign = 'Aries';
    } else if ((month == 4 && day >= 20) || (month == 5 && day <= 20)) {
        zodiacSign = 'Taurus';
    } else if ((month == 5 && day >= 21) || (month == 6 && day <= 20)) {
        zodiacSign = 'Gemini';
    } else if ((month == 6 && day >= 21) || (month == 7 && day <= 22)) {
        zodiacSign = 'Cancer';
    } else if ((month == 7 && day >= 23) || (month == 8 && day <= 22)) {
        zodiacSign = 'Leo';
    } else if ((month == 8 && day >= 23) || (month == 9 && day <= 22)) {
        zodiacSign = 'Virgo';
    } else if ((month == 9 && day >= 23) || (month == 10 && day <= 22)) {
        zodiacSign = 'Libra';
    } else if ((month == 10 && day >= 23) || (month == 11 && day <= 21)) {
        zodiacSign = 'Scorpio';
    } else if ((month == 11 && day >= 22) || (month == 12 && day <= 21)) {
        zodiacSign = 'Sagittarius';
    } else if ((month == 12 && day >= 22) || (month == 1 && day <= 19)) {
        zodiacSign = 'Capricorn';
    } else if ((month == 1 && day >= 20) || (month == 2 && day <= 18)) {
        zodiacSign = 'Aquarius';
    } else if ((month == 2 && day >= 19) || (month == 3 && day <= 20)) {
        zodiacSign = 'Pisces';
    }

    document.getElementById('zodiacSign').innerText = `Your zodiac sign is: ${zodiacSign}`;
}

// cosmos css


