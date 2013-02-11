(function ($) {$(document).ready(function() {

  /**
   * Mobile nav
   */
  $('#mobile-nav').hide();
  $('#toggle-mobile-nav').click(function() {
    $('#mobile-nav').slideToggle('slow', function() {});
  });


  /**
   * Active nav arrows.
   */
  $('.top-bar-wrapper li.active a').after('<div class="nav-active-arrow hide-for-small"></div>');

  /**
   * Header expand / collapse
   */
  var header = $('.top-bar-wrapper.hide-for-small');
  var headerNav = $('nav.top-bar');
  var headerTag = $('#nav-bar-tag');
  var headerLogo = $('#nav-bar-logo');
  var headerCondensed = false;
  var scrollAtPx = 30;

  function headerCondense() {
    header.stop().animate({height:'40px'}, 200);
    headerNav.stop().animate({'margin-top':'-13px'}, 200);
    headerLogo.stop().animate({'top':'-40px'}, 200);
    headerTag.stop().animate({'top':'-55px'}, 200);
    header.addClass('header-condensed');
    headerCondensed = true;
  }

  function headerExpand() {
    header.stop().animate({height:'66px'}, 200);
    headerNav.stop().animate({'margin-top':'0px'}, 200);
    headerLogo.stop().animate({'top':'0px'}, 200);
    headerTag.stop().animate({'top':'0px'}, 200);
    header.removeClass('header-condensed');
    headerCondensed = false;
  }

  // Header condense/expand on scroll.
  $(window).scroll( function() {
    var scrolledFromTop = $(this).scrollTop();
    if (scrolledFromTop > scrollAtPx && !headerCondensed) {
      headerCondense();
    } else if (scrolledFromTop <= scrollAtPx && headerCondensed) {
      headerExpand();
    }
  });

  // Header condense/expand on hover.
  header.hover(
    function () {
      if (headerCondensed) {
        headerExpand();
      }
    },
    function () {
      if (!headerCondensed && $(document).scrollTop() > scrollAtPx) {
        headerCondense();
      }
    }
  );


  /**
   * Search bar
   */
  var searchBar = $('#search-bar');
  var searchBarActive = false;

  // Onload, hide our close-search-bar element since it flickers in some browsers (cough cough *firefox* cough)
  searchBar.hide();

  // Show the search bar.
  $('#nav-bar-search').click( function(e) {
    $('.nav-active-arrow').fadeTo(200, 0);
    searchBar.show();
    searchBar.animate({'top':'0px'}, 200);
    searchBarActive = true;
    e.stopPropagation();
  });

  // Hide the search bar when user clicks elsewhere.
  $(window).click(function(e) {
    if (searchBarActive) {
      $('.nav-active-arrow').fadeTo(200, 1);
      searchBar.animate({'top':'-65px'}, 200, function() {
        searchBar.hide();
      });
    }
  });

  // Hide the search bar when user clicks 'remove'.
  $('#search-bar-close').click(function(e) {
    if (searchBarActive) {
      $('.nav-active-arrow').fadeTo(200, 1);
      searchBar.animate({'top':'-65px'}, 200, function() {
        searchBar.hide();
      });
    }
  });

  // Clicking on the search bar is a-ok.
  searchBar.click(function(e) {
    e.stopPropagation();
  });

  // Submit our phony search form (only when the search input is focused).
  $(document).keyup(function(e) {
    var keyPressed = (e.keyCode ? e.keyCode : e.which);
    if (keyPressed == 13 && $(e.target).is('#search-bar input')) {
      document.location = Drupal.settings.basePath + 'search/node/' + $('input', searchBar).val();
    }
  });


  /**
   * Churches bar
   */
  var churchesBar = $('#churches-bar');
  var churchesBarActive = false;

  // Onload, hide the churches bar...
  churchesBar.hide();

  $('#nav-bar-churches').click( function(e) {
    churchesBar.show();
    $('.nav-active-arrow').fadeTo(200, 0);
    //$('.nav-active-arrow').animate({top: '-=20px', opacity: '0'},200);
    churchesBar.animate({'top':'0px'}, 200);
    churchesBarActive = true;
    e.stopPropagation();
  });

  // Hide the churches bar when user clicks elsewhere.
  $(window).click(function(e) {
    if (churchesBarActive) {
      $('.nav-active-arrow').fadeTo(200, 1);
      churchesBar.animate({'top':'-65px'}, 200, function() {
        churchesBar.hide();
      });
    }
  });

  // Hide the churches bar when user clicks 'remove'.
  $('#churches-bar-close').click(function(e) {
    if (churchesBarActive) {
      $('.nav-active-arrow').fadeTo(200, 1);
      churchesBar.animate({'top':'-65px'}, 200, function() {
        churchesBar.hide();
      });
    }
  });

  // Clicking on the churches bar is a-ok, too.
  churchesBar.click(function(e) {
    e.stopPropagation();
  });


  /**
   * Initialize topbar.
   */
   $(document).foundationTopBar();



});})(jQuery);
