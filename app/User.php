<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function newUser($request){
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->isAdmin = $request->isAdmin ? true : false;

        return $this->save();
    }

    public function updateUser($request){
        $this->name = $request->name;
        $this->email = $request->email;

        //Verifica se atualizou a pass. caso contrario nao atualiza como null
        if($request->password && $request->password != '')
            $this->password = bcrypt($request->password);
        $this->isAdmin = $request->isAdmin ? true : false;

        return $this->save();
    }

    //para retornar o genero
    public function gender($op = null)
    {
        $genderAvailable = [
            'male' => 'Male',
            'female' => 'Female',
        ];

        if ($op)
            return $genderAvailable[$op];

        return $genderAvailable;
    }

    //mudra o genero
    public function changeGender($newGender)
    {
        $this->gender = $newGender;

        return $this->save();
    }

    public function reserves(){
        return $this->hasMany(Reserva::class);
    }

    public function isAdmin(){
        return $this->isAdmin;
    }
}
