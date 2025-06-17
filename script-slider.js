
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll('.slide');
    const btns = document.querySelectorAll('.btn');
    let currentIndex = 0;
    let timer;

    function setActiveSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            btns[i].classList.toggle('active', i === index);
        });
        currentIndex = index;
    }

    btns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            setActiveSlide(index);
            resetAutoplay();
        });
    });

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % slides.length;
        setActiveSlide(nextIndex);
    }

    function startAutoplay() {
        timer = setInterval(nextSlide, 5000);
    }

    function resetAutoplay() {
        clearInterval(timer);
        startAutoplay();
    }

    startAutoplay();
});
