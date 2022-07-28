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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
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
                <div class="card">
                    <div class="container my-4">
                        <form action="{{ route('frontend.store') }}" method="POST">
                            <h3 style="text-align: center"> Masukan Form Booking eTiket </h3>
                            <div class="form-group">
                                @csrf
                                <label for="exampleFormControlInput1">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukan Nama Lengkap Anda">
                              </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                              </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">No.Handphone</label>
                                <input type="phone" class="form-control" name="phone" placeholder="628xxxx">
                              </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jumlah Tiket</label>
                                <input type="number" class="form-control" name="ticket" placeholder="">
                              </div>
                              <button type="submit" class="btn btn-success"> Dapatkan Tiket! </button>
                        </form>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-mds" role="document">
                                <div class="modal-content shadow-sm">
                                    <div class="modal-body">
                                        <h3 class="text-center">Apakah anda yakin untuk menghapus <span id="modal-name"
                                                class="text-danger"></span>?</h3>
                                    </div>
                                    <div class="modal-footer  d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary font-weight-bold mr-3"
                                            data-dismiss="modal">Kembali</button>
                                        <button type="button" class="btn btn-danger font-weight-bold ml-3"
                                            id="modal-confirm_delete">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
