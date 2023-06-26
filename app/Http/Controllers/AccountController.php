<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function show(Account $account)
    {
        return view('account.show', [
            'account' => $account,
        ]);
    }
}
