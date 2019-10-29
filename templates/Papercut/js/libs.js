$( document ).ready( function() {

    $( "#hamburger-button" ).on( "click", function () {

        $( ".navigation" ).slideToggle( 200 );

    });

    $( "#search-button" ).on( "click", function () {

        $( "#search-area" ).slideToggle( 200 );

    });

    $( ".search-box .flaticon-close" ).on( "click", function () {

        $( "#search-area" ).slideToggle( 200 );

    });

    $( ".login-button" ).on( "click", function () {

        $( ".login-bg" ).fadeIn( 200 );

    });

    $( ".login-box .flaticon-close" ).on( "click", function () {

        $( ".login-bg" ).fadeOut( 200 );

    });

});
