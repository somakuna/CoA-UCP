<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Account::class);
    }

    public function show(Account $account)
    {
        return view('account.show', [
            'account' => $account,
        ]);
    }
}
