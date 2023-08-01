<!DOCTYPE html>
<html lang="">
<head>
    <title>Laravel 10 Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
{{-- blade-formatter-disbale --}}
<style type="text/tailwindcss">
    .btn {
        @apply px-4 py-2 rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500;
    }

    .link {
        @apply text-indigo-600 hover:text-indigo-500;
    }

    label {
        @apply block text-sm font-medium text-gray-700;
    }

    input, textarea {
        @apply block w-full mt-1 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-5;
    }
</style>
{{-- blade-formatter-enable --}}

@yield('styles')
<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="text-2xl mb-4">@yield('title')</h1>
<div>
    @if (session()->has('success'))
        <div x-data="{ flash: true}">
            <div x-show="flash" class="mb-10 relative rounded border border-green-400 px-4 py-3 text-green-700 bg-green-400" role="alert">
         <span class="absolute top-0 bottom-0 right-0 px-4 py-3" >
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" @click="flash = false"
               stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </span>
                <span class="block font-bold">Success!</span>
                <strong class="font-medium">{{ session('success') }}</strong>
            </div>
        </div>
    @endif


    @yield('content')
</div>
</body>
</html>
