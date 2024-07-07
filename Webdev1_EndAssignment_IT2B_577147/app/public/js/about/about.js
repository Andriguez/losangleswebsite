const nameLinks = document.querySelectorAll('.name-link');

nameLinks.forEach((link) => {
    const image = link.nextElementSibling;

    if(window.matchMedia("(max-width: 850px)").matches){
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