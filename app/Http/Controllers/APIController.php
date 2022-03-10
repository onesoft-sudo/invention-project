<?php


namespace App\Http\Controllers;

use App\CreditPaymentGateway;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\PaymentGatewayContract;
use OSN\Framework\Attributes\GETRoute;
use OSN\Framework\Core\Model;
use OSN\Framework\Facades\Cache;
use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Request;

class APIController extends Controller
{
    #[GETRoute('/api/(\d+)')]
    public function index(User $user, Request $request, PaymentGatewayContract $contract)
    {
       // $post = Video::find(2);
        return $user;
    }

    public function view(Request $request)
    {
        return User::find($request->get->uid ?? abort(404));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'min:2'],
            'name' => ['required', 'min:2'],
            'feedback' => ['required', 'min:2'],
        ], true);
    }

    public function update(Request $request)
    {
        return 'updating';
    }

    public function delete(Request $request)
    {
        dd($request->all());
    }
}
