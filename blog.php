<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<main>

    <!-- Header -->
    <section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
        <?php $blog_header = get_field('blog_header'); ?>
        <?php if ($blog_header) : ?>
            <div class="absolute inset-0 -z-10 h-full w-full object-cover">
                <img src="<?php echo esc_url($blog_header['url']); ?>" alt="<?php echo esc_attr($blog_header['alt']); ?>" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-darkpink opacity-30"></div>
            </div>
        <?php endif; ?>
        <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('blog_heading') ?></h1>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="bg-whitesmoke py-10 sm:py-24 relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mb-16 flex justify-center">
                <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('blog_subheading_1') ?></h2>
                <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('blog_subheading_2') ?></h3>
            </div>

            <?php
            $args = array(
                'post_type'      => 'blogpost',
                'posts_per_page' => -1,
                'order'          => 'DESC',
            );

            $blogposts_query = new WP_Query($args);

            if ($blogposts_query->have_posts()) :
            ?>
                <div class="mx-auto grid max-w-7xl auto-rows-fr grid-cols-1 gap-8 md:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <?php
                    while ($blogposts_query->have_posts()) : $blogposts_query->the_post();
                    ?>

                        <article class="relative isolate flex flex-col justify-end overflow-hidden px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <?php $blogpost_thumbnail = get_field('blogpost_thumbnail'); ?>
                                <?php if ($blogpost_thumbnail) : ?>
                                    <img src="<?php echo esc_url($blogpost_thumbnail['url']); ?>" alt="<?php echo esc_attr($blogpost_thumbnail['alt']); ?>" class="absolute inset-0 -z-10 h-full w-full object-cover">
                                <?php endif; ?>
                                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-darkpink via-lightpink/40"></div>

                                <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-xs sm:text-sm font-primary leading-7 tracking-tight text-whitesmoke">
                                    <time class="mr-8"><?php the_field('blogpost_date') ?></time>
                                </div>
                                <h3 class="mt-3 text-base sm:text-lg font-primary font-bold tracking-tight leading-7 text-whitesmoke">
                                    <span class="absolute inset-0"></span>
                                    <?php the_field('blogpost_title') ?>
                                </h3>
                                <h4 class="text-sm sm:text-base font-primary tracking-tight leading-7 text-whitesmoke"><?php the_field('blogpost_subtitle'); ?></h4>
                            </a>
                        </article>

                    <?php endwhile; ?>
                </div>
            <?php
                wp_reset_postdata();
            else :
                echo 'Hiba az előnyök betöltésekor.';
            endif;
            ?>

        </div>
    </section>

    <!-- Call To Action -->
    <section class="bg-lightpink">
        <div class="mx-auto max-w-7xl px-6 py-10 sm:py-24 lg:px-8 lg:flex lg:flex-row lg:items-center lg:justify-between">
            <div class="lg:w-2/3">
                <h2 class="text-2xl font-primary font-bold tracking-tight text-black sm:text-3xl"><?php the_field('cta_heading') ?></h2>
                <h3 class="mt-2 text-lg sm:text-xl font-primary leading-7 tracking-tight text-black"><?php the_field('cta_subheading') ?></h3>
                <div class="mt-4 flex items-center gap-x-6 lg:flex-shrink-0">
                    <a href="tel:<?php echo esc_attr(get_field('phone_number')); ?>" class="group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
                        <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative group-hover:text-lightpink"><?php the_field('cta_button') ?></span>
                    </a>
                </div>
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
