<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UsersModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userstable';

    public static function get_user_by_id($u_id)
    {
        $user = UsersModel::where('id', '=', $u_id)->get();
        if (count($user) === 0)
            return "User Not Found";
        else
            return $user;
    }
}
