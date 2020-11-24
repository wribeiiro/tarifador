<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    protected $table = "dadc001";

    public function get() {

        $sql = "";

        $result = DB::select($sql, []);

        return $result;
    }
}
