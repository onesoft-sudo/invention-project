<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\PaymentGatewayContract;
use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Request;

class APIController extends Controller
{
    public function index(PaymentGatewayContract $gateway, $amount)
    {
        return $gateway->charge($amount);
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
