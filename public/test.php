<?php

use App\Core\App;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Collection;
use OSN\Framework\Database\SQLite\Blueprint;
use OSN\Framework\Exceptions\FactoryLimitException;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Database;
use OSN\Framework\Facades\Hash;

require "../vendor/autoload.php";

$app = new App("..");
//
$factory = (new UserFactory())->make();
dd($factory);
//$factory2 = (new UserFactory())->define();
//
//$user = User::create([
//    [
//        'name' => $factory['name'],
//        'email' => $factory['email'],
//        'username' => $factory['username'],
//        'password' => Hash::sha1($factory['password']),
//    ]
//]);

//$user = new User();
//
//$user->name = $factory["name"];
//$user->username = $factory["username"];
//$user->email = $factory["email"];
//$user->password = Hash::sha1($factory["password"]);
//
//$user->insert();

//$users = User::all();
//dp($users->get(0));
//
//$user = new User();
//$user->role = 7;
//$user->name = 'Mike Dane';
//$user->username = 'mike2';
//$user->email = 'mikedane@freecodecamp.org';
//$user->password = Hash::sha1($factory["password"]);
//dd($user->destroy());
//dd(User::update([
//    'uid' => 2,
//    'name' => 'Kike Dane',
//    'username' => 'tmacc50',
//    'role' => 5
//]));

//$ref = new ReflectionClass(\App\Http\Requests\StoreUserRequest::class);
//$methods = $ref->getMethods();
//$attr = $methods[0]->getParameters();
//
//$params = [];
//
//foreach ($attr as $att) {
//    $type = $att->getType();
//    $params[$att->name] = $type === null ? 'mixed' : $type->getName();
//}
//
//echo "<pre>";
//print_r($params);
//echo "</pre>";
//exit();

//dp(\OSN\Framework\Facades\FunctionUtils::getParameterTypes(\App\Http\Requests\StoreTestFormRequest::class, 'rules'));
