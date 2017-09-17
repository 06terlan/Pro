<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Library\MyClass;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'login','thumb'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'login'
    ];

    public function photo()
    {
        if( !empty($this->thumb) && file_exists( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb)) {
            return MyClass::USER_PROFIL_PIC_DIR . $this->thumb;
        } else {
            return MyClass::USER_PROFIL_PIC_DIR . "user.png";
        }
    }

    //delete profil pic if it is exist
    public function deletePic()
    {
        if( !empty($this->thumb) && file_exists( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb) )
            unlink( public_path() . MyClass::USER_PROFIL_PIC_DIR . $this->thumb );
    }

    public function delete()
    {
        $this->deletePic();

        parent::delete();
    }
}