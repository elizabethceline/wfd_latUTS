@extends('base.layout')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <div class="w-9/12 flex flex-col justify-center items-center">
        <h1 class="text-5xl text-center">Movies</h1>
        <div class="grid grod-cols-1 sm:grid-cols-3 gap-4 mt-4 w-full">
            @foreach ($movies as $movie)
                <div class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 w-full">
                    <h5 class="text-xl font-medium leading-tight">{{ $movie->movie_title }}</h5>
                    <p class="mb-4 text-base">
                        {{ $movie->release_date }}
                    </p>
                    <p class="mb-4 text-xs">
                        {{ $movie->duration }} minutes
                    </p>
                    <a href="{{ route('movie.book', $movie) }}">
                        <button type="button"
                            class="inline-block rounded bg-primary px-6 pb-2.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Book Now
                        </button>
                    </a>
                    <a href="{{ route('movie.tickets', $movie) }}">
                        <button type="button"
                            class="inline-block rounded bg-primary px-6 pb-2.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            View Tickets
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
