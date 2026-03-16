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
            'waiting_content' => 'warning',
            'designing' => 'info',
            'revision' => 'dark',
            'approved' => 'primary',
            'published' => 'success',
            'archived' => 'secondary',
            'new' => 'info',
            'waiting_payment' => 'warning',
            'paid' => 'success',
            'in_progress' => 'primary',
            'completed' => 'success',
            'cancelled' => 'danger',
            'unpaid' => 'secondary',
            'dp' => 'warning',
            'pending' => 'warning',
            'rejected' => 'danger',
        );
        return isset($map[$status]) ? $map[$status] : 'dark';
    }
}

if (!function_exists('status_label')) {
    function status_label($status)
    {
        $labels = array(
            'waiting_content' => 'Waiting Content',
            'waiting_payment' => 'Waiting Payment',
            'in_progress' => 'In Progress',
            'greeting_card' => 'Greeting Card',
            'bank_transfer' => 'Bank Transfer',
        );
        return isset($labels[$status]) ? $labels[$status] : ucwords(str_replace('_', ' ', $status));
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

if (!function_exists('asset_or_url')) {
    function asset_or_url($path, $fallback = '')
    {
        if (empty($path)) {
            return $fallback;
        }
        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }
        return base_url(ltrim($path, '/'));
    }
}

if (!function_exists('admin_role_badge')) {
    function admin_role_badge($role)
    {
        $map = array(
            'super_admin' => 'danger',
            'admin' => 'primary',
            'designer' => 'warning',
            'operator' => 'success',
            'cs' => 'info',
        );
        return isset($map[$role]) ? $map[$role] : 'secondary';
    }
}

if (!function_exists('rupiah')) {
    function rupiah($amount)
    {
        return 'Rp ' . number_format((float) $amount, 0, ',', '.');
    }
}

if (!function_exists('file_basename')) {
    function file_basename($path)
    {
        return basename((string) $path);
    }
}


if (!function_exists('role_can')) {
    function role_can($current_role, $module, $action = 'view')
    {
        $map = array(
            'super_admin' => array('*' => array('*')),
            'admin' => array(
                'dashboard' => array('view'),
                'reports' => array('view','export'),
                'customers' => array('view','create','update','delete'),
                'orders' => array('view','create','update'),
                'projects' => array('view','create','update','publish'),
                'guests' => array('view','create','import','export','delete'),
                'wishes' => array('view','approve','reject'),
                'product_types' => array('view','create','update'),
                'packages' => array('view','create','update'),
                'templates' => array('view','create','update','clone'),
                'settings' => array('view','update'),
                'users' => array('view')
            ),
            'designer' => array(
                'dashboard' => array('view'),
                'reports' => array('view','export'),
                'projects' => array('view','update','create'),
                'templates' => array('view','create','update','clone'),
                'guests' => array('view','create','import','export'),
                'wishes' => array('view')
            ),
            'operator' => array(
                'dashboard' => array('view'),
                'reports' => array('view','export'),
                'orders' => array('view','create','update'),
                'projects' => array('view','update','publish'),
                'guests' => array('view','create','import','export'),
                'wishes' => array('view','approve','reject'),
                'customers' => array('view','create','update')
            ),
            'cs' => array(
                'dashboard' => array('view'),
                'customers' => array('view','create','update'),
                'orders' => array('view','create','update'),
                'projects' => array('view'),
                'guests' => array('view','export'),
                'reports' => array('view','export')
            ),
        );
        $role = isset($map[$current_role]) ? $map[$current_role] : array();
        if (isset($role['*'])) return TRUE;
        $allowed = isset($role[$module]) ? $role[$module] : array();
        return in_array('*', $allowed, TRUE) || in_array($action, $allowed, TRUE);
    }
}
