$( document ).ready( function() {

	$( '.modal-close , .modal-bg' ).on( 'click', function() {

		hideModal();

	});

	$( '.omodal' ).on( 'click', function() {

		var title = $( this ).data( 'modal-title' );
		var content = $( this ).data( 'modal-content' );
		showModal( title, content );

	});

	$( window ).scroll( function() {

		if ( $( this ).scrollTop() >= 187 ) {

			$( ".navigation" ).css({ position: "fixed", "box-shadow": "0 2px 1px rgba(0,0,0,0.13)", "background": "rgba(255,255,255,0.7)" });
			$( ".header" ).css({ marginBottom: 90 });

		} else {

			$( ".navigation" ).css({ position: "relative", "box-shadow": "0 3px 3px rgba(0,0,0,0.03)", "background": "#fff" });
			$( ".header" ).css({ marginBottom: 0 });

		}

	});

});

function showModal( title, content ) {

	$( '.modal-title div' ).html( title );
	$( '.modal-content' ).html( content );
	$( '.modal' ).fadeIn( 200, function() {

		$( '.modal-box' ).css( {
			'transform': 'none',
			'-webkit-transform': 'none',
			'-moz-transform': 'none'
		} );

	} );

}

function hideModal() {

	$( '.modal-box' ).css( {
		'transform': 'perspective(600) scale(0.5) rotateX(-90deg)',
		'-webkit-transform': 'perspective(600) scale(0.5) rotateX(-90deg)',
		'-moz-transform': 'perspective(600) scale(0.5) rotateX(-90deg)'
	} );

	setTimeout( function() {

		$( '.modal' ).fadeOut( 300 );

	}, 200 );

}
