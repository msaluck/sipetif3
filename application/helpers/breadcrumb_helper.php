<?php defined('BASEPATH') OR exit('no direct access');

if (!function_exists('generatedBreadcrumb')) {

    function generateBreadcrumb() {
        $ci = &get_instance();
        $i = 1;
        $uri = $ci->uri->segment($i);
        $link = '';

        while ($uri != '') {
            $prep_link = '';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j);
            }

            if ($ci->uri->segment($i + 1) == '') {
                $link .= '<li class="breadcrumb-item">';
                $link .=  ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '</li>';
            } else {
                $link .= '<li class="breadcrumb-item">';
                $link .= ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '</li>';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '';
        return $link;
    }

}