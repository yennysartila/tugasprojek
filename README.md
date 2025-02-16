# **nama    : Yenny sartila bonerate**
# **nim     :Nim 220101074**

# Implementasi Laravel

## BAGIAN II: IMPLEMENTASI LARAVEL (60 POIN)

### 8. Implementasi Autentikasi dengan Laravel Breeze
#### Langkah-langkah:
1. Install Laravel Breeze:
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```
2. Jalankan aplikasi:
    ```bash
    php artisan serve
    ```
3. Contoh kode registrasi dan login sudah otomatis dibuat oleh Breeze.

### 9. Middleware untuk Mencegah XSS
#### Implementasi Middleware:
1. Buat middleware:
    ```bash
    php artisan make:middleware XssProtection
    ```
2. Tambahkan logika sanitasi:
    ```php
    public function handle($request, Closure $next)
    {
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            $input = strip_tags($input);
        });
        $request->merge($input);
        return $next($request);
    }
    ```
3. Daftarkan middleware di `app/Http/Kernel.php`.

### 10. Watermark dengan Logo di Blade
#### Implementasi:
1. Simpan logo di `public/logo.png`.
2. Tambahkan di Blade:
    ```html
    <!-- Navbar -->
    <img src="{{ asset('logo.png') }}" alt="Logo" class="navbar-logo">

    <!-- Footer -->
    <img src="{{ asset('logo.png') }}" alt="Logo" class="footer-logo">

    <!-- Login -->
    <img src="{{ asset('logo.png') }}" alt="Logo" class="login-logo">
    ```

### 11. Tanda Tangan Digital dengan QR Code
#### Implementasi:
1. Install package QR Code:
    ```bash
    composer require simplesoftwareio/simple-qrcode
    ```
2. Buat controller untuk generate QR Code:
    ```php
    public function generateQrCode(Request $request)
    {
        $data = "Tanda Tangan Digital - User ID: 123";
        $qrCode = QrCode::size(300)->generate($data);
        return view('qr-code', compact('qrCode'));
    }
    ```
3. Tampilkan di Blade:
    ```html
    {!! $qrCode !!}
    ```

### 12. Implementasi CAPTCHA pada Login/Registrasi
#### Langkah-langkah:
1. Install package CAPTCHA:
    ```bash
    composer require anhskohbo/no-captcha
    ```
2. Tambahkan di form:
    ```html
    <div>
        <label for="captcha">Captcha</label>
        {!! captcha_img() !!}
        <input id="captcha" type="text" class="form-control" name="captcha" required>
        <a href="javascript:void(0)" onclick="refreshCaptcha()">Refresh Captcha</a>
    </div>
    ```
3. Validasi di controller:
    ```php
    $request->validate([
        'g-recaptcha-response' => 'required|captcha',
    ]);
    ```
4. tambahkan routes:
    ```php
    
    Route::get('/refresh-captcha', function () {
        return response()->json(['captcha' => captcha_img()]);
    });
    ```

