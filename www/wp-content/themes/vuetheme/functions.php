<?php

wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', [], '2.5.17');
wp_enqueue_script('vueapp', '/wp-content/themes/vuetheme/'  . 'main.js', [], '1.0', true);

add_filter('show_admin_bar', '__return_false'); // отключить
