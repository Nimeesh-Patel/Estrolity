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

    const stars = 1500; // Increased density of stars
    const starArray = [];

    // random value assigment

    for (let i = 0; i < stars; i++) {
        starArray.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 2,
            speed: Math.random() * 1.5 + 0.5,
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

// document.addEventListener('mousemove', (e) => {
//     const cursor = document.getElementById('customCursor');
//     const x = e.clientX;
//     const y = e.clientY;
//     cursor.style.left = x + 'px';
//     cursor.style.top = y + 'px';
// });

// // // Example of changing cursor on hover over links or buttons
// document.querySelectorAll('a, button').forEach(el => {
//     el.addEventListener('mouseenter', () => {
//         document.getElementById('customCursor').style.transform = 'translate(-50%, -50%) scale(2)'; // Enlarge cursor
//     });
//     el.addEventListener('mouseleave', () => {
//         document.getElementById('customCursor').style.transform = 'translate(-50%, -50%) scale(1)'; // Reset cursor size
//     });
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const customCursor = document.getElementById('customCursor');

//     document.addEventListener('mousemove', e => {
//         // Update the position of the custom cursor container
//         customCursor.style.left = e.clientX + 'px';
//         customCursor.style.top = e.clientY + 'px';
//     });

//     document.addEventListener('mousedown', () => {
//         // Enlarge the cursor on click
//         customCursor.style.transform = 'translate(-50%, -50%) scale(2)';
//     });

//     document.addEventListener('mouseup', () => {
//         // Return to normal size
//         customCursor.style.transform = 'translate(-50%, -50%) scale(1)';
//     });

//     // Add logic for hovering over clickable elements if needed
//     const clickableElements = document.querySelectorAll('a, button, [onclick], input, textarea');
//     clickableElements.forEach(el => {
//         el.addEventListener('mouseover', () => customCursor.classList.add('hover'));
//         el.addEventListener('mouseout', () => customCursor.classList.remove('hover'));
//     });
// });

document.addEventListener('DOMContentLoaded', () => {
    const customCursor = document.getElementById('customCursor');
    

    // Move custom cursor based on real cursor's position
    document.addEventListener('mousemove', (e) => {
        customCursor.style.left = `${e.clientX}px`;
        customCursor.style.top = `${e.clientY}px`;
    });

    // Enlarge the custom cursor on mousedown and return to normal size on mouseup
    document.addEventListener('mousedown', () => {
        customCursor.style.transform = 'translate(-50%, -50%) scale(2)';
    });

    document.addEventListener('mouseup', () => {
        customCursor.style.transform = 'translate(-50%, -50%) scale(1)';
    });

    // Change cursor appearance on hover over clickable elements
    document.querySelectorAll('a, button, [onclick], input, textarea').forEach(el => {
        el.addEventListener('mouseenter', () => {
            customCursor.style.transform = 'translate(-50%, -50%) scale(2)'; // Enlarge cursor
        });
        el.addEventListener('mouseleave', () => {
            customCursor.style.transform = 'translate(-50%, -50%) scale(1)'; // Reset cursor size
        });
    });
});
