var swiper = new Swiper('.main-slide', {
    speed: 600,
    grabCursor: true,
    slidesPerView : "auto",
    spaceBetween: 1000,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".category-slide", {
    effect: "coverflow",
    grabCursor: true,
    speed: 900,
    loop: true,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
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
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".new-product", {
    speed: 1500,
    grabCursor: true,
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        // clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});

var swiper = new Swiper(".pop-up-content", {
  speed: 600,
  effect: "cards",
  grabCursor: true,
  loop: true,
  autoplay: {
      delay: 3000,
      disableOnInteraction: false,
  },
});