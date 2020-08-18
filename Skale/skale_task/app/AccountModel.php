<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SoftDeletes;

class AccountModel extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';
    protected $fillable = ['id', 'user_id', 'email', 'is_active'];

    public static function get_account_by_user_id($u_id)
    {

        $match = [
            'user_id' => $u_id,
            'is_active' => 1
        ];

        $accounts = AccountModel::where($match)->get();
        if (count($accounts) === 0)
            return "Either no data found either the account is inactive";
        else
            return $accounts;
    }

    public static function deactivate_account($a_id)
    {

        $match = ['id' => $a_id];
        $deactivate = AccountModel::where($match)->first();
        $deactivate->is_active = 0;
        $deactivate->save();

        return $deactivate;
    }

    public static function activate_account($a_id)
    {
        $match = ['id' => $a_id];
        $deactivate = AccountModel::where($match)->first();
        $deactivate->is_active = 1;
        $deactivate->save();
        // dd(DB::getQueryLog());
        return $deactivate;
    }

    public static function delete_account($a_id)
    {
        $deleted = AccountModel::where('id', $a_id)->first();
        $deleted->delete();
    }

    public static function create_account($email)
    {
        $id = rand(257, 512);
        $user_id = rand(256, 512);
        $is_active = 1;

        $exists = AccountModel::where('email', '=', $email)->get();
        
        if (count($exists) === 0) {
            AccountModel::create(array(
                'id' => $id,
                'user_id' => $user_id,
                'email' => $email,
                'is_active' => $is_active
            ));
        } else
            return 'This Email is already in use';
    }
}
