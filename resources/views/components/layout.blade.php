<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"/>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>JOBALL - ADMIN</title>
    </head>

    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            @auth
            <a href="/listings"><img class=" w-40 pt-3" src="{{asset('images/logomain.png')}}" alt="" class="logo"/></a>
            @else
            <a href="/"><img class=" w-40 pt-3" src="{{asset('images/logomain.png')}}" alt="" class="logo"/></a>
            @endauth
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome, Admin {{auth()->user()->name}}
                    </span>
                </li>
                {{-- <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li> --}}
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                </li>
                @else
                {{-- <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a>
                </li> --}}
                {{-- <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li> --}}
                @endauth
            </ul>
        </nav>
    <main>
        {{-- View Output --}}
        {{-- @yield('content') --}}
        {{$slot}}
    </main>
    
    <footer
        class=" fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-teal-400 text-black h-24 mt-24 opacity-90 md:justify-center text-lg">
        <p class="ml-2 text-left">Copyright &copy; 2023, All Rights reserved</p>
        <br>
        <p class="ml-2">|| Made by Francis Bandelaria</p>
        <a href="https://www.facebook.com/frncsbndlr10/"><i class="fa-brands fa-facebook pr-2 ml-2 fa-2x"></i></a>
        <a href="https://www.instagram.com/francis.bndlr/?hl=en"><i class="fa-brands fa-instagram pr-2 ml-1 fa-2x"></i></a>
        <a href="https://twitter.com/francisssmoto"><i class="fa-brands fa-twitter pr-2 ml-1 fa-2x"></i></a>
        <a href="https://www.youtube.com/channel/UCoZbSpx7Au_YrdW6jI-d7qQ"><i class="fa-brands fa-youtube pr-2 ml-1 fa-2x"></i></a>
        <a href="https://github.com/francisalfonso"><i class="fa-brands fa-github pr-2 ml-1 fa-2x"></i></a>


        {{-- <a href="/listings/create"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5 rounded-lg hover:bg-white hover:text-black">Add Company</a> --}}
    </footer>

    <x-flash-message/>
</body>
</html>