@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="form-row">
                <div class="col">
                    <a class="btn btn-success" href="{{ route('add_dosen.form') }}">Tambah Dosen</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (count($dosens) >= 1)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col" class="w-25">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dosens as $dosen)
                                <tr>
                                    <td>{{ $dosen->id }}</td>
                                    <td>{{ $dosen->nama }}</td>
                                    <td>{{ $dosen->alamat }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('edit_dosen.form', ['id' => $dosen->id]) }}">Edit</a>
                                        <button type="button" class="btn btn-danger" @click="delete_dosen({{ $dosen->id }})">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        var app = new Vue({
            el: "#app",
            methods: {
                delete_dosen: function(id) {
                    if (confirm("Yakin Ingin Menghapus Data Dosen?")) {
                        fetch("{{ url()->current() }}/" + id,
                            {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            }
                        )
                        .then(response => response)
                        .then(data => {
                            if (data.status === 200) {
                                location.reload();
                                alert('Data Dosen Berhasil Dihapus')
                            } else {
                                alert('Data Dosen Gagal Dihapus, Silahkan Coba Lagi')
                            }
                        });
                    }

                    return false
                }
            }
        })
    </script>
@endpush