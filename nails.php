<?php
/*
Template Name: Nails
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $nails_header = get_field('nails_header'); ?>
    <?php if ($nails_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($nails_header['url']); ?>" alt="<?php echo esc_attr($hairdressing_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('nails_heading') ?></h1>
    </div>
</section>

<!-- Services -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <!-- General Description -->
        <div class="mx-auto max-w-2xl lg:text-center">
            <div class="mb-10 sm:mb-16 flex justify-center">
                <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('nails_subheading_1') ?></h2>
                <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('nails_subheading_2') ?></h3>
            </div>
        </div>

        <div class="mx-auto lg:max-w-none">
            <?php
            $args = array(
                'post_type'      => 'nails-point',
                'posts_per_page' => -1,
                'order'          => 'ASC',
            );

            $nails_points_query = new WP_Query($args);

            if ($nails_points_query->have_posts()) :
            ?>
            <dl class="grid grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-3">
                <?php
                while ($nails_points_query->have_posts()) : $nails_points_query->the_post();
                ?>
                <div class="flex flex-col">
                    <h4 class="flex items-center gap-x-3 text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black">
                        <svg class="h-5 w-5 flex-none text-darkpink" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z"/>
                        </svg>
                        <?php the_field('nails_point_title') ?>
                    </h4>
                    <p class="mt-2 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('nails_point_description') ?></p>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                else :
                    echo 'Hiba az előnyök betöltésekor.';
                endif;
                ?>
            </dl>
        </div>

        <!-- List Of Subservices -->
        <div class="mt-10 sm:mt-16 mb-10 sm:mb-16 bg-whitesmoke border-solid border-[0.075rem] border-black px-6 py-4 shadow-sm">
            <h3 class="text-lg sm:text-xl font-primary font-bold tracking-tight text-black mb-2">Manikűr-pedikűr kezeléseink</h3>
            <ul class="space-y-2">
                <?php
                $args = array(
                    'post_type' => 'nails-subservice',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );
                $subservices_query = new WP_Query($args);

                if ($subservices_query->have_posts()) :
                    while ($subservices_query->have_posts()) : $subservices_query->the_post();
                        $tab_id = sanitize_title(get_the_title());
                ?>
                <li class="flex items-center space-x-2">
                    <a href="#<?php echo esc_attr($tab_id); ?>" class="inline-block max-w-full text-sm sm:text-base font-primary leading-7 tracking-tight text-black hover:text-darkpink"><?php the_title(); ?></a>
                    <svg class="h-5 w-5 flex-none text-darkpink" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>

        <!-- Subservices -->
        <?php
        $args = array(
            'post_type' => 'nails-subservice',
            'posts_per_page' => -1,
            'order' => 'ASC',
        );

        $subservices_query = new WP_Query($args);

        if ($subservices_query->have_posts()) :
            while ($subservices_query->have_posts()) : $subservices_query->the_post();
                $tab_id = sanitize_title(get_the_title());
        ?>
        <div class="mt-16 w-full border-solid border-[0.075rem] border-black shadow-sm">

            <!-- Tabs For Subservices -->
            <ul class="flex flex-wrap border-solid border-b-[0.075rem] border-black bg-lightpink text-sm sm:text-base font-primary leading-7 tracking-tight text-black" id="<?php echo esc_attr($tab_id); ?>" data-tabs-target="#<?php echo esc_attr($tab_id); ?>Content" role="tablist">
                <li class="flex-grow">
                    <button id="<?php echo esc_attr($tab_id); ?>-treatment-tab" data-tabs-target="<?php echo esc_attr($tab_id); ?>-treatment" type="button" role="tab" aria-controls="<?php echo esc_attr($tab_id); ?>-treatment" aria-selected="true" class="w-full inline-block p-4 hover:bg-darkpink hover:text-whitesmoke focus:bg-darkpink focus:text-whitesmoke border-solid border-r-[0.075rem] border-black transition duration-300 ease-in-out">Leírás</button>
                </li>
                <li class="flex-grow">
                    <button id="<?php echo esc_attr($tab_id); ?>-benefits-tab" data-tabs-target="<?php echo esc_attr($tab_id); ?>-benefits" type="button" role="tab" aria-controls="<?php echo esc_attr($tab_id); ?>-benefits" aria-selected="false" class="w-full inline-block p-4 hover:bg-darkpink hover:text-whitesmoke focus:bg-darkpink focus:text-whitesmoke border-solid border-r-[0.075rem] border-black transition duration-300 ease-in-out">Előnyök</button>
                </li>
                <li class="flex-grow">
                    <button id="<?php echo esc_attr($tab_id); ?>-details-tab" data-tabs-target="<?php echo esc_attr($tab_id); ?>-details" type="button" role="tab" aria-controls="<?php echo esc_attr($tab_id); ?>-details" aria-selected="false" class="w-full inline-block p-4 hover:bg-darkpink hover:text-whitesmoke focus:bg-darkpink focus:text-whitesmoke transition duration-300 ease-in-out">Időtartam, részletek</button>
                </li>
            </ul>

            <div id="<?php echo esc_attr($tab_id); ?>Content">
                <!-- Tab Content For Treatment -->
                <div class="hidden p-4 bg-transparent" id="<?php echo esc_attr($tab_id); ?>-treatment" role="tabpanel" aria-labelledby="<?php echo esc_attr($tab_id); ?>-treatment-tab">
                    <h4 class="mb-3 text-2xl font-primary font-bold tracking-tight text-black sm:text-3xl"><?php the_field('nails_treatment_name'); ?></h4>
                    <p class="mb-3 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('nails_treatment_description'); ?></p>
                </div>

                <!-- Tab Content For Benefits -->
                <div class="hidden p-4 bg-transparent" id="<?php echo esc_attr($tab_id); ?>-benefits" role="tabpanel" aria-labelledby="<?php echo esc_attr($tab_id); ?>-benefits-tab">
                    <h4 class="mb-3 text-2xl font-primary font-bold tracking-tight text-black sm:text-3xl"><?php the_field('nails_treatment_name'); ?></h4>
                    <ul role="list" class="space-y-4 text-black">
                        <?php
                        $benefits_content = get_field('nails_treatment_benefits');

                        $benefits_lines = explode("\n", $benefits_content);

                        foreach ($benefits_lines as $benefit_line) {
                            $benefit_line = trim($benefit_line);

                            if (!empty($benefit_line)) {
                        ?>
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-darkpink" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <p class="leading-tight text-sm sm:text-base"><?php echo esc_html($benefit_line); ?></p>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <!-- Tab Content For Details -->
                <div class="hidden p-4 bg-transparent" id="<?php echo esc_attr($tab_id); ?>-details" role="tabpanel" aria-labelledby="<?php echo esc_attr($tab_id); ?>-details-tab">
                    <h4 class="mb-3 text-2xl font-primary font-bold tracking-tight text-black sm:text-3xl"><?php the_field('nails_treatment_name'); ?></h4>
                    <dl class="grid max-w-screen-xl gap-4 mx-auto grid-cols-3 md:grid-cols-6">
                        <div class="flex flex-col">
                            <p class="mb-2 text-xl sm:text-2xl font-primary font-bold leading-7 tracking-tight text-black"><?php the_field('nails_treatment_duration'); ?></p>
                            <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink">perc</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-2 text-xl sm:text-2xl font-primary font-bold leading-7 tracking-tight text-black"><?php the_field('nails_treatment_steps'); ?></p>
                            <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink">lépés</p>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-2 text-xl sm:text-2xl font-primary font-bold leading-7 tracking-tight text-black"><?php the_field('nails_treatment_products'); ?></p>
                            <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink">termék</p>
                        </div>
                    </dl>
                </div>

            </div>
        </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'Hiba az alszolgáltatások betöltésekor.';
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