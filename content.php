<?php


// Load and decode the JSON file
$jsonPath = __DIR__ . '/public/data/page-content.json';
$pageContent = json_decode(file_get_contents($jsonPath), true);

// Access the hero section data
$heroSection = $pageContent['heroSection'] ?? [];

// Access the pricing section data
$pricingSection = $pageContent['pricingSection'] ?? [];

// Access the benefits section data
$benefitsSection = $pageContent['benefitsSection'] ?? [];
$images = $benefitsSection['images'] ?? [];

// Access the testimonials section data
$testimonialsSection = $pageContent['testimonialsSection'] ?? [];
$carouselSettings = $testimonialsSection['carouselSettings'] ?? [];

// Access the guarantee section data
$guaranteeSection = $pageContent['guaranteeSection'] ?? [];

// Access the solutions section data
$solutionsSection = $pageContent['solutionsSection'] ?? [];
$button = $solutionsSection['button'] ?? [];

// Access the ingredients section data
$ingredientsSection = $pageContent['ingredientsSection'] ?? [];
$checkIcon = [
    'viewBox' => '0 0 512 512',
    'path' => 'M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7.1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z'
];
$productSection = $pageContent['productSection'] ?? [];

// Access the contact info
$contactInfo = $pageContent['contactInfo'] ?? [];

// Helper function to replace Laravel's e() helper
function escape($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function generate_edit_button($section, $type = 'text') {
    // Only generate edit buttons for logged-in users
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        return '<button class="edit-button" onclick="openEditModal(\'' . $section . '\', \'' . $type . '\')">Edit</button>';
    }
    return ''; // Return empty string for non-logged in users
}

?>

