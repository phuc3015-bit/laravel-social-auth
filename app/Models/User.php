<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các trường được phép ghi dữ liệu (Mass Assignment)
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'provider_name', // Tên nhà cung cấp (google/facebook)
        'provider_id',   // ID từ phía Google/FB
        'avatar',        // Link ảnh đại diện
        'student_id',    // MSSV: 23810310391
    ];

    /**
     * Các trường cần ẩn khi xuất dữ liệu JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Ép kiểu dữ liệu
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}