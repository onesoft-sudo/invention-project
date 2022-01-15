<?php

namespace Tests\Unit\CGI;

use App\Http\Config;
use App\Http\Middleware\VerifyCSRF;
use App\Models\User;
use OSN\Framework\Facades\Hash;

class LoginTest extends TestCase
{
    public function test_if_the_user_can_log_in()
    {
        $password = rand();
        $uid = rand();
        /**
         * @var User
         */
        $user = User::factory()->make();
        $user->uid = $uid;
        $user->password = Hash::sha1($password);
        $user->save();

        $res = $this->sendPOST("/login", [
            'username' => $user->username,
            'password' => $password,
        ]);

        User::destroy($uid);
        $this->assertMatchesRegularExpression("/(.*)\r\nLocation:( *)\/dashboard\r\n(.*)/", $res);
    }

    public function test_fields_are_required()
    {
        //$prevUsers = User::orderBy('uid', true)->limit(1)->get();
        $res = $this->sendPOST("/login");
       // $newUsers = User::orderBy('uid', true)->limit(1)->get();

      //  $cond1 = $prevUsers->count() > 0 && ($newUsers[0]['uid'] != $prevUsers[0]['uid']);
      //  $cond2 = $prevUsers->count() == 0 && $newUsers->count > 0;

       // $this->assertSame(false, $cond1 || $cond2);
        $this->assertDoesNotMatchRegularExpression("/HTTP\/[0-9](\.[0-9])? 3[0-9][0-9] (.*)Location:( *)\/dashboard(.*)/", $res);
    }

    public function test_invalid_login_should_be_rejected()
    {
        $res = $this->sendPOST("/login", [
            'username' => 'blablabla' . rand(),
            'password' => 'blablabla-password' . rand(),
        ]);

        $this->assertMatchesRegularExpression("/HTTP\/[0-9](\.[0-9])? 3[0-9][0-9] (.*)(\r\n|.)*Location:( *)\/login(.*)(\n|.)*/", $res);
    }
}
