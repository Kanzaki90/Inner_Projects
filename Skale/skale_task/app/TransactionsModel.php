<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    public static function get_transactions_by_user_id($u_id)
    {
        $match = [
            'userstable.user_id' => $u_id,
            'accounts.is_active' => 1
        ];

        $query = DB::table('transactions')
            ->leftJoin('accounts', 'transactions.account_id', '=', 'accounts.account_id')
            ->leftJoin('userstable', 'userstable.user_id', '=', 'accounts.user_id')
            ->where($match)->get();
        if (count($query) === 0)
            return "No Data was found or the account is disabled";
        else
            return $query;
    }

    public static function get_transactions_by_account_id($a_id)
    {
        $match = [
            'is_active' => 1,
            'accounts.account_id' => $a_id
        ];

        $query = DB::table('transactions')
            ->rightJoin('accounts', 'transactions.account_id', '=', 'accounts.account_id')
            ->where($match)->get();

        if (count($query) === 0)
            return "Account is in active or doesnt exists";
        else
            return $query;
    }
}
