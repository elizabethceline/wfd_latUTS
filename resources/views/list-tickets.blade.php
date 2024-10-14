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
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    <div class="w-9/12 flex flex-col justify-center items-center">
        <h1 class="text-5xl text-center">Tickets</h1>
        <div class="grid grod-cols-1 sm:grid-cols-3 gap-4 mt-4 w-full">
            @foreach ($tickets as $ticket)
                <div class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 w-full">
                    <h5 class="text-xl font-medium leading-tight">{{ $ticket->customer_name }}</h5>
                    <p class="mb-4 text-base">
                        {{ $ticket->seat_number }}
                    </p>
                    @if ($ticket->is_checked_in)
                        <p class="mb-4 text-xs">
                            Checked In at {{ $ticket->check_in_time }}
                        </p>
                    @else
                        <form action="{{ route('ticket.checkin', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <button type="submit"
                                class="inline-block rounded bg-primary px-6 pb-2.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                data-twe-ripple-init data-twe-ripple-color="light">
                                Check In
                            </button>
                        </form>
                    @endif

                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('ticket.delete', $ticket->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="mt-2 inline-block rounded bg-danger px-6 pb-2.5 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-red-300 transition duration-150 ease-in-out "
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
