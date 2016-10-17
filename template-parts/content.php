<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AAT_Reavel
 */


$terms = get_package_taxonomies_term_id(get_the_ID());

?>

 <article class="article has-hover-s1" data-country="<?= $terms['country']['id']; ?>" data-category="<?= $terms['category']['id']; ?>">
    <div class="thumbnail">
        <div class="img-wrap">
            <?php the_post_thumbnail(); ?>
            <span class="day-tag"><?= CFS()->get('days'); ?></span>
        </div>
        <div class="description"> 
            <div class="col-left">
                <header class="heading">
                    <?php the_title(sprintf('<h3><a href="%s">',esc_url(get_permalink())), '</a></h3>'); ?>
                    <!-- <h3><a href="#">Beach &amp; Resort Holiday in Thailand</a></h3> -->
                    <div class="info-country"><?php echo $terms['country']['name']; ?></div>
                </header>
                <p><?= CFS()->get('short_description'); ?></p>
                <!-- <div class="reviews-holder">
                    <div class="star-rating">
                        <span><span class="icon-star"></span></span>
                        <span><span class="icon-star"></span></span>
                        <span><span class="icon-star"></span></span>
                        <span><span class="icon-star"></span></span>
                        <span class="disable"><span class="icon-star"></span></span>
                    </div>
                    <div class="info-rate">Based on 75 Reviews</div>
                </div> -->
                <footer class="info-footer">
                    <ul class="ico-list">
                        <li class="pop-opener">
                            <a href="#">
                            <span class="icon-facebook"></span>
                            <div class="popup">
                                Share on facebook
                            </div>
                            </a>
                        </li>
                        <li class="pop-opener">
                            <span class="icon-google-plus"></span>
                            <div class="popup">
                                Boat
                            </div>
                        </li>
                        <li class="pop-opener">
                            <span class="icon-twitter"></span>
                            <div class="popup">
                                Food Wine
                            </div>
                        </li>
                        <li class="pop-opener">
                            <span class="icon-linkedin"></span>
                            <div class="popup">
                                Water
                            </div>
                        </li>
                    </ul><!-- 
                    <ul class="ico-action">
                        <li>
                            <a href="#"><span class="icon-share"></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="icon-favs"></span></a>
                        </li>
                    </ul> -->
                </footer>
            </div>
            <aside class="info-aside">
                <span class="price">from <span>$<?= $terms['price']; //CFS()->get('package_price');  ?></span></span>
                <div class="activity-level">
                    <div class="ico">
                        <span class="icon-level2"></span>
                    </div>
                    <span class="text"><?= get_package_grade(); ?></span>
                </div>
                <a href="<?= esc_url(get_permalink()); ?>" class="btn btn-default">explore</a> 
            </aside>
        </div>
    </div>
</article>
