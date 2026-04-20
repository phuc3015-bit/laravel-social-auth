<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthService
{
    /**
     * Xử lý logic tìm hoặc tạo mới user từ Socialite
     */
    public function loginOrCreateUser($socialUser, $provider)
    {
        // 1. Tìm user dựa trên email
        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            // 2. Cập nhật thông tin và ĐẢM BẢO có student_id để hiện lên UI
            $user->update([
                'provider_name' => $provider,
                'provider_id'   => $socialUser->getId(),
                'avatar'        => $socialUser->getAvatar(),
                'student_id'    => '23810310391', // Luôn cập nhật MSSV của Phuc
            ]);
        } else {
            // 3. Tạo mới user nếu chưa có
            $user = User::create([
                'name'          => $socialUser->getName(),
                'email'         => $socialUser->getEmail(),
                'provider_name' => $provider,
                'provider_id'   => $socialUser->getId(),
                'avatar'        => $socialUser->getAvatar(),
                'student_id'    => '23810310391', // MSSV của Phuc
                'password'      => null, 
            ]);
        }

        // 4. Trả user về cho Controller để Controller xử lý Auth::login
        return $user;
    }
}