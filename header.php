<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AAT_Reavel
 */

?><?php

    /**
     * hook - aat_action_doctype
     */
    do_action('aat_action_doctype');
?>
<head>
<?php 
    /**
     * hook - aat_action_head
     */
    do_action('aat_action_head');
 ?>

<?php wp_head(); ?>
</head>

<?php $class = (is_404() || is_singular('packages') || is_search() || is_singular('page') ) ? 'default-page' : ''; ?>
<body <?php body_class($class); ?>>
<!-- <div class="preloader" id="pageLoad">
    <div class="holder">
        <div class="coffee_cup"></div>
    </div>
</div> -->
<?php
    /**
     * hook aat_action_page_start
     */
    do_action('aat_action_before');
?>
<?php
    /**
     * hook - aat_action_page_inner_start
     */
    do_action('aat_action_before_content');
?>
<?php
    /**
     * hook - aat_action_header_start
     */
    do_action('aat_action_before_header');
?>

<?php
    /**
     * hook - aat_action_header_start
     */
    do_action('aat_action_header');
?>

<?php
    /**
     * hook - aat_action_header_start
     */
    do_action('aat_action_after_header');
?>
           