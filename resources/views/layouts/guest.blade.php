

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex ">
        <!-- Image Section -->
        <div class="w-full md:w-1/2 md:flex hidden justify-center items-center">
    @if(Route::is('login'))
        <img src="{{ URL::asset('/image/login.jpg') }}" alt="" height="800" width="800">
    @elseif(Route::is('register'))
        <img src="{{ URL::asset('/image/register.jpg') }}" alt="" height="800" width="800">
    @else(Route::is('forgot-password'))
        <img src="{{ URL::asset('/image/forget.jpg') }}" alt="" height="800" width="800">
    @endif
        </div>

        
      
        <div class="w-full md:w-1/2 flex justify-center items-center bg-blue-600  ">
        
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 relative overflow-hidden sm:rounded-lg  h-3/4 flex justify-center items-center ">
    
            @if(Route::is('login'))
            <span class="absolute top-28 text-2xl capitalize text-white font-bold">login page</span>  
    @elseif(Route::is('register'))
    <span class="absolute top-28 text-2xl capitalize text-white font-bold">registeration page</span>  
    @else(Route::is('forgot-password'))
    <span class="absolute top-28 text-2xl capitalize text-white font-bold">Forget password page</span>  
    @endif
            {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
