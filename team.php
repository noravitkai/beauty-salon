<?php
/*
Template Name: Team
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $team_header = get_field('team_header'); ?>
    <?php if ($team_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($team_header['url']); ?>" alt="<?php echo esc_attr($team_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('team_heading') ?></h1>
    </div>
</section>

<!-- Introduction -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-10 sm:mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('team_subheading_1') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('team_subheading_2') ?></h3>
        </div>

        <!-- Team Members -->
        <ul role="list" class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 -mt-12 space-y-12 divide-y divide-lightpink">
            
        <?php
            $args = array(
                'post_type' => 'team-member',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $members_query = new WP_Query($args);

            if ($members_query->have_posts()) :

                while ($members_query->have_posts()) : $members_query->the_post();
                    ?>
        
            <li class="flex flex-col gap-10 pt-12 sm:flex-row items-center sm:items-start">
                <div class="sm:w-1/4 w-1/2">
                    <?php $member_image_2 = get_field('member_image_2'); ?>
                    <?php if ($member_image_2) : ?>
                        <img src="<?php echo esc_url($member_image_2['url']); ?>" alt="<?php echo esc_attr($member_image_2['alt']); ?>" class="object-cover rounded-full shadow-sm transition duration-300 ease-in-out hover:scale-110">
                    <?php endif; ?>
                </div>
                <div class="sm:w-3/4 w-full">
                    <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black text-center sm:text-left"><?php the_field('member_name') ?></h4>
                    <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink text-center sm:text-left"><?php the_field('member_position'); ?></p>
                    <p class="mt-6 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('member_description'); ?></p>
                    
                    <div class="mt-6 flex items-center space-x-2">
                        <?php $member_page_link = get_field('member_page_link'); ?>
                        <?php if ($member_page_link) : ?>
                        <a href="<?php echo get_permalink($member_page_link); ?>" class="text-sm sm:text-base font-primary leading-7 tracking-tight text-black hover:text-darkpink" target="_blank">
                            Szolgáltatások
                        </a>
                        <?php endif; ?>
                        <svg class="h-5 w-5 flex-none text-darkpink" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                        </svg>
                    </div>

                </div>
            </li>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'Hiba a betöltéskor.';
            endif;
            ?>

        </ul>

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