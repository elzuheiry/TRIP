$(document).ready(function () {
  $(".weekend .container-weekend .owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    responsive: {
      280: {
        items: 1,
      },
      600: {
        items: 2,
      },
      800: {
        items: 3,
      },
      1200: {
        items: 4,
      },
      2560: {
        items: 5,
      },
    },
  });
});
