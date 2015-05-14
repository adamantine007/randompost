<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeBookNamesForAutonaming($query)
    {
        $query->where('user_id', '=', \Auth::id())->where('name', 'like', 'Book %');
    }

}
