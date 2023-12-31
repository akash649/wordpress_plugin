<?php
/**
 * Products list loop start template
 */

$classes = array(
	'woo-products-products-list',
);

$layout = $this->get_attr( 'products_layout' );

if ( $layout ) {
	$classes[] = 'products-layout-' . $layout;
}
?>

<ul class="<?php echo esc_attr(implode( ' ', $classes )); ?>">