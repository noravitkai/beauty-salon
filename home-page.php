<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main>

<?php while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <h2 class="text-5xl text-black font-bold">Test</h2>
    <?php the_content(); ?>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>