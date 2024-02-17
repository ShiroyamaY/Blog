<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{

    public function index(): View
    {
        return view('admin.main.index');
    }
}
