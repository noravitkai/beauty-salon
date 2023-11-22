<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main>

    <!-- Hero Section -->
    <div class="relative bg-lightpink">
        <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8">
            <div class="px-6 py-10 sm:py-32 lg:col-span-7 lg:px-0 lg:py-48 xl:col-span-6 relative">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h1 class="text-6xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl opacity-50 absolute z-10 lg:top-40 md:top-24 top-12"><?php the_field('hero_heading_1') ?></h1>
                    <h2 class="mt-12 text-3xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-5xl relative z-20"><?php the_field('hero_heading_2') ?></h2>
                    <button class="mt-10 gap-x-6 group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
                        <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                        <span class="relative group-hover:text-lightpink"><?php the_field('hero_button') ?></span>
                    </button>
                </div>
            </div>
            <div class="relative lg:col-span-5 lg:-mr-8 xl:absolute xl:inset-0 xl:left-1/2 xl:mr-0">
                <?php $hero_image = get_field('hero_image'); ?>
                <img class="aspect-[3/2] w-full object-cover lg:absolute lg:inset-0 lg:aspect-auto lg:h-full" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">  
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>