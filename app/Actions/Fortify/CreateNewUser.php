<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Regional;
use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Asignacion;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;



class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'ci' => ['required', 'integer'],
            'cod_reg' => ['required', 'string', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) 
        {
            $regionales = new Regional();
            $regionales->desg_telegrafico = $input['cod_reg'];
            $regionales->nom_regional = $input['descRegional'];
            $regionales->save();

            $funcionario = new Funcionario();
            $funcionario->estado='ACTIVO';
            $funcionario->usuario_id=1;
            $funcionario->save();

            $cargo = new Cargo();
            $cargo->identificador = 'SIS001';
            $cargo->nombre_cargo = 'ADMINISTRADOR DE SISTEMAS';
            $cargo->estado = 'OCUPADO';
            $cargo->save();

            $asignacion = new Asignacion();
            $asignacion->cargo_id = $cargo->id;
            $asignacion->funcionario_id = $funcionario->id;
            $asignacion->save();


            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'es_funcionario' => true,
                'cod_reg' => $input['cod_reg'],
                'password' => Hash::make($input['password']),
            ])->assignRole('Administrador'), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
