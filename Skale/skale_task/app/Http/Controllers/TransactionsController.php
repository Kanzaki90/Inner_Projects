<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionsModel;

class TransactionsController extends Controller
{
    public function get_transactions_by_user_id($u_id)
    {
        $result = TransactionsModel::get_transactions_by_user_id($u_id);
        return $result;
    }

    public function get_transactions_by_account_id($a_id)
    {
        $result = TransactionsModel::get_transactions_by_account_id($a_id);
        return $result;
    }
}
