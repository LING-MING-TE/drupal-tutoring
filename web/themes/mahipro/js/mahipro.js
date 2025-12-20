/* Prepage loader
--------------------------*/
jQuery(window).on('load', function() {
  jQuery(".loader").fadeOut( 'slow' );
});
/* Load jQuery.
--------------------------*/
jQuery(document).ready(function ($) {
  // Mobile menu.
  $('.mobile-menu-icon').click(function () {
    $(this).toggleClass('menu-icon-active');
    $(this).next('.primary-menu-wrapper').toggleClass('active-menu');
  });
  $('.close-mobile-menu').click(function () {
    $(this).closest('.primary-menu-wrapper').toggleClass('active-menu');
    $('.mobile-menu-icon').removeClass('menu-icon-active');
  });

  // Full page search.
  $('.search-icon, .search-box-close').click(function () {
    $('.search-box').toggleClass('active-search');
    return false;
  });

  // Scroll To Top.
  $(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
      $('.scrolltop').css('display', 'flex');
    } else {
      $('.scrolltop').fadeOut('slow');
    }
  });
  $('.scrolltop').click(function () {
    $('html, body').scrollTop(0);
  });
  // services
  $('.service').hover(function(){
    $(this).toggleClass('dark');
  });
  $('.service:nth-child(even)').addClass('dark');
  // Sliding sidebar.
  $('.sidebar-menu-icon').click(function () {
    $('.sliding-sidebar').toggleClass('animated-panel-is-visible');
  });
  $('.close-sidebar').click(function () {
    $('.sliding-sidebar').removeClass('animated-panel-is-visible');
  });
  // sticky header
  $(window).scroll(function () {
    const headermainheight = jQuery('.header-main').outerHeight();
    if ($(this).scrollTop() > headermainheight + 50 ) {
      $('.header-fixed').addClass('sticky-header');
      $('.sticky-header-height').css('padding-top', headermainheight);
    } else {
      $('.header-fixed').removeClass('sticky-header');
      $(".sticky-header-height").css('padding-top', '0');
    }
  }); 
  // Modal
  $(".modal button, .modal-button").on("click", function() {
    $('.modal-content').removeClass("modal-active");
    $(this).closest('.modal').find('.modal-content').addClass("modal-active");
  });
  $(".modal-close").on("click", function(){
    $(this).closest('.modal-content').removeClass("modal-active");
  });
  // Accordion
  $('.accordion-title').click(function(){
    $(this).parent().siblings('.accordion-item').removeClass('active-accordion');
    $(this).parent('.accordion-item').addClass('active-accordion');
  });
  // toggle
  $('.toggle-title').click(function(){
    $(this).parent('.toggle-item').toggleClass('active-toggle');
  });
// End document ready.
});


