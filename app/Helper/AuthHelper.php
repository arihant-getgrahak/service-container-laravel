<?php

namespace App\Helper;
use DB;
use Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class AuthHelper
{
    protected $session;

    // public function boot()
    // {
    //     $this->session = app(Session::class);
    // }

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function test()
    {
        $user = $this->session->get("user");
        dd($user);
    }

    // login function
    public function login(array $data)
    {
        $checkUserExist = User::where('email', $data['email'])->first();
        if (!$checkUserExist) {
            return [
                'success' => false,
                'message' => 'Entered Email is not registered'
            ];
        }
        if (!Hash::check($data['password'], $checkUserExist->password)) {
            return [
                'success' => false,
                'message' => 'Incorrect Password'
            ];
        }
        $this->session->put("user", $checkUserExist);
        $this->session->migrate(true);
        $this->user = $checkUserExist;
        return [
            'success' => true,
            'message' => $checkUserExist->password

        ];
    }

    // register function
    public function register(array $data): array
    {
        DB::beginTransaction();
        try {
            $formData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number']
            ];

            User::create($formData);
            DB::commit();
            return [
                'success' => true,
                'message' => 'User created successfully'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function logout(): void
    {
        $this->session->remove("user");
    }
}