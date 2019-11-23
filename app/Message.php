<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $gurded = array('id');


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'job_id', 'apply_id', 'text', 'type'
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
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

}
