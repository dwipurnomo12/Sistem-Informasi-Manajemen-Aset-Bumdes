<?php

if (! function_exists('format_rupiah')) {
    function format_rupiah($number) {
        return 'Rp '.number_format($number, 0, ',', '.');
    }
}
