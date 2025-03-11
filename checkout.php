

<section
                class="elementor-section elementor-top-section elementor-element elementor-element-be570b3 order section-container elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="be570b3" data-element_type="section" id="order">
                <?php echo generate_edit_button('orderSection'); ?>
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4bea656d"
                        data-id="4bea656d" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-5fb090a elementor-headline--style-highlight elementor-widget elementor-widget-animated-headline"
                                data-id="5fb090a" data-element_type="widget"
                                data-settings="{&quot;marker&quot;:&quot;double_underline&quot;,&quot;highlighted_text&quot;:&quot;\u09ab\u09b0\u09cd\u09ae\u099f\u09bf \u09aa\u09c2\u09b0\u09a3&quot;,&quot;headline_style&quot;:&quot;highlight&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;highlight_animation_duration&quot;:1200,&quot;highlight_iteration_delay&quot;:8000}"
                                data-widget_type="animated-headline.default">
                                <div class="elementor-widget-container">
                                    <h3 class="elementor-headline">
                                        <span
                                            class="elementor-headline-plain-text elementor-headline-text-wrapper">অর্ডার
                                            করতে নিচের </span>
                                        <span
                                            class="elementor-headline-dynamic-wrapper elementor-headline-text-wrapper">
                                            <span
                                                class="elementor-headline-dynamic-text elementor-headline-text-active">ফর্মটি
                                                পূরণ</span>
                                        </span>
                                        <span
                                            class="elementor-headline-plain-text elementor-headline-text-wrapper">করুন</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-a03de62 elementor-widget elementor-widget-checkout-form"
                                data-id="a03de62" data-element_type="widget" id="order"
                                data-widget_type="checkout-form.default">
                                <div class="elementor-widget-container">
                                    <div class="wcf-el-checkout-form cartflows-elementor__checkout-form">
                                        <div id="wcf-embed-checkout-form"
                                            class="wcf-embed-checkout-form wcf-embed-checkout-form-two-column  wcf-field-default">
                                            <!-- CHECKOUT SHORTCODE -->

                                            <div class="woocommerce">
                                                <div class="woocommerce-notices-wrapper"></div>
                                                <div class="woocommerce-notices-wrapper"></div>
                                                <form name="checkout" method="post"
                                                    class="checkout woocommerce-checkout"
                                                    action="https://doctoronline.shop/checkout/"
                                                    enctype="multipart/form-data">



                                                    <div
                                                        class="wcf-product-option-wrap wcf-yp-skin-cards wcf-product-option-before-customer">
                                                        <h3 id="your_products_heading"> </h3>
                                                        <div class="wcf-qty-options">

                                                            <div class="wcf-qty-row wcf-qty-row-66 "
                                                                data-options="{&quot;product_id&quot;:66,&quot;variation_id&quot;:0,&quot;type&quot;:&quot;simple&quot;,&quot;unique_id&quot;:&quot;t97b9sxu&quot;,&quot;mode&quot;:&quot;quantity&quot;,&quot;highlight_text&quot;:&quot;&quot;,&quot;quantity&quot;:&quot;1&quot;,&quot;default_quantity&quot;:1,&quot;original_price&quot;:&quot;1490&quot;,&quot;discounted_price&quot;:&quot;&quot;,&quot;total_discounted_price&quot;:&quot;&quot;,&quot;currency&quot;:&quot;&amp;#2547;&amp;nbsp;&quot;,&quot;cart_item_key&quot;:&quot;1557f7c07fb1fa69e3da7f89d1656a53&quot;,&quot;save_value&quot;:&quot;&quot;,&quot;save_percent&quot;:&quot;&quot;,&quot;sign_up_fee&quot;:0,&quot;subscription_price&quot;:&quot;1490&quot;,&quot;trial_period_string&quot;:&quot;&quot;}">

                                                                <div class="wcf-item">

                                                                    <div class="wcf-item-image" style=""><img
                                                                            loading="lazy" decoding="async" width="300"
                                                                            height="300"
                                                                            src="wp-content/uploads/2025/01/safron-2-1-768x768-1-300x300.jpg"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="" /></div>
                                                                    <div class="wcf-item-content-options">
                                                                        <div class="wcf-item-wrap">
                                                                            <span class="wcf-display-title"><?php echo $productSection['title'] ?></span><span
                                                                                class="wcf-display-title-quantity"><span
                                                                                    class="dashicons dashicons-no-alt"></span><span
                                                                                    class="wcf-display-quantity" id="wcf-display-quantity">1</span></span>
                                                                        </div>

                                                                        <div class="wcf-qty  ">
                                                                            <div class="wcf-qty-selection-wrap">
                                                                                <span
                                                                                    class="wcf-qty-selection-btn wcf-qty-decrement wcf-qty-change-icon"
                                                                                    title="">&minus;</span>
                                                                                <input autocomplete="off" type="number"
                                                                                    value="1" step="1" min="1"
                                                                                    name="wcf_qty_selection"
                                                                                    class="wcf-qty-selection"
                                                                                    placeholder="1"
                                                                                    data-sale-limit="false" title="">
                                                                                <span
                                                                                    class="wcf-qty-selection-btn wcf-qty-increment wcf-qty-change-icon"
                                                                                    title="">&plus;</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wcf-price">
                                                                            <div
                                                                                class="wcf-display-price wcf-field-label">
                                                                                <span
                                                                                    class="woocommerce-Price-amount amount"><span
                                                                                        class="woocommerce-Price-currencySymbol">&#2547;&nbsp;</span><?php echo $pricingSection['offerPrice']['amount_in_english'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="wcf-col2-set col2-set" id="customer_details">
                                                        <div class="wcf-col-1 col-1">
                                                            <wc-order-attribution-inputs></wc-order-attribution-inputs>
                                                            <div class="woocommerce-billing-fields">

                                                                <h3 id="billing_fields_heading">Billing details</h3>



                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p class="form-row form-row-first wcf-column-100 validate-required"
                                                                        id="billing_first_name_field"
                                                                        data-priority="10"><label
                                                                            for="billing_first_name" class="">আপনার
                                                                            নামঃ&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="billing_first_name"
                                                                                id="billing_first_name" placeholder=""
                                                                                value="" aria-required="true"
                                                                                autocomplete="given-name" /></span></p>
                                                                    <p class="form-row form-row-wide address-field wcf-column-100"
                                                                        id="billing_address_1_field" data-priority="50">
                                                                        <label for="billing_address_1" class="">আপনার
                                                                            সম্পূর্ন ঠিকানাঃ&nbsp;<span
                                                                                class="optional">(optional)</span></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="billing_address_1"
                                                                                id="billing_address_1" placeholder=""
                                                                                value=""
                                                                                autocomplete="address-line1" /></span>
                                                                    </p>
                                                                    <p class="form-row form-row-wide wcf-column-100 validate-required validate-phone"
                                                                        id="billing_phone_field" data-priority="100">
                                                                        <label for="billing_phone" class="">আপনার মোবাইল
                                                                            নাম্বারঃ&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="tel" class="input-text "
                                                                                name="billing_phone" id="billing_phone"
                                                                                placeholder="" value=""
                                                                                aria-required="true"
                                                                                autocomplete="tel" /></span></p>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="wcf-col-2 col-2">

                                                            <div class="woocommerce-shipping-fields">
                                                            </div>
                                                            <div class="woocommerce-additional-fields">


                                                                <input type="hidden" class="input-hidden _wcf_flow_id"
                                                                    name="_wcf_flow_id" value="22"><input type="hidden"
                                                                    class="input-hidden _wcf_checkout_id"
                                                                    name="_wcf_checkout_id" value="23"></div>
                                                        </div>
                                                    </div>



                                                    <div class='wcf-order-wrap'>



                                                        <h3 id="order_review_heading">Your order</h3>


                                                        <div id="order_review2"
                                                            class="">
                                                            <table
                                                                class="shop_table"
                                                                data-update-time="1741424837">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="product-name">Product</th>
                                                                        <th class="product-total">Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="cart_item">
                                                                        <td class="product-name">
                                                                            <?php echo $productSection['title'] ?> <strong
                                                                                class="product-quantity">&times;&nbsp;1</strong>
                                                                        </td>
                                                                        <td class="product-total">
                                                                            <span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol">&#2547;&nbsp;</span><?php echo $pricingSection['offerPrice']['amount_in_english'] ?></bdi></span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Subtotal</th>
                                                                        <td><span
                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                        class="woocommerce-Price-currencySymbol">&#2547;&nbsp;</span><?php echo $pricingSection['offerPrice']['amount_in_english'] ?></bdi></span>
                                                                        </td>
                                                                    </tr>




                                                                    <tr class="order-total">
                                                                        <th>Total</th>
                                                                        <td><strong><span
                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                            class="woocommerce-Price-currencySymbol">&#2547;&nbsp;</span><?php echo $pricingSection['offerPrice']['amount_in_english'] ?></bdi></span></strong>
                                                                        </td>
                                                                    </tr>


                                                                </tfoot>
                                                            </table>
                                                            <div id="payment" class="">
                                                                <ul class="wc_payment_methods payment_methods methods">
                                                                    <li class="wc_payment_method payment_method_cod">
                                                                        <input id="payment_method_cod" type="radio"
                                                                            class="input-radio" name="payment_method"
                                                                            value="cod" checked='checked'
                                                                            data-order_button_text="" />

                                                                        <label for="payment_method_cod">
                                                                            Cash on delivery </label>
                                                                        <div class="payment_box payment_method_cod">
                                                                            <p>Pay with cash upon delivery.</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="form-row place-order">
                                                                    <noscript>
                                                                        Since your browser does not support JavaScript,
                                                                        or it is disabled, please ensure you click the
                                                                        <em>Update Totals</em> button before placing
                                                                        your order. You may be charged more than the
                                                                        amount stated above if you fail to do so.
                                                                        <br /><button type="submit" class="button alt"
                                                                            name="woocommerce_checkout_update_totals"
                                                                            value="Update totals">Update totals</button>
                                                                    </noscript>

                                                                    <div
                                                                        class="woocommerce-terms-and-conditions-wrapper">
                                                                        <div class="woocommerce-privacy-policy-text">
                                                                            <p>Your personal data will be used to
                                                                                process your order, support your
                                                                                experience throughout this website, and
                                                                                for other purposes described in our <a
                                                                                    href="index3b72.html?page_id=3"
                                                                                    class="woocommerce-privacy-policy-link"
                                                                                    target="_blank">Privacy policy</a>.
                                                                            </p>
                                                                        </div>
                                                                    </div>


                                                                    <button type="submit" class="button alt"
                                                                        name=""
                                                                        id=""
                                                                        value="অর্ডার করুন ">
                                                                        অর্ডার করুন
                                                                    </button>

                                                                    <input type="hidden"
                                                                        id="woocommerce-process-checkout-nonce"
                                                                        name="woocommerce-process-checkout-nonce"
                                                                        value="277f474c3b" /><input type="hidden"
                                                                        name="_wp_http_referer" value="/" />
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </form>

                                            </div>
                                            <!-- END CHECKOUT SHORTCODE -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const qtyInput = document.querySelector('.wcf-qty-selection');
    const displayQty = document.getElementById('wcf-display-quantity');

    // Convert Bengali numerals to English numerals
    function convertBengaliToEnglish(bengaliNumber) {
        const bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return bengaliNumber.toString().replace(/[০-৯]/g, match =>
            bengaliNumerals.indexOf(match).toString()
        );
    }

    // Convert English numerals to Bengali numerals
    function convertEnglishToBengali(englishNumber) {
        const bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return englishNumber.toString().replace(/[0-9]/g, match =>
            bengaliNumerals[parseInt(match)]
        );
    }

    // Get base price and convert to number
    const basePriceStr = <?php echo json_encode($pricingSection['offerPrice']['amount_in_english']); ?>;
    const basePrice = parseInt(basePriceStr);
    const productName = <?php echo json_encode($productSection['title']); ?>;

    // Update all price displays
    function updatePrices(quantity) {
        // Ensure quantity is a valid number
        quantity = parseInt(quantity) || 1;
        if (quantity < 1) quantity = 1;

        const total = basePrice * quantity;
        const totalBengali = convertEnglishToBengali(total.toString());

        // Update quantity display
        if (displayQty) {
            displayQty.textContent = convertEnglishToBengali(quantity.toString());
        }

        // Update all price displays
        document.querySelectorAll('.woocommerce-Price-amount').forEach(el => {
            el.innerHTML = `<span class="woocommerce-Price-currencySymbol">&#2547;&nbsp;</span>${totalBengali}`;
        });

        // Update order button text
        const orderBtn = document.getElementById('place_order');
        if (orderBtn) {
            const buttonText = `অর্ডার করুন&nbsp;&nbsp;&#2547;&nbsp;${totalBengali}`;
            orderBtn.value = buttonText;
            orderBtn.setAttribute('data-value', buttonText);
            orderBtn.innerHTML = buttonText;
        }
    }

    // Handle quantity changes
    if (qtyInput) {
        // Prevent default form submission on enter key
        qtyInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                return false;
            }
        });

        // Handle direct input changes
        qtyInput.addEventListener('input', function() {
            updatePrices(this.value);
        });

        // Handle increment/decrement buttons
        document.querySelectorAll('.wcf-qty-change-icon').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                let currentQty = parseInt(qtyInput.value) || 1;

                if (this.classList.contains('wcf-qty-increment')) {
                    currentQty += 1;
                } else if (this.classList.contains('wcf-qty-decrement') && currentQty > 1) {
                    currentQty -= 1;
                }

                qtyInput.value = currentQty;
                updatePrices(currentQty);

                return false;
            });
        });
    }

    // Set initial product name
    document.querySelectorAll('.wcf-display-title').forEach(el => {
        el.textContent = productName;
    });
    document.querySelectorAll('.product-name').forEach(el => {
        if (!el.querySelector('.product-quantity')) {
            el.textContent = productName;
        }
    });

    // Initial price update
    updatePrices(1);
});
</script>
