<?php


namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Controller;
use OSN\Framework\Database\Query;
use OSN\Framework\Database\Common\Blueprint;
use OSN\Framework\Facades\Schema;
use OSN\Framework\Facades\Database;
use OSN\Framework\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\VarDumper\Cloner\Data;

class APIController extends Controller
{
    public function index()
    {
//        $u = new User();
//        $u->load([
//            'name' => 'Ar Rakin',
//            'username' => 'rakinar2',
//        ]);
//
      //  Post::factory()->count(50)->create();-

        $tag = Tag::find(9);
        //dd($user->posts()->get());
        return $tag->users()->get();
    //    return Database::table('users')->all();
        //Schema::dropIndex('random', 'main_index');
//        return User::all();
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
