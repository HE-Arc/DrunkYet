<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'weight', 'birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function drinks()
    {
        return $this->belongsToMany(Drink::class)->withPivot('quantity', 'degree', 'drinking_time');
    }

    public function alcoholLevel(){
        //{{ $drink->name }} {{ $drink->pivot->quantity }} {{ $drink->pivot->degree }} {{ $drink->pivot->drinking_time }}
        $totalLevel = 0;
        foreach($this->drinks()->orderBy('drinking_time')->get() as $drink){

            $quantity = $drink->pivot->quantity;
            $degree = $drink->pivot->degree;
            $drinking_time = Carbon::parse($drink->pivot->drinking_time, 'UTC');
            $absoptionSpeed = ($this->gender == 'male') ? 0.7 : 0.6;

            $levelSummit = ($quantity * ($degree / 100) * 0.8) / ($absoptionSpeed * $this->weight);

            $timeSinceDrinking = Carbon::Now('UTC')->diffInSeconds($drinking_time);

            if($timeSinceDrinking > 1800 && $totalLevel==0){ // If we consume half hour before
                $levelSummit -= (($timeSinceDrinking - 1800) / 3600) * 0.15;
            }

            $totalLevel += ($levelSummit>0) ? $levelSummit : 0;
        }
        return $totalLevel;
    }

    public static function getAverageWeight()
    {
        return User::all()->pluck('weight')->avg();
    }
}
