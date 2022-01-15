<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Facades\Hash;
use OSN\Framework\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class APIController extends Controller
{
    public function index(Request $request)
    {
        $data = User::find(1);
        return $data->tags;
    }

    public function view(Request $request)
    {
        return User::find($request->get->uid ?? abort(404));
    }

    public function store(StoreUserRequest $request)
    {

    }

    public function update(UpdateUserRequest $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
