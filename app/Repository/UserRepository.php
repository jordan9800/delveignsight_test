<?php 

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository 
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        $users = User::all();

        return $users;
    }

    public function find($id)
    {
        $user = $this->user->findOrFail($id);

        return $user;
    }

    public function create(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password)
        ]);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->findOrFail($id);

        $user->destroy();

        return $user;
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = $this->user->query();

        $users = $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")->get();

        return $users;
    }
}