<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    /**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'num_socio', 'nome_informal',
        'data_nascimento', 'email', 'foto_url', 'nif', 'telefone',
        'endereco', 'tipo_socio', 'quota_paga', 'ativo',
        'password_inicial', 'passwordConfirmation', 'direcao',
        'sexo','password', 'aluno', 'instrutor', 'num_licenca',
        'tipo_licenca', 'validade_licenca', 'licença_confirmada',
        'num_certificado', 'classe_certificado', 'validade_certificado',
        'certificado_confirmado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'passwordConfirmation', 'remember_token'
    ];
     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // I dont get it :p
    ];

    protected $table = 'users';

    public function hasVerifiedEmail()
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        // dd($this);
        $this->ativo = "1";
        // dd($this);
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\SocioCriado);
    }


    public function aeronaves()
    {
        return $this->belongsToMany('App\Aeronave','aeronaves_pilotos', 'piloto_id', 'matricula');
    }
    

}
