
jQuery(document).ready(function( $ ) {


	/*
		Locate comboboxes
	*/
	(function() {
		function fillCombobox( $elems, name )
		{
			var $selc = $('#' + name + '_select'),
				_opts = {};

			$elems
				.each(
					function()
					{
						var id = $(this).attr( 'id' ) || false,
							cl = $(this).attr( 'class' ) || false,
							sl = ( id ) ? '#' + id : ( cl ) ? '.' + cl.split( ' ' ).join( '.' ) : false;

						if ( sl && typeof _opts[ sl ] == 'undefined' )
						{
							_opts[ sl ] = true;
							var op = '<option value="' + sl + '">' + sl + '</option>';
							$selc.append( op );
						}
					}
				);

			if ( $selc.children().length )
			{
				$selc
					.prepend( '<option value="" selected />' )
					.closest( '.combobox' )
					.addClass( 'is-combobox' );
			}
		}


		//	Find the menu and the menu button
		window.mmenu.website_html_callbacks.push(
			function( html )
			{

				//	Find menu(s)
				var $menus = $(html)
					.find( '.nav-menu' )
					.filter( 'nav, div' );

				$menus = $menus.add(
					$(html)
						.find( '[class^="menu-"], [class*=" menu-"]' )
						.filter( '[class$="-container"], [class*="-container "]' )
				);


				//	Find button(s)
				var $buttons = $(html)
					.find( '.menu-toggle, .secondary-toggle' )
					.filter( 'a, button' );

				$menus
					.each(
						function()
						{
							var id = $(this).attr( 'id' ) || false;
							if ( id )
							{
								$buttons = $buttons.add( '[href="#' + id + '"]' );
							}
						}
					);


				//	Add to select
				fillCombobox( $menus 	, 'mm_setup_menu' 	);
				fillCombobox( $buttons 	, 'mm_setup_button' );
				fillCombobox( $menus 	, 'mm_menu_menu' 	);
			}
		);
	})();




	/*
		Locate popup
	*/
	(function() {
		var $body	= $('body'),
			$locate = $('#locate-content'),
			$menu 	= $('#locate-menu'),
			$list 	= $('#locate-list'),
			$titls  = $locate.find( '.title' ),
			$iframe = $locate.find( 'iframe' );

		var _type = null,
			_titl = null,
			$inpt = $();


		window.mmenu.locateList = {
			fill: function( itms )
			{
				$list.html( itms );

				$list
					.find( 'input[data-selector]' )
					.off( 'click mousedown mouseup' )
					.on( 'click',
						function( e )
						{
							window.mmenu.locateList.toggle( $('#' + $(this).attr( 'for' ) )[ 0 ] );
						}
					);
			},
			toggle: function( node )
			{
				var $inpt = $list.find( 'input[data-selector="' + $(node).attr( 'data-selector' ) + '"]' ),
					chckd = $inpt.is( ':checked' );

				$inpt.prop( 'checked', !chckd );

				var $high = $iframe
					.contents()
					.find( '.mmenu-highlight' )
					.removeClass( 'selected' );

				$list
					.find( 'input[data-selector]' )
					.filter( ':checked' )
					.each(
						function()
						{
							$high
								.filter( '[data-selector="' + $(this).attr( 'data-selector' ) + '"]' )
								.addClass( 'selected' );
						}
					);
			}
		};

		var menu = new Mmenu(
			$menu[0],
			{
				extensions: [ 'theme-black' ],
				offCanvas: {
					use: false
				},
				navbar: {
					add: false
				},
				navbars: [{
					content: [ 
						'<a href="#" class="dashicons dashicons-no" title="' + mmenu_i18n.cancel + '"></a>', 
						'<a href="#" class="dashicons dashicons-smartphone" title="Smartphone"></a>',
						'<a href="#" class="dashicons dashicons-tablet" title="Tablet"></a>',
						'<a href="#" class="dashicons dashicons-desktop" title="Desktop"></a>', 
						'<a href="#" class="done" title="' + mmenu_i18n.save + '">' + mmenu_i18n.save + '</a>' ]
				}]
			}
		);

		$('.button.locate')
			.on( 'click',
				function( e )
				{
					e.preventDefault();
					$body.addClass( 'locate' );

					_type = $(this).data( 'type' );
					_titl = $(this).data( 'title' );
					$inpt = $(this).parent().find( 'input' );

					$titls.html( _titl );
					$list.empty();
					$iframe.attr( 'src', window.mmenu.home_url + '?mmenu=locate&locate=' + _type );
				}
			);

		$('#locate-menu')
			.find( '.mm-navbar' )
			.find( '.dashicons' )
			.on( 'click',
				function( e )
				{
					e.preventDefault();
					$locate.attr( 'class', $(this).attr( 'class' ).split( 'dashicons-' )[ 1 ] );
				}
			);

		$locate
			.find( '.dashicons-no' )
			.on( 'click',
				function( e )
				{
					e.preventDefault();
					tb_remove();
					setTimeout(function() {
						$body.removeClass( 'locate' );
					}, 500);
				}
			);

		$locate
			.find( '.done' )
			.on( 'click',
				function( e )
				{
					e.preventDefault();

					var sl = [];
					$list
						.find( 'input[data-selector]' )
						.filter( ':checked' )
						.each(
							function()
							{
								sl.push( $(this).attr( 'data-selector' ) );
							}
						);

					$inpt
						.val( sl.join(', ') )
						.trigger( 'change.mm' );

					tb_remove();
					setTimeout(function() {
						$body.removeClass( 'locate' );
					}, 500);
				}
			);
	})();

});