<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main>

<!-- Hero Section -->
<section class="relative bg-lightpink">
  <div class="py-10 sm:pt-24 sm:pb-20 lg:mx-auto lg:max-w-7xl lg:items-center relative">
    <div class="px-6 lg:px-8">
      <div class="mx-auto max-w-lg lg:mx-0 flex flex-col items-center text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14 w-full"><?php the_field('hero_heading_1') ?></h1>
        <h2 class="mt-12 text-3xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-5xl relative z-20"><?php the_field('hero_heading_2') ?></h2>
        <p class="mt-10 text-base sm:text-lg font-primary leading-7 tracking-tight text-black"><?php the_field('hero_description') ?></p>
        <a href="#szolgaltatasok" class="mt-10 gap-x-6 group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
          <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
          <span class="relative group-hover:text-lightpink"><?php the_field('hero_button') ?></span>
        </a>
      </div>
    </div>
  </div>
  <div class="lg:absolute lg:inset-0 lg:left-1/2">
    <?php $hero_image = get_field('hero_image'); ?>
    <img class="h-64 w-full bg-gray-50 object-cover sm:h-96 lg:absolute lg:h-full" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">  
  </div>
</section>


<!-- Services Section -->
<section class="bg-whitesmoke py-10 sm:py-24 relative" id="szolgaltatasok">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('services_heading') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('services_subheading') ?></h3>
        </div>

        <div class="mx-auto grid grid-cols-1 gap-x-10 gap-y-10 sm:gap-y-10 lg:mx-0 lg:max-w-none lg:grid-cols-2 relative">
            <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2">

            <?php
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );

            $services_query = new WP_Query($args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
            ?>
                    <div class="border-solid border-[0.075rem] border-black p-6 flex items-center shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        <div class="mr-6 w-4/12">
                            <?php $service_icon = get_field('service_icon'); ?>
                            <?php if ($service_icon) : ?>
                                <img src="<?php echo esc_url($service_icon['url']); ?>" alt="<?php echo esc_attr($service_icon['alt']); ?>" class="max-w-full">
                            <?php endif; ?>
                        </div>
                        <div class="w-8/12">
                            <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black">
                                <?php the_field('service_name'); ?>
                            </h4>
                            <p class="mt-1 mb-6 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('service_description'); ?></p>
                            
                            <?php
                            $current_service_link = get_field('service_link');
                            $service_permalink = home_url($current_service_link);
                            ?>
                            <a href="<?php echo esc_url($service_permalink); ?>" class="gap-x-6 group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
                                <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                <span class="relative group-hover:text-whitesmoke">Tovább</span>
                            </a>

                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'Jelenleg nincs szolgáltatásunk.';
            endif;
            ?>


            </dl>
        </div>
    </div>
</section>

<!-- Company & Values Section -->
<section class="bg-lightpink py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid grid-cols-1 lg:mx-0 lg:max-w-none lg:grid-cols-2 gap-x-8">

            <div class="flex flex-col lg:order-2 mb-8 lg:mb-0">
                <div class="mx-auto max-w-2xl">
                    <div class="mb-10 flex justify-center">
                        <h2 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('company_heading') ?></h2>
                        <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-3xl relative z-20"><?php the_field('company_subheading') ?></h3>
                    </div>
                </div>

                <p class="mb-10 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('company_description') ?></p>

                <?php
                $args = array(
                    'post_type' => 'value',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );

                $values_query = new WP_Query($args);

                if ($values_query->have_posts()) :
                    while ($values_query->have_posts()) : $values_query->the_post();
                ?>

                <div class="relative pl-9 mb-2">
                    <h4 class="inline text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black">
                        <svg class="absolute left-0 top-1 h-5 w-5 text-darkpink" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                        <?php the_field('value_name') ?>
                    </h4>
                    <p class="inline text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php the_field('value_description') ?></p>
                </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'Hiba az értékek betöltésekor.';
                endif;
                ?>
            </div>

            <div class="flex flex-col lg:order-1">
                <?php $company_image = get_field('company_image'); ?>
                <?php if ($company_image) : ?>
                    <img src="<?php echo esc_url($company_image['url']); ?>" alt="<?php echo esc_attr($company_image['alt']); ?>" class="h-full w-full object-cover border-solid border-[0.075rem] border-black p-2 shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
        <div class="mx-auto max-w-2xl">
            <div class="mb-16 flex justify-center">
                <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('team_heading') ?></h2>
                <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-3xl relative z-20"><?php the_field('team_subheading') ?></h3>
            </div>
        </div>

        <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 sm:gap-y-16 gap-y-10 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            
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
                    <li>
                    <?php $member_image_1 = get_field('member_image_1'); ?>
                    <?php if ($member_image_1) : ?>
                        <a href="<?php echo get_permalink( get_page_by_title( 'Rólunk' ) ); ?>">
                            <img src="<?php echo esc_url($member_image_1['url']); ?>" alt="<?php echo esc_attr($member_image_1['alt']); ?>" class="mx-auto h-56 w-56 rounded-full object-cover shadow-sm transition duration-300 ease-in-out hover:scale-110">
                        </a>
                    <?php endif; ?>
                        <h4 class="mt-6 text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black"><?php the_title(); ?></h4>
                        <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink"><?php the_field('member_position'); ?></p>
                        <ul role="list" class="mt-6 flex justify-center gap-x-6">
                            <li>
                                <a href="tel:<?php echo esc_attr(get_field('member_phone_number')); ?>" class="text-lightpink hover:text-darkpink">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                                        <path d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
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

<!-- Contact Section -->
<section class="bg-lightpink py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('contact_form_heading') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black sm:mt-10 sm:text-3xl relative z-20"><?php the_field('contact_form_subheading') ?></h3>
        </div>

        <form accept-charset="UTF-8" action="https://www.formbackend.com/f/be68403e9bd86075" method="POST" class="flex flex-wrap justify-center">
            <div class="mb-4 mx-2 flex-grow">
                <input type="text" id="last-name" name="last-name" required class="w-full shadow-sm focus:shadow-lg focus:outline-darkpink focus:outline-none focus:ring-0 border-solid border-[0.075rem] border-black bg-transparent p-2 placeholder-darkpink font-primary rounded-none" placeholder="Vezetéknév">
            </div>
            <div class="mb-4 mx-2 flex-grow">
                <input type="text" id="first-name" name="first-name" required class="w-full shadow-sm focus:shadow-lg focus:outline-darkpink focus:outline-none focus:ring-0 border-solid border-[0.075rem] border-black bg-transparent p-2 placeholder-darkpink font-primary rounded-none" placeholder="Keresztnév">
            </div>
            <div class="mb-4 mx-2 flex-grow">
                <input type="email" id="email" name="email" required class="w-full shadow-sm focus:shadow-lg focus:outline-darkpink focus:outline-none focus:ring-0 border-solid border-[0.075rem] border-black bg-transparent p-2 placeholder-darkpink font-primary rounded-none" placeholder="Email cím">
            </div>
            <div class="mb-4 mx-2 flex-grow">
                <input type="tel" id="phone" name="phone" class="w-full shadow-sm focus:shadow-lg focus:outline-darkpink border-solid focus:outline-none focus:ring-0 border-[0.075rem] border-black bg-transparent p-2 placeholder-darkpink font-primary rounded-none" placeholder="Telefonszám">
            </div>
            <div class="mb-4 mx-2 w-full">
                <textarea id="message" name="message" required class="w-full h-32 shadow-sm focus:shadow-lg focus:outline-darkpink focus:outline-none focus:ring-0 border-solid border-[0.075rem] border-black bg-transparent p-2 placeholder-darkpink font-primary rounded-none" placeholder="Üzenet tartalma"></textarea>
            </div>
            <div class="mx-2 w-full flex justify-center">
                <button type="submit" class="gap-x-6 group relative overflow-hidden px-3.5 py-2.5 text-sm sm:text-base font-primary font-semibold text-black shadow-sm border-solid border-[0.075rem] border-black">
                    <div class="absolute inset-0 w-3 bg-darkpink transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative group-hover:text-lightpink">Küldés</span>
                </button>
            </div>
        </form>
    </div>
</section>

</main>

<?php get_footer(); ?>