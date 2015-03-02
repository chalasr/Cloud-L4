<?php

class Upload extends Eloquent {

protected $fillable = array('name', 'status');

    public static $rules = array(
    'name'=>'required',
    //'status'=>'required',
    //'type'=>'required',
    //'path'=>'required',
    //'size'=>'required',
    'user_id' => 'required'
    );

    /* @var string
     */
    protected $table = 'files';

    public static function mio($octet){
        return ($octet / pow(2, 20));
    }

    public static function getAllSize($userid){
        return self::where('user_id', '=', $userid)->get()->sum('size');
    }

    public function isShare()
    {
        return ($this->user_id == Auth::User()->id || $this->status == 1);
    }
}