<div class="cartflows-container">

        <div data-elementor-type="wp-post" data-elementor-id="23" class="elementor elementor-23"
            data-elementor-post-type="cartflows_step">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <button class="edit-button" onclick="openEditModal('heroBackground', 'image')">Edit Background Image</button>
            <?php endif; ?>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-7046c9b elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                data-id="7046c9b" data-element_type="section"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;curve&quot;,&quot;shape_divider_bottom_negative&quot;:&quot;yes&quot;}"
                style="background-image: url('<?php echo escape($heroSection['backgroundImage'] ?? 'wp-content/uploads/2025/01/IMG_20240815_000203-1-1.jpg'); ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;">

                <div class="elementor-background-overlay"></div>
                <div class="elementor-shape elementor-shape-bottom" data-negative="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path class="elementor-shape-fill"
                            d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z" />
                    </svg> </div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b126d27"
                        data-id="b126d27" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-acb9bc8 elementor-widget elementor-widget-heading"
                                data-id="acb9bc8" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="heroTitle">
                                        <?php echo escape($heroSection['title']); ?>
                                        <?php echo generate_edit_button('heroTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-683804b elementor-widget elementor-widget-heading"
                                data-id="683804b" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="heroSubtitle">
                                        <?php echo escape($heroSection['subtitle']); ?>
                                        <?php echo generate_edit_button('heroSubtitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-e63cb93 elementor-align-center elementor-widget elementor-widget-button"
                                data-id="e63cb93" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="<?php echo escape($heroSection['ctaButton']['link'] ?? '#'); ?>">
                                            <span class="elementor-button-content-wrapper">
                                                <?php if(isset($heroSection['ctaButton']['icon'])): ?>
                                                <span class="elementor-button-icon">
                                                    <svg aria-hidden="true" class="e-font-icon-svg e-<?php echo escape($heroSection['ctaButton']['icon']); ?>"
                                                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M428.8 137.6h-86.177a115.52 115.52 0 0 0 2.176-22.4c0-47.914-35.072-83.2-92-83.2-45.314 0-57.002 48.537-75.707 78.784-7.735 12.413-16.994 23.317-25.851 33.253l-.131.146-.129.148C135.662 161.807 127.764 168 120.8 168h-2.679c-5.747-4.952-13.536-8-22.12-8H32c-17.673 0-32 12.894-32 28.8v230.4C0 435.106 14.327 448 32 448h64c8.584 0 16.373-3.048 22.12-8h2.679c28.688 0 67.137 40 127.2 40h21.299c62.542 0 98.8-38.658 99.94-91.145 12.482-17.813 18.491-40.785 15.985-62.791A93.148 93.148 0 0 0 393.152 304H428.8c45.435 0 83.2-37.584 83.2-83.2 0-45.099-38.101-83.2-83.2-83.2zm0 118.4h-91.026c12.837 14.669 14.415 42.825-4.95 61.05 11.227 19.646 1.687 45.624-12.925 53.625 6.524 39.128-10.076 61.325-50.6 61.325H248c-45.491 0-77.21-35.913-120-39.676V215.571c25.239-2.964 42.966-21.222 59.075-39.596 11.275-12.65 21.725-25.3 30.799-39.875C232.355 112.712 244.006 80 252.8 80c23.375 0 44 8.8 44 35.2 0 35.2-26.4 53.075-26.4 70.4h158.4c18.425 0 35.2 16.5 35.2 35.2 0 18.975-16.225 35.2-35.2 35.2zM88 384c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <?php endif; ?>
                                                <span class="elementor-button-text" data-section="heroSection">
                                                    <?php echo escape($heroSection['ctaButton']['text']); ?>
                                                </span>
                                            </span>
                                        </a>
                                        <?php echo generate_edit_button('heroSection', 'text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-acbd3ea elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="acbd3ea" data-element_type="section"
                data-settings="{&quot;shape_divider_bottom&quot;:&quot;opacity-fan&quot;}">
                <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 19.6" preserveAspectRatio="none">
                        <path class="elementor-shape-fill" style="opacity:0.33"
                            d="M0 0L0 18.8 141.8 4.1 283.5 18.8 283.5 0z" />
                        <path class="elementor-shape-fill" style="opacity:0.33"
                            d="M0 0L0 12.6 141.8 4 283.5 12.6 283.5 0z" />
                        <path class="elementor-shape-fill" style="opacity:0.33"
                            d="M0 0L0 6.4 141.8 4 283.5 6.4 283.5 0z" />
                        <path class="elementor-shape-fill" d="M0 0L0 1.2 141.8 4 283.5 1.2 283.5 0z" />
                    </svg>
                </div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ac82298"
                        data-id="ac82298" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-0ca617b elementor-align-center elementor-widget elementor-widget-button"
                                data-id="0ca617b" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="<?php echo escape($pricingSection['checkPriceButton']['link'] ?? '#'); ?>">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text" data-section="checkPriceButtonText">
                                                    <?php echo escape($pricingSection['checkPriceButton']['text']); ?>
                                                    <?php echo generate_edit_button('checkPriceButtonText', 'text'); ?>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-c325c19 elementor-headline--style-highlight elementor-widget elementor-widget-animated-headline"
                                data-id="c325c19" data-element_type="widget"
                                data-settings="{&quot;marker&quot;:&quot;x&quot;,&quot;highlighted_text&quot;:&quot;<?php echo escape($pricingSection['regularPrice']['amount']); ?>&quot;,&quot;headline_style&quot;:&quot;highlight&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;highlight_animation_duration&quot;:1200,&quot;highlight_iteration_delay&quot;:8000}"
                                data-widget_type="animated-headline.default">
                                <div class="elementor-widget-container">
                                    <h3 class="elementor-headline">
                                        <span class="elementor-headline-plain-text elementor-headline-text-wrapper" data-section="regularPriceLabel">
                                            <?php echo escape($pricingSection['regularPrice']['label']); ?>
                                            <?php echo generate_edit_button('regularPriceLabel', 'text'); ?>
                                        </span>
                                        <span class="elementor-headline-dynamic-wrapper elementor-headline-text-wrapper">
                                            <span class="elementor-headline-dynamic-text elementor-headline-text-active" data-section="regularPriceAmount">
                                                <?php echo escape($pricingSection['regularPrice']['amount']); ?>
                                                <?php echo generate_edit_button('regularPriceAmount', 'text'); ?>
                                            </span>
                                        </span>
                                        <span class="elementor-headline-plain-text elementor-headline-text-wrapper" data-section="regularPriceCurrency">
                                            <?php echo escape($pricingSection['regularPrice']['currency']); ?>
                                            <?php echo generate_edit_button('regularPriceCurrency', 'text'); ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-cf00dc1 elementor-headline--style-highlight elementor-widget elementor-widget-animated-headline"
                                data-id="cf00dc1" data-element_type="widget"
                                data-settings="{&quot;highlighted_text&quot;:&quot;<?php echo escape($pricingSection['offerPrice']['amount']); ?>&quot;,&quot;headline_style&quot;:&quot;highlight&quot;,&quot;marker&quot;:&quot;circle&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;highlight_animation_duration&quot;:1200,&quot;highlight_iteration_delay&quot;:8000}"
                                data-widget_type="animated-headline.default">
                                <div class="elementor-widget-container">
                                    <h3 class="elementor-headline">
                                        <span class="elementor-headline-plain-text elementor-headline-text-wrapper" data-section="offerPriceLabel">
                                            <?php echo escape($pricingSection['offerPrice']['label']); ?>
                                            <?php echo generate_edit_button('offerPriceLabel', 'text'); ?>
                                        </span>
                                        <span class="elementor-headline-dynamic-wrapper elementor-headline-text-wrapper">
                                            <span class="elementor-headline-dynamic-text elementor-headline-text-active" data-section="offerPriceAmount">
                                                <?php echo escape($pricingSection['offerPrice']['amount']); ?>
                                                <?php echo generate_edit_button('offerPriceAmount', 'text'); ?>
                                            </span>
                                        </span>
                                        <span class="elementor-headline-plain-text elementor-headline-text-wrapper" data-section="offerPriceCurrency">
                                            <?php echo escape($pricingSection['offerPrice']['currency']); ?>
                                            <?php echo generate_edit_button('offerPriceCurrency', 'text'); ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-c714ef5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="c714ef5" data-element_type="section"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b732e0d"
                        data-id="b732e0d" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-890ee84 elementor-widget elementor-widget-heading"
                                data-id="890ee84" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="benefitsTitle">
                                        <?php echo escape($benefitsSection['title']); ?>
                                        <?php echo generate_edit_button('benefitsTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-571e5eb elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="571e5eb" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <?php foreach (($images['productImages'] ?? []) as $index => $image): ?>
                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element"
                                        data-id="7d4ed6a" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-widget elementor-widget-image"
                                                data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <img <?php echo $index === 0 ? 'fetchpriority="high"' : ''; ?>
                                                        decoding="async"
                                                        width="<?php echo escape($image['width']); ?>"
                                                        height="<?php echo escape($image['height']); ?>"
                                                        src="<?php echo escape($image['src']); ?>"
                                                        class="attachment-large size-large"
                                                        alt="<?php echo escape($image['alt']); ?>"

                                                        sizes="(max-width: <?php echo escape($image['width']); ?>px) 100vw, <?php echo escape($image['width']); ?>px" />
                                                    <?php echo generate_edit_button('productImage' . $index, 'image'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                            <div class="elementor-element elementor-element-a9e9f4c elementor-widget elementor-widget-image"
                                data-id="a9e9f4c" data-element_type="widget" data-widget_type="image.default">
                                <div class="elementor-widget-container">
                                    <?php if (isset($images['bottomImage'])): ?>

                                    <img
                                        width="<?php echo escape($images['bottomImage']['width']); ?>"
                                        height="<?php echo escape($images['bottomImage']['height']); ?>"
                                        src="<?php echo escape($images['bottomImage']['src']); ?>"
                                        class="attachment-large size-large"
                                        alt="<?php echo escape($images['bottomImage']['alt']); ?>"
                                        sizes="(max-width: <?php echo escape($images['bottomImage']['width']); ?>px) 100vw, <?php echo escape($images['bottomImage']['width']); ?>px" />
                                    <?php echo generate_edit_button('bottomImage', 'image'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-2d2519c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="2d2519c" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4abe0f1"
                        data-id="4abe0f1" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-1c86491 elementor-widget elementor-widget-heading"
                                data-id="1c86491" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="testimonialsTitle">
                                        <?php echo escape($testimonialsSection['title']); ?>
                                        <?php echo generate_edit_button('testimonialsTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9c1bd39 elementor-arrows-position-inside elementor-pagination-position-outside elementor-widget elementor-widget-image-carousel"
                                data-id="9c1bd39" data-element_type="widget"
                                data-settings="{&quot;slides_to_show&quot;:&quot;<?php echo escape($carouselSettings['slidesToShow']); ?>&quot;,&quot;navigation&quot;:&quot;<?php echo escape($carouselSettings['navigation']); ?>&quot;,&quot;autoplay&quot;:&quot;<?php echo escape($carouselSettings['autoplay']); ?>&quot;,&quot;pause_on_hover&quot;:&quot;<?php echo escape($carouselSettings['pauseOnHover']); ?>&quot;,&quot;pause_on_interaction&quot;:&quot;<?php echo escape($carouselSettings['pauseOnInteraction']); ?>&quot;,&quot;autoplay_speed&quot;:<?php echo escape($carouselSettings['autoplaySpeed']); ?>,&quot;infinite&quot;:&quot;<?php echo escape($carouselSettings['infinite']); ?>&quot;,&quot;speed&quot;:<?php echo escape($carouselSettings['speed']); ?>}"
                                data-widget_type="image-carousel.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-image-carousel-wrapper swiper" role="region"
                                        aria-roledescription="carousel" aria-label="Image Carousel" dir="ltr">
                                        <div class="elementor-image-carousel swiper-wrapper" aria-live="off">
                                            <?php foreach (($testimonialsSection['testimonialImages'] ?? []) as $index => $image): ?>
                                            <div class="swiper-slide" role="group" aria-roledescription="slide"
                                                aria-label="<?php echo escape($index + 1); ?> of <?php echo escape(count($testimonialsSection['testimonialImages'])); ?>">
                                                <figure class="swiper-slide-inner">
                                                    <img decoding="async"
                                                        class="swiper-slide-image"
                                                        src="<?php echo escape($image['src']); ?>"
                                                        alt="<?php echo escape($image['alt']); ?>" />
                                                    <?php echo generate_edit_button('testimonialImage' . $index, 'image'); ?>
                                                </figure>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="elementor-swiper-button elementor-swiper-button-prev" role="button"
                                            tabindex="0">
                                            <svg aria-hidden="true" class="e-font-icon-svg e-eicon-chevron-left"
                                                viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M646 125C629 125 613 133 604 142L308 442C296 454 292 471 292 487 292 504 296 521 308 533L604 854C617 867 629 875 646 875 663 875 679 871 692 858 704 846 713 829 713 812 713 796 708 779 692 767L438 487 692 225C700 217 708 204 708 187 708 171 704 154 692 142 675 129 663 125 646 125Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="elementor-swiper-button elementor-swiper-button-next" role="button"
                                            tabindex="0">
                                            <svg aria-hidden="true" class="e-font-icon-svg e-eicon-chevron-right"
                                                viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M696 533C708 521 713 504 713 487 713 471 708 454 696 446L400 146C388 133 375 125 354 125 338 125 325 129 313 142 300 154 292 171 292 187 292 204 296 221 308 233L563 492 304 771C292 783 288 800 288 817 288 833 296 850 308 863 321 871 338 875 354 875 371 867 388 854L696 533Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-792a965 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="792a965" data-element_type="section"
                data-settings="{&quot;background_background&quot;:&quot;<?php echo escape($guaranteeSection['backgroundColor']); ?>&quot;}">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3b2ffe1"
                        data-id="3b2ffe1" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-97a41fc elementor-widget elementor-widget-heading"
                                data-id="97a41fc" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="guaranteeTitle">
                                        <?php echo escape($guaranteeSection['title']); ?>
                                        <?php echo generate_edit_button('guaranteeTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-e445af8 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="e445af8" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-36e2ea7"
                        data-id="36e2ea7" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-c408f25 elementor-widget elementor-widget-heading"
                                data-id="c408f25" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="solutionsTitle">
                                        <?php echo escape($solutionsSection['title']); ?>
                                        <?php echo generate_edit_button('solutionsTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-373de2d elementor-align-center elementor-widget elementor-widget-button"
                                data-id="373de2d" data-element_type="widget" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a class="elementor-button elementor-button-link elementor-size-sm"
                                            href="<?php echo escape($button['href']); ?>">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-icon">
                                                    <svg aria-hidden="true"
                                                        class="e-font-icon-svg e-far-hand-point-right"
                                                        viewBox="<?php echo escape($button['icon']['viewBox']); ?>"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="<?php echo escape($button['icon']['path']); ?>">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <span class="elementor-button-text" data-section="solutionsButton">
                                                    <?php echo escape($button['text']); ?>
                                                    <?php echo generate_edit_button('solutionsButton', 'text'); ?>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
$ingredientsSection = $pageContent['ingredientsSection'] ?? [];
$checkIcon = [
    'viewBox' => '0 0 512 512',
    'path' => 'M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7.1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z'
];
?>

<section class="elementor-section elementor-top-section elementor-element elementor-element-9a45dbf elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="9a45dbf" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0e424df"
            data-id="0e424df" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Title Section -->
                <div class="elementor-element elementor-element-8088753 elementor-widget elementor-widget-heading"
                    data-id="8088753" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default" data-section="ingredientsTitle">
                            <?php echo escape($ingredientsSection['title']); ?>
                            <?php echo generate_edit_button('ingredientsTitle', 'text'); ?>
                        </h2>
                    </div>
                </div>

                <!-- Benefits List -->
                <div class="elementor-element elementor-element-1ca47ae elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                    data-id="1ca47ae" data-element_type="widget" data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                        <ul class="elementor-icon-list-items">
                            <?php foreach (($ingredientsSection['benefits'] ?? []) as $index => $benefit): ?>
                            <li class="elementor-icon-list-item">
                                <span class="elementor-icon-list-icon">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-check-double"
                                        viewBox="<?php echo escape($checkIcon['viewBox']); ?>" xmlns="http://www.w3.org/2000/svg">
                                        <path d="<?php echo escape($checkIcon['path']); ?>"></path>
                                    </svg>
                                </span>
                                <span class="elementor-icon-list-text" data-section="ingredientsBenefit<?php echo $index; ?>">
                                    <?php echo escape($benefit); ?>
                                    <?php echo generate_edit_button('ingredientsBenefit' . $index, 'text'); ?>
                                </span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Ingredients Grid -->

            </div>
        </div>
    </div>
</section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-202407e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="202407e" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1711483"
                        data-id="1711483" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-c23979e elementor-widget elementor-widget-heading"
                                data-id="c23979e" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="instructionsTitle">
                                        <?php echo escape($instructionsSection['title'] ?? 'খাওয়ার নিয়ম'); ?>
                                        <?php echo generate_edit_button('instructionsTitle', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-0d724e0 elementor-widget elementor-widget-heading"
                                data-id="0d724e0" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default" data-section="instructionsDescription">
                                        <?php echo escape($instructionsSection['description'] ?? 'প্রতিরাতে খাওয়ার আধ ঘন্টা পরে ১ টি করে মোট ৪৫ দিন সেবন করতে হবে'); ?>
                                        <?php echo generate_edit_button('instructionsDescription', 'text'); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php include 'checkout.php'; ?>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-2f1a973 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="2f1a973" data-element_type="section"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-12d9dab"
                        data-id="12d9dab" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-468be44 elementor-widget elementor-widget-heading"
                                data-id="468be44" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">অর্ডার করতে কোন সমস্যা
                                        হলে সরাসরি যোগাযোগ করুন</h2>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                                <?php echo generate_edit_button('orderSection'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<section class="hero-section">
    <?php echo generate_edit_button('heroSection'); ?>
    <!-- Hero section content -->
</section>

<section class="pricing-section">
    <?php echo generate_edit_button('pricingSection'); ?>
    <!-- Pricing section content -->
</section>

<!-- Add similar edit buttons to other sections -->

<!-- Modals for editing -->
<style>
    #editModal, #imageModal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div id="editModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Content</h2>
        <textarea id="editContent" rows="4" cols="50"></textarea>
        <button onclick="saveContent()">Save</button>
        <button onclick="closeModal()">Cancel</button>
    </div>
</div>

<div id="imageModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Upload Image</h2>
        <input type="file" id="uploadImage">
        <button onclick="uploadImage()">Upload</button>
        <button onclick="closeModal()">Cancel</button>
    </div>
</div>

<script>
let currentSection = '';

function openEditModal(section, type) {
    currentSection = section;
    if (type === 'text') {
        document.getElementById('editModal').style.display = 'block';
        const element = document.querySelector(`[data-section="${section}"]`);
        if (element) {
            const textContent = Array.from(element.childNodes)
                .filter(node => node.nodeType === Node.TEXT_NODE)
                .map(node => node.textContent.trim())
                .join(' ');
            document.getElementById('editContent').value = textContent;
        } else {
            console.error('Element not found for section:', section);
        }
    } else if (type === 'image') {
        document.getElementById('imageModal').style.display = 'block';
    }
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('imageModal').style.display = 'none';
}

function saveContent() {
    const content = document.getElementById('editContent').value;
    // AJAX request to save content
    fetch('admin/ajax-handler-content.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ section: currentSection, content: content, type: 'text'})
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        const element = document.querySelector(`[data-section="${currentSection}"]`);
        if (element) {
            // Update only the text node, preserving the "Edit" button
            const textNode = Array.from(element.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
            if (textNode) {
                textNode.textContent = content;
            }
        }
        closeModal();
    })
    .catch(error => console.error('Error:', error));
}

function uploadImage() {
    const fileInput = document.getElementById('uploadImage');
    const file = fileInput.files[0];
    if (!file) {
        alert('Please select a file to upload');
        return;
    }

    const formData = new FormData();
    formData.append('image', file);
    formData.append('section', currentSection);

    // Extract index if present in the section name
    const indexMatch = currentSection.match(/(\d+)$/);
    if (indexMatch) {
        formData.append('index', indexMatch[1]);
    }

    // AJAX request to upload image
    fetch('admin/ajax-handler-file.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Refresh the page to show the updated image
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while uploading the image');
    });
}
</script>

<!-- Add edit buttons for guarantee section images -->
<?php if (isset($guaranteeSection['images']) && is_array($guaranteeSection['images'])): ?>
    <?php foreach ($guaranteeSection['images'] as $index => $image): ?>
        <div class="guarantee-image-container">
            <img src="<?php echo escape($image['src']); ?>"
                 alt="<?php echo escape($image['alt'] ?? ''); ?>"
                 class="guarantee-image" />
            <?php echo generate_edit_button('guaranteeImage' . $index, 'image'); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Add edit buttons for solutions section images -->
<?php if (isset($solutionsSection['images']) && is_array($solutionsSection['images'])): ?>
    <?php foreach ($solutionsSection['images'] as $index => $image): ?>
        <div class="solution-image-container">
            <img src="<?php echo escape($image['src']); ?>"
                 alt="<?php echo escape($image['alt'] ?? ''); ?>"
                 class="solution-image" />
            <?php echo generate_edit_button('solutionImage' . $index, 'image'); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Add edit button for product logo -->
<?php if (isset($productSection['logo'])): ?>
    <div class="product-logo-container">
        <img src="<?php echo escape($productSection['logo']['src']); ?>"
             alt="<?php echo escape($productSection['logo']['alt'] ?? ''); ?>"
             class="product-logo" />
        <?php echo generate_edit_button('productLogo', 'image'); ?>
    </div>
<?php endif; ?>

<!-- Add edit buttons for benefit images -->
<?php if (isset($benefitsSection['benefits']) && is_array($benefitsSection['benefits'])): ?>
    <?php foreach ($benefitsSection['benefits'] as $index => $benefit): ?>
        <?php if (isset($benefit['image'])): ?>
            <div class="benefit-image-container">
                <img src="<?php echo escape($benefit['image']['src']); ?>"
                     alt="<?php echo escape($benefit['image']['alt'] ?? ''); ?>"
                     class="benefit-image" />
                <?php echo generate_edit_button('benefitImage' . $index, 'image'); ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Add edit buttons for instruction images -->
<?php if (isset($instructionsSection['images']) && is_array($instructionsSection['images'])): ?>
    <?php foreach ($instructionsSection['images'] as $index => $image): ?>
        <div class="instruction-image-container">
            <img src="<?php echo escape($image['src']); ?>"
                 alt="<?php echo escape($image['alt'] ?? ''); ?>"
                 class="instruction-image" />
            <?php echo generate_edit_button('instructionImage' . $index, 'image'); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
