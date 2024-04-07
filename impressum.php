<?php
/*
Template Name: Impressum
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $impressum_header = get_field('impressum_header'); ?>
    <?php if ($impressum_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($impressum_header['url']); ?>" alt="<?php echo esc_attr($impressum_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('impressum_heading') ?></h1>
    </div>
</section>

<!-- Impressum -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('impressum_subheading_1') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('impressum_subheading_2') ?></h3>
        </div>
        <div">

            <?php
            $args = array(
                'post_type'      => 'impressum',
                'posts_per_page' => -1,
                'order'          => 'ASC',
            );

            $impressum_query = new WP_Query($args);

            if ($impressum_query->have_posts()) :
            ?>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                
                <?php
                while ($impressum_query->have_posts()) : $impressum_query->the_post();
                ?>

                <div class="border-solid border-[0.075rem] border-black p-6 flex items-center shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                    <dl class="mt-3 space-y-1">    
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black"><?php the_field('impressum_section_info_title') ?></h4>
                        <p class="mb-2 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('impressum_section_info_description') ?></p>
                    </dl>
                </div>

                <?php
                endwhile;
                wp_reset_postdata();
                else :
                    echo 'Hiba az adatok betöltésekor.';
                endif;
                ?>

            </div>
        </div>
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