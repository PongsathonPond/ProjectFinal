<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'title_Name' => ['required', 'string', 'max:255'],
            'first_Name' => ['required', 'string', 'max:255'],
            'last_Name' => ['required', 'string', 'max:255'],
            'phone_Number' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'title_Name' => $input['title_Name'],
            'first_Name' => $input['first_Name'],
            'last_Name' => $input['last_Name'],
            'phone_Number' => $input['phone_Number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
