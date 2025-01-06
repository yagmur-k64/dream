document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.slider');
    const navLinks = document.querySelectorAll('.slider-nav a');
    const slides = document.querySelectorAll('.slider img'); // Declare slides globally

    // Update active nav link based on current visible slide
    slider.addEventListener('scroll', () => {
        let activeIndex = 0;

        slides.forEach((slide, index) => {
            const rect = slide.getBoundingClientRect();
            if (rect.left >= 0 && rect.left < window.innerWidth) {
                activeIndex = index;
            }
        });

        navLinks.forEach((link, index) => {
            link.classList.toggle('active', index === activeIndex);
        });
    });

    // Handle click on navigation links
    navLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent the browser from scrolling to the href
            const slideIndex = parseInt(link.getAttribute('data-slide'), 10); // Get the slide index
            slides[slideIndex].scrollIntoView({ behavior: 'smooth' });
        });
    });

});

    const videoWrapper = document.querySelector('.video-wrapper');
    const video = videoWrapper.querySelector('video');
    const playButton = videoWrapper.querySelector('.play-button');

    playButton.addEventListener('click', () => {
        if (video.paused) {
            video.play();
            playButton.style.display = 'none'; // Hide the play button when playing
        } else {
            video.pause();
            playButton.style.display = 'flex'; // Show the play button when paused
        }
    });

    // Show the play button again when the video ends
    video.addEventListener('ended', () => {
        playButton.style.display = 'flex';
    });

