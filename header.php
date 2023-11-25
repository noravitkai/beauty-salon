<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo("name"); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<nav class="bg-whitesmoke text-base font-primary leading-7 tracking-tight text-black p-4">
    <div class="container mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Desktop Menu -->
        <ul class="hidden md:flex justify-between items-center w-full">
            <li><span class="text-xl sm:text-2xl font-secondary font-semibold leading-7 tracking-tight text-darkpink">GG Szépségstúdió</span></li>
            <li class="relative group">
                <a href="#" class="flex items-center hover:text-darkpink text-center">
                    <span>Szolgáltatások</span>
                    <svg class="ml-1 h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </a>
                <div class="absolute hidden bg-whitesmoke border-solid border-[0.075rem] border-black p-2 space-y-0.5 shadow-sm z-20 group-hover:block">
                    <a href="<?php echo get_permalink(get_page_by_title('Kozmetika')); ?>" class="block px-2 py-0.5 text-black hover:text-darkpink">Kozmetika</a>
                    <a href="<?php echo get_permalink(get_page_by_title('Fodrászat')); ?>" class="block px-2 py-0.5 text-black hover:text-darkpink">Fodrászat</a>
                    <a href="<?php echo get_permalink(get_page_by_title('Manikűr-pedikűr')); ?>" class="block px-2 py-0.5 text-black hover:text-darkpink">Manikűr-pedikűr</a>
                    <a href="<?php echo get_permalink(get_page_by_title('Természetgyógyászat')); ?>" class="block px-2 py-0.5 text-black hover:text-darkpink">Természetgyógyászat</a>
                </div>
            </li>
            <li><a href="<?php echo get_permalink(get_page_by_title('Galéria')); ?>" class="hover:text-darkpink text-center">Galéria</a></li>
            <li><a href="<?php echo get_permalink(get_page_by_title('Blog')); ?>" class="hover:text-darkpink text-center">Blog</a></li>
            <li><a href="<?php echo get_permalink(get_page_by_title('Kapcsolat')); ?>" class="hover:text-darkpink text-center">Kapcsolat</a></li>
        </ul>

        <!-- Hamburger Menu -->
        <div class="md:hidden flex items-center justify-between">
            <span class="text-xl sm:text-2xl font-secondary font-semibold leading-7 tracking-tight text-darkpink">GG Szépségstúdió</span>
            <button id="mobile-menu-button" class="text-black hover:text-darkpink">
                <svg id="menu-icon" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg id="close-icon" class="w-5 h-5 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" role="navigation" class="md:hidden bg-whitesmoke text-sm font-primary leading-7 tracking-tight text-black p-4 hidden">
    <ul class="flex flex-col space-y-4">
        <li><a href="<?php echo home_url(); ?>" class="hover:text-darkpink px-6">Főoldal</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Kozmetika')); ?>" class="hover:text-darkpink px-6">Kozmetika</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Fodrászat')); ?>" class="hover:text-darkpink px-6">Fodrászat</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Manikűr-pedikűr')); ?>" class="hover:text-darkpink px-6">Manikűr-pedikűr</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Természetgyógyászat')); ?>" class="hover:text-darkpink px-6">Természetgyógyászat</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Galéria')); ?>" class="hover:text-darkpink px-6">Galéria</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Blog')); ?>" class="hover:text-darkpink px-6">Blog</a></li>
        <li><a href="<?php echo get_permalink(get_page_by_title('Kapcsolat')); ?>" class="hover:text-darkpink px-6">Kapcsolat</a></li>
    </ul>
</div>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>