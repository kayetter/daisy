<?php

add_action('daisy_single_bizcard', 'daisy_bizcard_header', 10);
add_action('daisy_single_bizcard', 'daisy_bizcard_content', 20);
add_action('daisy_single_bizcard', 'storefront_init_structured_data', 30);
