<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AAT_Reavel
 */

get_header(); ?>

<main id="main">
                <div class="error-holder">
                    <div class="container">
                        <h1 class="wow zoomIn">404</h1>
                        <span class="title">Opps! You have reached the No Man’s Land!</span>
                        <form class="inner-search" action="<?php echo  esc_url( home_url( '/' ) ); ?>">
                            <div class="input-wrap">
                                <input type="text" placeholder="Search" name="s" id="s">
                                <button type="submit"><span class="icon-search"></span></button>
                            </div>
                            <p>Sorry but the page your are looking for has been removed or had its name changed. Please use the links below to navigate your way out of here. Thank you!</p>
                        </form>
                        <div class="button-holder">
                            <a href="<?php bloginfo('url'); ?>" class="btn btn-md btn-white">go to homepage</a>
                        </div>
                    </div>
                </div>
                <article class="partner-block bg-light-gray">
                    <div class="container">
                        <header class="content-heading">
                            <h2 class="main-heading">Partner</h2>
                            <span class="main-subtitle">People who always support and endorse our good work</span>
                            <div class="seperator"></div>
                        </header>
                        <div class="partner-list" id="partner-slide">
                            <div class="partner">
                                <a href="#">
                                    <img width="141" src="img/logos/logo-travelagancy.svg" alt="image description">
                                    <img class="hover" width="141" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="101" src="img/logos/logo-around-world.svg" alt="image description">
                                    <img class="hover" width="101" src="img/logos/logo-around-world-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="152" src="img/logos/logo-tourist.svg" alt="image description">
                                    <img class="hover" width="152" src="img/logos/logo-tourist-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="87" src="img/logos/logo-adventure.svg" alt="image description">
                                    <img class="hover" width="87" src="img/logos/logo-adventure-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="101" src="img/logos/logo-around-world.svg" alt="image description">
                                    <img class="hover" width="101" src="img/logos/logo-around-world-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="141" src="img/logos/logo-travelagancy.svg" alt="image description">
                                    <img class="hover" width="141" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="87" src="img/logos/logo-adventure.svg" alt="image description">
                                    <img class="hover" width="87" src="img/logos/logo-adventure-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="101" src="img/logos/logo-around-world.svg" alt="image description">
                                    <img class="hover" width="101" src="img/logos/logo-around-world-hover.svg" alt="image description">
                                </a>
                            </div>
                            <div class="partner">
                                <a href="#">
                                    <img width="141" src="img/logos/logo-travelagancy.svg" alt="image description">
                                    <img class="hover" width="141" src="img/logos/logo-travelagancy-hover.svg" alt="image description">
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>

 <?php get_footer(); ?>

