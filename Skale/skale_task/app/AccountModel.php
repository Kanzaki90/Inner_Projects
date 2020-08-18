<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    public static function get_account_by_user_id($u_id)
    {

        // User ID's are unique so any way it returns a single user
        $accounts = DB::select('select * from accounts where user_id=' . $u_id . ' and is_active=1', [1]);
        if (count(($accounts)) === 0)
            return "No Data found or the account is disabled";
        else
            return $accounts;
    }

    public static function deactivate_account($a_id)
    {
        $affected = DB::update('update accounts set is_active = 0 where account_id= ' . $a_id . '', [$a_id]);
        return $affected;
    }

    public static function activate_account($a_id)
    {
        $affected = DB::update('update accounts set is_active = 1 where account_id= ' . $a_id . '', [$a_id]);
        return $affected;
    }

    public static function delete_account($a_id)
    {
        $deleted = DB::delete('delete from accounts where account_id = ?', [$a_id]);
        return $deleted;
    }

    public static function create_account($email)
    {
        $account_id = rand(1, 255);
        $user_id = rand(1, 255);
        $is_active = 1;
        $created_at = now();

        $account = DB::select('select email from accounts where email="' . $email . '" and is_active=1', [1]);
        if (count($account) === 0) {
            DB::table('accounts')->insert([
                'account_id' => $account_id,
                'user_id' => $user_id,
                'email' => $email,
                'is_active' => $is_active,
                'created_at' => $created_at
            ]);
            return "Account added";
        } else return "This Email is already in use";
    }
}
