<?php
// https://qiita.com/vivid_colors/items/d75af56ae026eef834a0
namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $guarded = array('id');

    public $timestamps = true;

    protected $fillable = [
        'first_name', 'last_name', 'company_id', 'email', 'website', 'created_at', 'updated_at'
    ];

    // Companyモデルとのリレーションを記述する
    public function company()
    {
        return $this->belongsTo('App\Company');
        // belongsToは「属している」という意味。
    }
}
