<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $gallery_header = get_field('gallery_header'); ?>
    <?php if ($gallery_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($gallery_header['url']); ?>" alt="<?php echo esc_attr($gallery_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('gallery_heading') ?></h1>
    </div>
</section>

<!-- Images -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('gallery_subheading_1') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('gallery_subheading_2') ?></h3>
        </div>
            <?php echo do_shortcode('[modula id="454"]') ?>
    </div>
</section>

<!-- Call To Action -->
<section class="bg-lightpink">
    <div class="mx-auto max-w-7xl px-6 py-10 sm:py-24 lg:px-8 lg:flex lg:flex-row lg:items-center lg:justify-between">
        <div class="lg:w-2/3">
            <h2 class="text-2xl font-primary font-bold tracking-tight text-black sm:text-3xl"><?php the_field('cta_heading') ?></h2>
            <h3 class="mt-2 text-lg sm:text-xl font-primary leading-7 tracking-tight text-black"><?php the_field('cta_subheading') ?></h3>
            <?php $cta_page_link = get_field('cta_page_link'); ?>
            <?php if ($cta_page_link) : ?>
                <div class="mt-4 flex items-center gap-x-6 lg:flex-shrink-0">
                    <a href="<?php echo get_permalink($cta_page_link); ?>" class="group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
                        <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative group-hover:text-lightpink"><?php the_field('cta_button') ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="hidden lg:flex lg:w-1/3 lg:justify-end lg:items-center">
            <?php $cta_graphic = get_field('cta_graphic'); ?>
            <?php if ($cta_graphic) : ?>
                <img src="<?php echo esc_url($cta_graphic['url']); ?>" alt="<?php echo esc_attr($cta_graphic['alt']); ?>" class="h-60 w-auto drop-shadow">
            <?php endif; ?>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
