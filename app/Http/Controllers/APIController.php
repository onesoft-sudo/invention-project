<?php


namespace App\Http\Controllers;

use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Database\Query;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;
use OSN\Framework\Facades\Database;
use OSN\Framework\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class APIController extends Controller
{
    public function index()
    {
        //$q = new Query();
        //Schema::dropIndex('random', 'main_index');
        return User::all();
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
