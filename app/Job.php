<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $gurded = array('id');


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type', 'reward_min', 'reward_max', 'status','details'
    ];

     /**
     * 論理削除実行時に更新する値
     *
     * @var array
     */
    protected $deleted = [
        'deleted_at'
    ];

    /**
     * リレーション
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
