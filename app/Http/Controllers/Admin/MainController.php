<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class MainController
{

    public function index(): View
    {
        return view('admin.main.index');
    }
}
