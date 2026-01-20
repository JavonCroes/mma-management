<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Login & Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white">MMA Management</h1>
            </a>
        </div>

        <div x-data="{ tab: '{{ $errors->has('name') || $errors->has('password_confirmation') ? 'register' : 'login' }}' }" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <!-- Tabs -->
            <div class="flex border-b border-gray-200 dark:border-gray-700">
                <button @click="tab = 'login'" :class="{ 'border-b-2 border-indigo-500 text-indigo-600 dark:text-indigo-400': tab === 'login' }" class="flex-1 py-2 text-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                    Login
                </button>
                <button @click="tab = 'register'" :class="{ 'border-b-2 border-indigo-500 text-indigo-600 dark:text-indigo-400': tab === 'register' }" class="flex-1 py-2 text-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                    Register
                </button>
            </div>

            <!-- Login Form -->
            <div x-show="tab === 'login'" class="pt-4">
                 @if ($errors->any() && !$errors->has('name') && !$errors->has('password_confirmation'))
                    <div class="mb-4 font-medium text-sm text-red-600 dark:text-red-400">
                        {{ __('Whoops! Something went wrong.') }}
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
                                <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/login">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <label for="login_email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                        <input id="login_email" type="email" name="email" required autofocus autocomplete="username" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="login_password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Password</label>
                        <input id="login_password" type="password" name="password" required autocomplete="current-password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                         @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif

                        <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Log in
                        </button>
                    </div>
                </form>
            </div>

            <!-- Registration Form -->
            <div x-show="tab === 'register'" class="pt-4" style="display: none;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <label for="register_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Name</label>
                        <input id="register_name" type="text" name="name" required autofocus autocomplete="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label for="register_email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                        <input id="register_email" type="email" name="email" required autocomplete="username" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="register_password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Password</label>
                        <input id="register_password" type="password" name="password" required autocomplete="new-password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
