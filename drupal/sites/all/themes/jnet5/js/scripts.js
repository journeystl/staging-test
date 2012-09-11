(function ($) {$(document).ready(function() {

  /**
   * Mobile nav
   */
  $('#mobile-nav').hide();
  $('#toggle-mobile-nav').click(function() {
    $('#mobile-nav').slideToggle('slow', function() {});
  });

  /**
   * Header expand / collapse
   */

  var header = $('#block-menu-block-1');
  var headerNav = $('.top-bar .nav-bar');
  var headerTag = $('#nav-bar-tag');
  var headerLogo = $('#nav-bar-logo');
  var headerCondensed = false;
  var scrollAtPx = 30;

  function headerCondense() {
    header.stop().animate({height:'40px'}, 200);
    headerNav.stop().animate({'margin-top':'-15px'}, 200);
    headerTag.stop().animate({'margin-top':'-63px'}, 200);
    headerCondensed = true;
  }

  function headerExpand() {
    header.stop().animate({height:'65px'}, 200);
    headerNav.stop().animate({'margin-top':'0px'}, 200);
    headerTag.stop().animate({'margin-top':'0px'}, 200);
    headerCondensed = false;
  }

  // Header condense/expand on scroll.
  $(document).scroll( function() {
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
  $('#nav-bar-search').click( function(e) {
    searchBar.animate({'top':'0px'}, 200);
    searchBarActive = true;
    e.stopPropagation();
  });

  // Hide the search bar when user clicks elsewhere.
  $(window).click(function(e) {
    if (searchBarActive) {
      searchBar.animate({'top':'-65px'}, 200);
    }
  });

  // Hide the search bar when user clicks 'remove'.
  $('#search-bar-close').click(function(e) {
    if (searchBarActive) {
      searchBar.animate({'top':'-65px'}, 200);
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
  $('#nav-bar-churches').click( function(e) {
    churchesBar.animate({'top':'0px'}, 200);
    churchesBarActive = true;
    e.stopPropagation();
  });

  // Hide the churches bar when user clicks elsewhere.
  $(window).click(function(e) {
    if (churchesBarActive) {
      churchesBar.animate({'top':'-65px'}, 200);
    }
  });

  // Hide the churches bar when user clicks 'remove'.
  $('#churches-bar-close').click(function(e) {
    if (churchesBarActive) {
      churchesBar.animate({'top':'-65px'}, 200);
    }
  });

  // Clicking on the churches bar is a-ok, too.
  churchesBar.click(function(e) {
    e.stopPropagation();
  });


});})(jQuery);
