<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $users = $this->userService->get();
        $roles = User::getRoles();
        return view('admin.users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $successStore = session('successStore');
        $roles = User::getRoles();
        return view('admin.users.create',compact('successStore','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $this->userService->store(
            UserDto::getFromUserRequest($request),
        );
        session()->flash('successStore');
        return redirect()->route('admin.users.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $roles = User::getRoles();
        return view('admin.users.show', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) : View
    {
        $roles = User::getRoles();
        $successUpdate = Session::get('successUpdate');
        return view('admin.users.edit',compact('user','successUpdate','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $this->userService->update(
            UserDto::getFromUserRequest($request),
            $user
        );
        Session::flash('successUpdate');
        return redirect()->route('admin.users.edit',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userService->destroy($user);
        return redirect()->route('admin.users.index');
    }
}
