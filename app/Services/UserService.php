<?php

namespace App\Services;

use App\DTO\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Get all users
     */
    public function get(): Collection
    {
        return User::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserDto $userDto): void
    {
        try {
            DB::beginTransaction();
            User::firstOrCreate([
                'name' => $userDto->name,
                'email' => $userDto->email,
                'password' => $userDto->password,
                'role' => $userDto->role
            ]);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort($exception->getCode(),$exception->getMessage());
        }

    }

    public function getOne(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserDto $userDto,User $user): void
    {
        try {
            DB::beginTransaction();
            $user->name = $userDto->name;
            $user->email = $userDto->email;
            $user->role = $userDto->role;
            $user->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): int
    {
        return User::destroy($user->id);
    }
}
