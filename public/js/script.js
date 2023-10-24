

// jQuery(function ($) {
//   $('.menu-btn').on('click', function () {
//     $(this).next().slideToggle(200);
//     $(this).toggleClass('open', 200);
//   }).next().hide();
// });


jQuery(function ($) {
  $('.menu-btn').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('open');
    $(this).next().slideToggle();
  }).next().hide();
});
