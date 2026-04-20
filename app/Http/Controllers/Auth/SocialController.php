<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class SocialController extends Controller
{
    protected $socialAuthService;

    public function __construct(SocialAuthService $socialAuthService)
    {
        $this->socialAuthService = $socialAuthService;
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // ÉP BUỘC bỏ qua kiểm tra SSL để fix lỗi cURL error 60
            $socialUser = Socialite::driver($provider)
                ->setHttpClient(new Client(['verify' => false]))
                ->stateless()
                ->user();

            $user = $this->socialAuthService->loginOrCreateUser($socialUser, $provider);

            if ($user) {
                Auth::login($user);
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }

            return redirect('/')->with('error', 'Không thể tạo tài khoản.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/')->with('error', 'Lỗi đăng nhập: ' . $e->getMessage());
        }
    }
}