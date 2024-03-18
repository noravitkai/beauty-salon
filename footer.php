<!-- Scroll To Top Button -->
<button id="scroll-to-top-btn" class="fixed bottom-4 right-4 sm:bottom-5 sm:right-5 bg-darkpink text-whitesmoke hover:scale-110 transition duration-300 ease-in-out rounded-full shadow-sm p-1 sm:p-2 hidden">
    <svg class="h-3 w-3 sm:w-4 sm:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
    </svg>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var scrollToTopButton = document.getElementById('scroll-to-top-btn');

        // Show or hide the button based on scroll position
        window.addEventListener('scroll', function () {
            if (window.scrollY > 200) {
                scrollToTopButton.classList.remove('hidden');
            } else {
                scrollToTopButton.classList.add('hidden');
            }
        });

        // Scroll to top when the button is clicked
        scrollToTopButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>

<footer class="bg-whitesmoke">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-10 sm:pt-24 pb-8 sm:pb-8">
        <div class="grid grid-cols-2 gap-4 sm:gap-6 gap-x-24 sm:grid-cols-3 mx-2">

            <?php
            $args = array(
                'post_type' => 'footer',
                'posts_per_page' => -1,
                'order' => 'ASC',
            );

            $footer_query = new WP_Query($args);

            if ($footer_query->have_posts()) :
                while ($footer_query->have_posts()) : $footer_query->the_post();
            ?>

            <div class="flex flex-col justify-start items-start">
                <h5 class="mb-2 sm:mb-6 text-xs sm:text-sm font-primary leading-7 tracking-tight text-darkpink uppercase">Oldaltérkép</h5>
                <ul class="text-xs sm:text-sm font-primary leading-7 tracking-tight text-black">
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_home_url(); ?>" class="hover:text-darkpink">Főoldal</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Kozmetika')); ?>" class="hover:text-darkpink">Kozmetika</a>
                    </li>
                    <li class="mmb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Fodrászat')); ?>" class="hover:text-darkpink">Fodrászat</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Manikűr-pedikűr')); ?>" class="hover:text-darkpink">Manikűr-pedikűr</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Természetgyógyászat')); ?>" class="hover:text-darkpink">Természetgyógyászat</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Rólunk')); ?>" class="hover:text-darkpink">Rólunk</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Galéria')); ?>" class="hover:text-darkpink">Galéria</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Blog')); ?>" class="hover:text-darkpink">Blog</a>
                    </li>
                    <li class="mb-1 sm:mb-4">
                    <a href="<?php echo get_permalink(get_page_by_title('Kapcsolat')); ?>" class="hover:text-darkpink">Kapcsolat</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col items-start sm:items-center">
                <h5 class="mb-2 sm:mb-6 text-xs sm:text-sm font-primary leading-7 tracking-tight text-darkpink uppercase">Közösségi média</h5>
                <ul>
                    <li class="mb-4">
                    <a href="<?php echo esc_url(get_field('social_link_1')); ?>" class="text-lightpink hover:text-darkpink" target="_blank" rel="noopener noreferrer">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                    <li>
                    <a href="<?php echo esc_url(get_field('social_link_2')); ?>" class="text-lightpink hover:text-darkpink" target="_blank" rel="noopener noreferrer">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                </ul>
            </div>
            <div class="flex flex-col items-start sm:items-end text-right">
                <h5 class="mb-2 sm:mb-6 text-xs sm:text-sm font-primary leading-7 tracking-tight text-darkpink uppercase">Adatvédelem</h5>
                <ul class="text-xs sm:text-sm font-primary leading-7 tracking-tight text-black">
                    <li class="mb-1 sm:mb-4">
                        <?php
                        $privacy_policy_field = get_field('privacy_policy');
                        $privacy_policy_url = is_array($privacy_policy_field) ? $privacy_policy_field['url'] : $privacy_policy_field;
                        if ($privacy_policy_url) {
                            echo '<a href="' . esc_url($privacy_policy_url) . '" target="_blank" rel="noopener noreferrer" class="hover:text-darkpink text-center">Szabályzat</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>

            <?php
            endwhile;
                wp_reset_postdata();
            else :
                echo 'Jelenleg nincs szolgáltatásunk.';
            endif;
            ?>

        </div>
        <hr class="my-6 border-lightpink sm:mx-auto dark:border-gray-700 lg:my-8" />
        <p class="text-center text-xs sm:text-sm font-primary leading-7 tracking-tight text-darkpink">&copy; 2023. <span class="font-secondary text-base sm:text-lg">GG Szépségstúdió.</span> Minden jog fenntartva.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>