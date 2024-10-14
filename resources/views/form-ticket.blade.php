@extends('base.layout')

@section('content')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <div class="w-9/12 flex flex-col justify-center items-center">
        <h1 class="text-5xl mb-8">Details</h1>
        <h2 class="text-xl">Name: {{ $movie->movie_title }}</h2>
        <h2 class="text-xl">Duration: {{ $movie->duration }}</h2>
        <h2 class="text-xl mb-8">Release Date: {{ $movie->release_date }}</h2>
        <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="integer" name="movie_id" id="movie_id" value="{{ $movie->id }}" hidden>
            <div class="relative mb-3" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                    id="customer_name" name="customer_name" />
                <label for="customer_name"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none">
                    Customer Name
                </label>
            </div>
            <div class="relative mb-3" data-twe-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                    id="seat_number" name="seat_number" />
                <label for="seat_number"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none">
                    Seat Number
                </label>
            </div>
            <button type="submit"
                class="inline-block rounded bg-primary px-6 pb-2.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2"
                data-twe-ripple-init data-twe-ripple-color="light">
                Book
            </button>
        </form>
    </div>
@endsection
