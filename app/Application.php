<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $gurded = array('id');

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
        return $this->belognsTo('App\User');
    }

    public function job()
    {
        return $this->belognsTo('App\Job');
    }

}
