<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','user_type', 'user_code',  'password','profile_pic','user_permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function registration() {

        return $this->hasOne('App\Registration', 'user_id');
    }
    
      public function customerwallet() {

        return $this->hasOne('App\Customerwallet', 'user_id');
    }

     public function loans()
     {
        return $this->hasMany('App\Loan', 'user_id');
     }

      public function wallets()
     {
        return $this->hasMany('App\Wallet_transact', 'user_id');
     }

       public function repayments()
     {
        return $this->hasMany('App\Loan_repayment', 'user_id');
     }

      public function investments()
     {
        return $this->hasMany('App\Investment', 'user_id');
     }
}
