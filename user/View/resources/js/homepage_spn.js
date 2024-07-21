function toggleSwiperClass() {
  const swiperContainer = document.querySelector('.swiper-container');
  if (window.innerWidth < 768) {
      swiperContainer.classList.add('mySwiper');
  } else {
      swiperContainer.classList.remove('mySwiper');
  }
}

window.addEventListener('resize', toggleSwiperClass);
window.addEventListener('load', toggleSwiperClass);

var swiper;
function initSwiper() {
  if (window.innerWidth < 768) {
      swiper = new Swiper('.mySwiper', {
          effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
          pagination: {
              el: '.swiper-pagination',
              clickable: true,
          },
      });
  }
}

window.addEventListener('resize', function() {
  if (swiper) swiper.destroy(true, true);
  initSwiper();
});

window.addEventListener('load', initSwiper);
