{{-- reference: https://laravel.com/docs/12.x/blade#components --}}
<header class="flex justify-between bg-indigo-800 text-white p-4">
    <h1>laravel</h1>
    <nav>
        <ul class="flex gap-4">
            <li>
                <a href="{{ route('welcome') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('applicants.index') }}">Applicants</a>
            </li>
        </ul>
    </nav>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>
</header>
