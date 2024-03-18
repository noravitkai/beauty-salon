<?php get_header(); ?>

<main class="bg-whitesmoke">
    <?php
    while (have_posts()) : the_post();
    ?>
    <!-- Header With Thumbnail -->
    <section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
        <?php
        $blogpost_thumbnail = get_field('blogpost_thumbnail');
        if ($blogpost_thumbnail) :
        ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($blogpost_thumbnail['url']); ?>" alt="<?php echo esc_attr($blogpost_thumbnail['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
        <?php endif; ?>
        <div class="mx-auto max-w-2xl text-center">
            <p class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl">Blog</p>
            <hr class="my-4 border-t border-whitesmoke w-12 mx-auto">
            <p class="text-sm sm:text-base font-primary tracking-tight leading-7 text-whitesmoke"><?php echo esc_html(get_field('blogpost_date')); ?></p>
        </div>
    </section>

    <!-- Blogpost Content -->
    <section class="max-w-2xl mx-auto px-6 py-10 sm:py-24 lg:px-8">
        <article class="prose text-black font-primary prose-headings:mb-5 prose-headings:mt-0 prose-img:my-5 prose-img:w-full prose-headings:font-semibold">
            <h1 class="mb-5"><?php echo esc_html(get_field('blogpost_title')); ?></h1>
            <h2 class="mt-0 mb-5"><?php echo esc_html(get_field('blogpost_subtitle')); ?></h2>
            <?php
            $blogpost_body = get_field('blogpost_body');
            echo apply_filters('the_content', $blogpost_body);
            ?>
        </article>
    </section>
    <?php
    endwhile;
    ?>

    <!-- More Blogposts -->
    <section class="bg-lightpink py-10 sm:py-24 relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mb-16 flex justify-center">
                <h2 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14">További cikkek</h2>
                <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-3xl relative z-20">Olvasd el korábbi írásainkat is!</h3>
            </div>
            <div class="mx-auto grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 md:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <?php
                $args_other_posts = array(
                    'post_type' => 'blogpost',
                    'posts_per_page' => 3,
                    'meta_key' => 'blogpost_date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC',
                    'post__not_in' => array(get_the_ID()),
                );

                $other_posts_query = new WP_Query($args_other_posts);

                if ($other_posts_query->have_posts()) :
                    while ($other_posts_query->have_posts()) : $other_posts_query->the_post();
                ?>
                        <article class="relative isolate flex flex-col justify-end overflow-hidden px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <?php $other_post_thumbnail = get_field('blogpost_thumbnail'); ?>
                                <?php if ($other_post_thumbnail) : ?>
                                    <img src="<?php echo esc_url($other_post_thumbnail['url']); ?>" alt="<?php echo esc_attr($other_post_thumbnail['alt']); ?>" class="absolute inset-0 -z-10 h-full w-full object-cover">
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
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'Nincs több blogbejegyzés.';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
