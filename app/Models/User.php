<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use App\Models\User;
use App\Models\Funcionario;
use App\Models\Asignacion;
use App\Models\Cargo;
use App\Models\Organigrama;


//Laravel Permissions
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles; //Laravel Permmission

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cod_reg', 'email', 'password', 'es_funcionario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_cargo($id){

        $cargo_dato = Funcionario::join('users', 'users.id', '=', 'funcionarios.usuario_id')
                        ->join('asignacions', 'asignacions.funcionario_id', '=', 'funcionarios.id')
                        ->join('cargos', 'cargos.id', '=', 'asignacions.cargo_id')

                        ->selectRaw('
                            cargos.nombre_cargo

                        ')->find($id);

        return $cargo_dato['nombre_cargo'];

    }

    public function adminlte_unidad($id){
        $unidad_dato = Funcionario::join('users', 'users.id', '=', 'funcionarios.usuario_id')
                            ->join('asignacions', 'asignacions.funcionario_id', '=', 'funcionarios.id')
                            ->join('cargos', 'cargos.id', '=', 'asignacions.cargo_id')
                            ->join('organigramas', 'organigramas.id', '=', 'cargos.organigrama_id' )

                            ->selectRaw('
                                organigramas.desg_teleg,
                                organigramas.nombre_unidad
                                

                            ')->find($id);

        if($unidad_dato != null){
            return $unidad_dato['desg_teleg'] . ' - ' . $unidad_dato['nombre_unidad'];
        }else
            return '';
    }

    public function adminlte_profile_url(){
        return 'user/profile';
    }

    public function adminlte_image(){
        return 'http://picsum.photos/300/300';
    }

    /*public function adminlte_cargo(){

    }
    
    public function adminlte_unidad(){

    }*/
}
