<?php

namespace App\Services;

use App\Events\UserActionEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return User::all();
    }

    public function create(array $data)
    {
        $imageName = time() . '.' . $data['image']->extension();
        $data['image']->move(public_path('images'), $imageName);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->image = $imageName;
        $user->password = bcrypt($data['password']);
        $user->save();

        event(new UserActionEvent($user, 'created'));

        return $user;
    }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        event(new UserActionEvent($user, 'updated'));

        return $user;
    }


    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->image) {
            Storage::delete('images/' . $user->image);
        }
        $user->delete();
    }
}
