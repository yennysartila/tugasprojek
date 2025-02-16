<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4">
    <label for="captcha">Captcha</label>
    <div class="flex items-center">
        <img id="captchaImage" src="{{ captcha_src() }}" class="rounded border-gray-300" alt="captcha">
        <button type="button" onclick="refreshCaptcha()" class="ml-2 text-blue-500">🔄</button>
    </div>
    <input id="captcha" type="text" class="form-control mt-2 w-full" name="captcha" required>
</div>

    
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
<!-- Tambahkan script JavaScript -->
<script>
    function refreshCaptcha() {
        fetch('/captcha/default?' + Math.random(), { cache: "no-store" })
            .then(response => response.blob())
            .then(blob => {
                let captchaImg = document.querySelector("#captchaImage");
                if (captchaImg) {
                    captchaImg.src = URL.createObjectURL(blob);
                }
            })
            .catch(error => console.error('Error refreshing captcha:', error));
    }
</script>

</x-guest-layout>
