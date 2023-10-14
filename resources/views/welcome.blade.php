<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="data:image/png;base64,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">
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('categories.index') }}" class="underline text-gray-900 dark:text-white">Categories</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Categories Listings
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('projects.index') }}" class="underline text-gray-900 dark:text-white">Projects</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Projects Listing
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
