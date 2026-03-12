<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('setting_value')) {
    function setting_value($value, $default = '-') {
        return !empty($value) ? $value : $default;
    }
}

if (!function_exists('slugify')) {
    function slugify($text)
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
        return trim($text, '-') ?: 'item';
    }
}

if (!function_exists('project_url')) {
    function project_url($project)
    {
        if ($project->product_type === 'greeting_card') {
            return site_url('card/' . $project->slug);
        }
        return site_url('i/' . $project->slug);
    }
}

if (!function_exists('badge_status')) {
    function badge_status($status)
    {
        $map = array(
            'draft' => 'secondary',
            'published' => 'success',
            'new' => 'info',
            'paid' => 'success',
            'in_progress' => 'warning',
            'completed' => 'primary',
        );
        return isset($map[$status]) ? $map[$status] : 'dark';
    }
}


if (!function_exists('guest_project_url')) {
    function guest_project_url($project, $guest)
    {
        if ($project->product_type === 'greeting_card') {
            return project_url($project);
        }
        return site_url('i/' . $project->slug . '/' . $guest->slug);
    }
}

if (!function_exists('wa_phone')) {
    function wa_phone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', (string) $phone);
        if ($phone === '') {
            return '';
        }
        if (strpos($phone, '0') === 0) {
            $phone = '62' . substr($phone, 1);
        }
        return $phone;
    }
}

if (!function_exists('wa_invitation_message')) {
    function wa_invitation_message($project, $guest)
    {
        $link = guest_project_url($project, $guest);
        if ($project->product_type === 'greeting_card') {
            return "Halo " . $guest->guest_name . ",

Ada kartu ucapan spesial untuk Anda:
" . $link . "

Salam hangat.";
        }
        return "Kepada Yth. " . $guest->guest_name . ",

Dengan hormat, kami mengundang Anda untuk hadir pada acara " . $project->title . ".

Silakan buka link undangan berikut:
" . $link . "

Terima kasih.";
    }
}
