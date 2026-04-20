<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đồ án Laravel - Phuc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    @if (session('error'))
        <div class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">{{ session('success') }}</div>
    @endif

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
        @if (Auth::check())
            <div class="text-center">
                <h2 class="text-2xl font-bold text-blue-600 mb-6 uppercase">Thông Tin Sinh Viên</h2>
                <img src="{{ Auth::user()->avatar }}" class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-blue-100 shadow-sm">
                
                <div class="space-y-4 text-left bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-500">Họ và tên: <span class="block text-lg font-bold text-gray-800">{{ Auth::user()->name }}</span></p>
                    <p class="text-sm text-gray-500">Mã sinh viên: <span class="block text-xl font-bold text-blue-700 tracking-widest">{{ Auth::user()->student_id }}</span></p>
                    <p class="text-sm text-gray-500">Email: <span class="block text-gray-700">{{ Auth::user()->email }}</span></p>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="mt-8">
                    @csrf
                    <button class="w-full py-3 bg-red-500 text-white rounded-xl font-bold hover:bg-red-600 transition-all shadow-md">ĐĂNG XUẤT</button>
                </form>
            </div>
        @else
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Đăng Nhập Đồ Án</h2>
                <p class="text-sm text-gray-500 mb-8 font-medium italic">Phuc | IT Project 2026</p>
                
                <div class="space-y-4">
                    <a href="/auth/google/redirect" class="flex items-center justify-center gap-3 w-full py-3 border border-gray-300 rounded-xl hover:bg-gray-50 font-medium text-gray-700 shadow-sm transition-all active:scale-95">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5">
                        Tiếp tục với Google
                    </a>
                    <a href="/auth/facebook/redirect" class="flex items-center justify-center gap-3 w-full py-3 bg-[#1877F2] text-white rounded-xl hover:opacity-90 font-medium shadow-sm transition-all active:scale-95">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Tiếp tục với Facebook
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>