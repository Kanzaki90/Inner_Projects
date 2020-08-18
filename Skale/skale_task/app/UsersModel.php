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
        // User ID's are unique soq any way it returns a single user
        $user = DB::select('select * from userstable where user_id=' . $u_id . '', [1]);
        if (count(($user)) === 0)
            return "User with that ID doesnt exists";
        else
            return $user;
    }
}
