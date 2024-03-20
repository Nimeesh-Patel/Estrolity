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
            cursorDot.style.transform = 'scale(10)';
            
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