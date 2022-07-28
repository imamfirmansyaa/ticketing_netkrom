@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <strong>Berhasil!</strong> {{ $message }}
        </div>
    @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x close" data-dismiss="alert">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <strong>
                    Data Gagal Disimpan!
                </strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($customer->tickets as $ticket)
                <div class="card mt-4">
                    <div class="container my-4">
                        <h2> eTicket </h2>
                        <div class="card">
                            <div class="container">
                                <div class="row mt-2">
                                    <div class="col col-md-6">
                                        <h4>{{ $ticket->code }}</h4>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                {{ $customer->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-6">
                                                {{ $customer->email }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-6">
                                                {{ $customer->phone }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col col-md-6">
                                                {{ $customer->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endsection
    @section('script')
        {{-- <script>
        $(document).ready(function () {
            $.noConflict();
            var table = $('#service-table').DataTable();
        });
        </script>
        <script>
            function deleteService(id, name) {
                $('#modal-name').html(name);
                $('#modal-confirm_delete').attr('onclick', `confirmDeleteService(${id})`);

                $('#deleteModal').modal('show');
            }

            function confirmDeleteService(id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ url('service') }}/' + id,
                    type: 'delete', // replaced from put
                    dataType: "JSON",
                    data: {
                        "id": id // method and token not needed in data
                    },
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        var url = "{{ route('service.index') }}"; //the url I want to redirect to
                        $(location).attr('href', url);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                });
            }
        </script> --}}
    @endsection
