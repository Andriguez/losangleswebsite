const nameLinks = document.querySelectorAll('.name-link');

nameLinks.forEach((link) => {
    const image = link.nextElementSibling;

    if(window.matchMedia("(max-width: 600px)").matches){
        image.src = link.getAttribute('data-image-src');
        image.style.display = 'block';
    } else{
        link.addEventListener('mousemove', (e) => {
            image.src = link.getAttribute('data-image-src');

            const mouseX = e.clientX;
            const mouseY = e.clientY;

            image.style.display = 'block';

            image.style.left = mouseX + 'px';
            image.style.top = mouseY + 'px';

        });

        link.addEventListener('mouseout', (e) => {
            const image = link.nextElementSibling;
            image.style.display = 'none';
        });
    }
});

/*document.addEventListener('DOMContentLoaded', function () {
    const link = document.querySelector('.name-link');
    const hoveredImage = document.getElementById('angle-1');

    link.addEventListener('mousemove', function (event) {
        const mouseX = event.clientX;
        const mouseY = event.clientY;

        hoveredImage.style.display = 'block';

        // Set image position based on the cursor
        hoveredImage.style.left = mouseX + 'px';
        hoveredImage.style.top = mouseY + 'px';
        //hoveredImage.style.transform = `translate(${mouseX}px, ${mouseY}px)`;

        // Display the image
    });

    link.addEventListener('mouseout', function () {
        // Hide the image on mouseout
        hoveredImage.style.display = 'none';
    });
});*/