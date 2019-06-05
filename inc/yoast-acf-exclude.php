<?php add_filter('ysacf_exclude_fields', function(){
    return array(
        // 'e_image',
        // 'n_image',
        'n_link',
        'n_source',
        'p_id',
        // 'p_image',
        // 'p_alt_image',
        'p_season'
    );
}); ?>