/**
  * Theme functions file.
 *
 * Contains handlers for navigation,widget area and other javascript functions.
 */
( function() {
	  /**
    * toggle the navigation on mobile devices
    */
    $(".toggle-menu").on("click", function(){
      $(".site-navigation ul").slideToggle();
    });

} )();
