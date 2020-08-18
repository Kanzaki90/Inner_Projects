<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountModel;

class AccountController extends Controller
{
    public function get_account_by_user_id($user_id)
    {

        $accounts = AccountModel::get_account_by_user_id($user_id);
        return $accounts;
    }


    public function deactivate_account($account_id)
    {
        $result = AccountModel::deactivate_account($account_id);
        return $result;
    }

    public function activate_account($account_id)
    {
        $result = AccountModel::activate_account($account_id);
        return $result;
    }

    public function delete_account($account_id)
    {
        $deleted = AccountModel::delete_account($account_id);
        return $deleted;
    }

    public function create_account($email)
    {
        $inserted = AccountModel::create_account($email);
        return $inserted;;
    }
}
