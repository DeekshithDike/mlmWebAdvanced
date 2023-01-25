<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','min_amount','max_amount','roi','referral','binary','capping','duration'];

    public static function addPackages($data) {
        self::Create($data);
    }

    /* Update the Packages based on Id
    */
    public static function updatePackages($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in Packages
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewPackages() {
        return self::get();
    }
}
