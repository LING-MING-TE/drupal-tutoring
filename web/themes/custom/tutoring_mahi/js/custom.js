(function (Drupal, once) {
  'use strict';

  Drupal.behaviors.announcementCarousel = {
    attach: function (context, settings) {
      once('announcement-carousel', '.announcement-carousel-wrapper', context).forEach(function (wrapper) {
        
        const carousel = wrapper.querySelector('.announcement-carousel');
        const items = carousel.querySelectorAll('.carousel-item');
        const prevBtn = wrapper.querySelector('.carousel-control.prev');
        const nextBtn = wrapper.querySelector('.carousel-control.next');
        const indicators = wrapper.querySelectorAll('.carousel-indicators .indicator');
        
        let currentIndex = 0;
        let autoplayInterval = null;

        function goToSlide(index) {
          items[currentIndex].classList.remove('active');
          indicators[currentIndex].classList.remove('active');
          
          currentIndex = index;
          if (currentIndex < 0) currentIndex = items.length - 1;
          if (currentIndex >= items.length) currentIndex = 0;
          
          items[currentIndex].classList.add('active');
          indicators[currentIndex].classList.add('active');
        }

        function nextSlide() {
          console.log('切換到下一張,時間:', new Date().toLocaleTimeString()); // 加這行
          goToSlide(currentIndex + 1);
        }

        function prevSlide() {
          goToSlide(currentIndex - 1);
        }

        function startAutoplay() {
          if (autoplayInterval) {
            clearInterval(autoplayInterval);
          }
          autoplayInterval = setInterval(nextSlide, 5000);
          console.log('自動播放啟動,間隔: 5000ms'); // 加這行
        }

        function stopAutoplay() {
          if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
          }
        }

        if (prevBtn) {
          prevBtn.addEventListener('click', function() {
            prevSlide();
            stopAutoplay();
            startAutoplay();
          });
        }

        if (nextBtn) {
          nextBtn.addEventListener('click', function() {
            nextSlide();
            stopAutoplay();
            startAutoplay();
          });
        }

        indicators.forEach(function(indicator, index) {
          indicator.addEventListener('click', function() {
            goToSlide(index);
            stopAutoplay();
            startAutoplay();
          });
        });

        wrapper.addEventListener('mouseenter', stopAutoplay);
        wrapper.addEventListener('mouseleave', startAutoplay);

        if (items.length > 1) {
          startAutoplay();
        }
      });
    }
  };

})(Drupal, once);