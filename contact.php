<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<main>

<!-- Header -->
<section class="relative isolate overflow-hidden px-6 py-24 sm:py-32 lg:px-8">
    <?php $contact_header = get_field('contact_header'); ?>
    <?php if ($contact_header) : ?>
        <div class="absolute inset-0 -z-10 h-full w-full object-cover">
            <img src="<?php echo esc_url($contact_header['url']); ?>" alt="<?php echo esc_attr($contact_header['alt']); ?>" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-darkpink opacity-30"></div>
        </div>
    <?php endif; ?>
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-5xl font-secondary font-bold tracking-tight text-whitesmoke sm:text-8xl"><?php the_field('contact_heading') ?></h1>
    </div>
</section>

<!-- Contact Info + Opening Hours -->
<section class="bg-whitesmoke py-10 sm:py-24 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-16 flex justify-center">
            <h2 class="text-5xl font-secondary font-bold tracking-tight text-lightpink sm:text-8xl opacity-50 absolute z-10 lg:top-16 md:top-16 top-14"><?php the_field('contact_subheading_1') ?></h2>
            <h3 class="mt-12 text-2xl font-primary font-bold tracking-tight text-black text-center sm:mt-10 sm:text-3xl relative z-20"><?php the_field('contact_subheading_2') ?></h3>
        </div>

        <div class="mx-auto grid max-w-7xl sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-10 sm:gap-y-10 lg:mx-0 lg:max-w-none relative">

            <!-- Location + Business Hours Card -->
            <div class="border-solid border-[0.075rem] border-black p-6 flex flex-col items-center text-center shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="mb-6 w-4/12">
                    <?php $card_graphic_1 = get_field('card_graphic_1'); ?>
                    <?php if ($card_graphic_1) : ?>
                        <img src="<?php echo esc_url($card_graphic_1['url']); ?>" alt="<?php echo esc_attr($card_graphic_1['alt']); ?>" class="max-w-full mx-auto">
                    <?php endif; ?>
                </div>
                <div class="w-8/12">
                    <div class="mb-4">
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black flex items-center justify-center">
                            <svg class="inline-block w-4 h-4 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 21">
                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M8 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    <path d="M13.8 12.938h-.01a7 7 0 1 0-11.465.144h-.016l.141.17c.1.128.2.252.3.372L8 20l5.13-6.248c.193-.209.373-.429.54-.66l.13-.154Z"/>
                                </g>
                            </svg>
                            <?php the_field('location_heading') ?>
                        </h4>
                        <p class="mt-1 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php echo nl2br(get_field('location')); ?></p>
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black flex items-center justify-center">
                            <svg class="inline-block w-4 h-4 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <?php the_field('business_hours_heading') ?></h4>
                        <p class="mt-1 text-sm sm:text-base font-primary leading-7 tracking-tight text-black"><?php echo nl2br(get_field('business_hours_schedule')); ?></p>
                    </div>
                </div>
            </div>

            <!-- Phone Numbers Card -->
            <div class="border-solid border-[0.075rem] border-black p-6 flex flex-col items-center text-center shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div>
                    <div>
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black flex items-center justify-content">
                            <svg class="inline-block w-4 h-4 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.344 12.168-1.4-1.4a1.98 1.98 0 0 0-2.8 0l-.7.7a1.98 1.98 0 0 1-2.8 0l-2.1-2.1a1.98 1.98 0 0 1 0-2.8l.7-.7a1.981 1.981 0 0 0 0-2.8l-1.4-1.4a1.828 1.828 0 0 0-2.8 0C-.638 5.323 1.1 9.542 4.78 13.22c3.68 3.678 7.9 5.418 11.564 1.752a1.828 1.828 0 0 0 0-2.804Z"/>
                            </svg>
                            <?php the_field('phone_numbers_heading') ?>
                        </h4>

                        <?php
                        $args = array(
                            'post_type' => 'team-member',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        );

                        $members_query = new WP_Query($args);

                        if ($members_query->have_posts()) :
                            $total_posts = $members_query->found_posts;
                            $current_post = 0;

                            while ($members_query->have_posts()) : $members_query->the_post();
                                $current_post++;
                        ?>
                                <div class="mt-1 text-sm sm:text-base font-primary leading-7 tracking-tight text-black">
                                    <h5 class="font-semibold"><?php the_field('member_name'); ?></h5>
                                    <p class="text-black"><?php the_field('member_position'); ?></p>
                                    <p class="text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink hover:text-lightpink<?php echo ($current_post === $total_posts) ? '' : ' mb-4'; ?>">
                                        <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_field('member_phone_number'))); ?>">
                                            <?php the_field('member_phone_number'); ?>
                                        </a>
                                    </p>
                                </div>

                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo 'Hiba a betöltéskor.';
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <!-- Contact Card -->
            <div class="border-solid border-[0.075rem] border-black p-6 flex flex-col items-center text-center shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105 lg:col-span-1 md:col-span-full sm:col-span-1">
                <div class="mb-6 w-4/12">
                    <?php $card_graphic_2 = get_field('card_graphic_2'); ?>
                    <?php if ($card_graphic_2) : ?>
                        <img src="<?php echo esc_url($card_graphic_2['url']); ?>" alt="<?php echo esc_attr($card_graphic_2['alt']); ?>" class="max-w-full mx-auto">
                    <?php endif; ?>
                </div>
                <div class="w-8/12">
                    <div class="mb-4">
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black">
                            <svg class="inline-block w-4 h-4 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 2-8.4 7.05a1 1 0 0 1-1.2 0L1 2m18 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1m18 0v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2"/>
                            </svg>
                            <?php the_field('email_heading') ?>
                        </h4>
                        <p class="mt-1 text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink hover:text-lightpink">
                            <a href="mailto:<?php echo antispambot(get_field('email')); ?>"><?php the_field('email'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-primary font-semibold leading-7 tracking-tight text-black">
                            <svg class="inline-block w-4 h-4 text-black mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                            </svg>
                            <?php the_field('social_heading') ?>
                        </h4>
                        <p class="mt-1 text-sm sm:text-base font-primary leading-7 tracking-tight text-darkpink hover:text-lightpink">
                            <a href="<?php the_field('social_link'); ?>" target="_blank" rel="noopener noreferrer"><?php the_field('social_site'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Google Maps !-->
        <div class="mt-10">
            <div class="border-solid border-[0.075rem] border-black shadow-sm hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2716.0254944110447!2d17.91151907639677!3d47.09857087114776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47699a63df582613%3A0x7d8f171d9d9ac6f!2zR0cgU3rDqXBzw6lnc3TDumRpw7M!5e0!3m2!1shu!2sdk!4v1701339005566!5m2!1shu!2sdk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
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