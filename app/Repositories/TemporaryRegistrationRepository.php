<?php


use Illuminate\Support\Facades\DB;
use App\Models\TemporaryRegistration;

class temporaryRegistrationReposit{
    /**
     *
     */
    public function temporaryRegistration(TemporaryRegistration $temporaryRegistration){
        $temporaryRegistration = DB::table('temporary_registration')->insert([
            'user_name' => $temporaryRegistration->userName,
            'mail_address' => $temporaryRegistration->mailAddress,
            'password' => $temporaryRegistration->password,
            'login_token' => $temporaryRegistration->temporaryToken,
            'created_at' => $temporaryRegistration->createdAt,
            'updated_at' => $temporaryRegistration->updatedAt
        ]);
        return $temporaryRegistration;
    }
}
