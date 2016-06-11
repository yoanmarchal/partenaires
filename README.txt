=== Partenaires plugin ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://pledgie.com/campaigns/31846
Tags: comments, spam
Requires at least: 4.5.2
Tested up to: 4.5.2
Stable tag: 4.5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9CYUE3CVEAJ2Q)

add partenaires ctp

== Description ==

Minimal Partenaires plugin for wordpress

== Installation ==

This section describes how to install the plugin and get it working.

1. Activate the plugin through the 'Plugins' menu in WordPress

add to function.php

function getTheCpt($cpt, $catname){
  // WP_Query arguments

  $args = array (
    'post_type'              => $cpt,
    'category_name'          => $catname,
    'post_status'            => 'publish',
    'pagination'             => true,
    'order'                  => 'ASC',
    'orderby'                => 'title',
    'cache_results'          => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => true,
    'posts_per_page' => -1
  );

  // The Query
  $query = new WP_Query( $args );

  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" >
          <div class="row">
            <div class="col-md-4 col-xs-12">
                <?php the_post_thumbnail('medium'); ?>
            </div>
            <div class="col-md-8 col-xs-12 text-justify" itemprop="description">
            	<a href="<?php echo rwmb_meta( 'url' );?>"><h3 ><?php the_title(); ?></h3></a>
                <?php the_content(); ?>
                Url : <a href="<?php echo rwmb_meta( 'url' );?>"><?php the_title(); ?></a>
            </div>
          </div>
      </article>
      <hr>
      <?php
    }
  }
  // Restore original Post Data
  wp_reset_postdata();
}



add to page partenaires to display all


<aside class="col-lg-3 col-md-3 sidebar">
    <ul class="nav affix" data-spy="affix">
        <a href="#loisir" data-scroll-nav="0">Mode, sport et loisirs</a>
        <a href="#restaurant" data-scroll-nav="1">Boire, manger et sortir</a>
        <a href="#beaute" data-scroll-nav="2">Beauté et bien-être</a>
        <a href="#pratique" data-scroll-nav="3">Vie pratique </a>
    </ul>
</aside>

<div id="post-<?php the_ID(); ?>" class="col-lg-9 col-md-9">
    <div class="entry-content">
        <section id="loisir" data-scroll-index="0">
            <h2>Mode, sport et loisirs</h2>
            <?php getTheCpt('partenaires', 'loisirs-et-sorties'); ?>
        </section>

        <section id="restaurant" data-scroll-index="1">
            <h2>Boire, manger et sortir</h2>
            <?php getTheCpt('partenaires', 'restaurants'); ?>
        </section>

        <section id="beaute" data-scroll-index="2">
            <h2>Beauté et bien-être</h2>
            <?php getTheCpt('partenaires', 'beaute-et-bien-etre'); ?>
        </section>

        <section id="pratique" data-scroll-index="3">
            <h2>Vie pratique </h2>
            <?php getTheCpt('partenaires', 'vie-pratique'); ?>
        </section>

    </div>
</div>

== Changelog ==
= 1.0.1 =
Add documentation

= 1.0 =
Initial plugin.

== Todo ==

* Test
* svg icons
