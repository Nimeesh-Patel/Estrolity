document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById('starfield');
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;

    const stars = 1500;
    const starArray = [];

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

    // Correct placement for isMouseDown flag
    let isMouseDown = false;
    document.addEventListener('mousedown', () => {
        isMouseDown = true;
    });

    document.addEventListener('mouseup', () => {
        isMouseDown = false;
    });

    function drawStars() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        starArray.forEach(star => {
            let dx = star.x - mouseX;
            let dy = star.y - mouseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            let forceDirection = isMouseDown ? 5 : 1;

            // Correctly apply forceDirection
            star.x += (dx / distance) * star.speed * forceDirection;
            star.y += (dy / distance) * star.speed * forceDirection;

            ctx.fillStyle = `rgba(255, 255, 255, ${star.opacity})`;
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
            ctx.fill();

            if (star.x < 0 || star.x > canvas.width || star.y < 0 || star.y > canvas.height) {
                star.x = Math.random() * canvas.width;
                star.y = Math.random() * canvas.height;
                star.speed = Math.random() * 1.5 + 0.5;
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

// document.addEventListener('DOMContentLoaded', () => {
//     const cursorDot = document.getElementById('cursorDot');
//     const cursorCircle = document.getElementById('cursorCircle');

//     document.addEventListener('mousemove', (e) => {
//         const x = `${e.clientX}px`;
//         const y = `${e.clientY}px`;
//         cursorDot.style.left = x;
//         cursorDot.style.top = y;
//         cursorCircle.style.left = x;
//         cursorCircle.style.top = y;
//     });

//     const scaleCursorCircle = (scale) => {
//         cursorCircle.style.transform = `translate(-50%, -50%) scale(${scale})`;
//     };

//     document.addEventListener('mousedown', () => scaleCursorCircle(2));
//     document.addEventListener('mouseup', () => scaleCursorCircle(1));
//     document.querySelectorAll('a, button, [onclick], input, textarea').forEach(el => {
//         el.addEventListener('mouseenter', () => scaleCursorCircle(2));
//         el.addEventListener('mouseleave', () => scaleCursorCircle(1));
//     });
// });
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


