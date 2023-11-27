<?php
/*
Template Name: Cosmetics
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<div class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $cosmetics_header = get_field('cosmetics_header'); ?>
    <?php if ($cosmetics_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($cosmetics_header['url']); ?>" alt="<?php echo esc_attr($cosmetics_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('cosmetics_heading') ?></h1>
    </div>
</div>

</main>

<?php get_footer(); ?>