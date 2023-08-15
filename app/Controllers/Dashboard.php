<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',
            'page' => 'v_dashboard'
        ];
        return view('template_admin', $data);
    }
}
