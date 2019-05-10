<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    /**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'numeroSocio', 'nomeInformal',
        'dataNascimento', 'email', 'foto', 'nif', 'telefone',
        'endereco', 'tipoSocio', 'quotasEmDia', 'socioAtivo',
        'passwordInicial','direcao', 'direcao','sexo','password'
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

    public function tipoSocio()
    {
        switch ($this->tipo_socio) {
            case 0:
                return 'Piloto';
            case 1:
                return 'Nao Piloto';
            case 2:
                return 'Aeromodelista';
        }

        return 'Unknown';
    }

    public function Sexo()
    {
      switch ($this->sexo) {
          case 0:
              return 'Masculino';
          case 1:
              return 'Feminino';
      }

      return 'Unknown';
    }

    public function isPiloto()
    {
        return $this->tipoSocio === '0';
    }

    public function isNaoPiloto()
    {
        return $this->tipoSocio === '1';
    }

    public function isAeromodelista()
    {
        return $this->tipoSocio === '2';
    }

    public function isMasculino()
    {
        return $this->sexo === '0';
    }

    public function isFeminino()
    {
        return $this->sexo === '1';
    }

}
