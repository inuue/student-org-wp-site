//scrolling sinle page
$(document).ready(function(){
  projectColumns();
  $('.menu-item').click(function(){
    var toGo = $(this).find('a').attr('href');
    $('html, body').animate({
      scrollTop: $(toGo).offset().top}, 1200);
      console.log(toGo);
    });
  $('.logo').click(function(){
    $('html, body').animate({
      scrollTop: 0}, 1200);
  });
  //mobile menu
  $('.hamburger').click(function(){
    $('.menu-item').slideToggle();
    $('.hamburger').toggleClass('closer');
      if( $('.hamburger').hasClass('closer')) {
        $('.hamburger a').text('✖');
      } else {
        $('.hamburger a').text('☰');
      }
  });
  //dropdown menu
  //var lewa = $('.dropdown-toggle').offset().left;
//  $('.dropdown-menu').css('left', lewa);
//top header scroll open
  window.onscroll = function(e) {
    //var oftop = $('#topSlider').offset().top;
  //  var slide = $('#topSlider').height();
  //  var toFixed = oftop + slide;
      if($(document).scrollTop() < (500)){
        $('.navbar').removeClass('fixed');
        $('body').css('margin-top', '0');
      } else {
        if ($('.navbar').hasClass('fixed')) { }
        else {
          $('.navbar').css('top', '-60px');
          $('.navbar').animate({top:0},500);
          $('.navbar').addClass('fixed');
          var header = $('.navbar').height();
          $('body').css('margin-top', header+'px');
        }

      };
    //  if (($(document).scrollTop() >= $('#contact').offset().top) ) {
    //     $(#);
    //  }
    //  else {console.log('no');}
  }
  if ($(window).width() < 768) {
    $('.menu-item').click(function(){
      $('.menu-item').slideToggle();
      $('.hamburger').toggleClass('closer');
      if( $('.hamburger').hasClass('closer')) {
        $('.hamburger a').text('✖');
      } else {
        $('.hamburger a').text('☰');
      }
    })
  }
});

$(window).resize(function(){
  projectColumns();
  if ($(window).width() > 768 ) {
    $('.menu-item').css('display', 'inline-block');
  } else {
    $('.menu-item').css('display', 'none');
  }
})
/*$(window).resize(function(){
  var lewa = $('.dropdown-toggle').offset().left;
  $('.dropdown-menu').css('left', lewa);
}) */


function projectColumns() {
  var leftHeight = $('.projects-main .left').height();
  var rightHeight = $('.projects-main .right').height();
  var left = $('.projects-main .left');
  var right = $('.projects-main .right');
  if($(window).width() > 991) {
    if(leftHeight > rightHeight) {
      right.height(leftHeight);
    } else if (leftHeight < rightHeight) {
      left.height(rightHeight)
    }
  } else {
      left.height('auto')
      right.height('auto');
  }
}

// function projectButtons() {
//
// }
      // $('.projects-main .left .button').css('bottom', '-'+ (rightHeight - leftHeight));
      // $('.projects-main .right .button').css('bottom', '-'+ (leftHeight - rightHeight));
