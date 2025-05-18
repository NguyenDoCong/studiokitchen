<?php

function register_custom_elementor_widget($widgets_manager)
{

	require_once(__DIR__ . '/elementor/widgets/query.php');

	$widgets_manager->register(new \Elementor_Query());

}
add_action('elementor/widgets/register', 'register_custom_elementor_widget');
