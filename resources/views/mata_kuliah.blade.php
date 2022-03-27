@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="form-row">
                <div class="col">
                    <a class="btn btn-success" href="{{ route('add_mata_kuliah.form') }}">Tambah Mata Kuliah</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (count($mata_kuliah) >= 1)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Kode Mata Kuliah</th>
                                <th scope="col">Nama</th>
                                <th scope="col">SKS</th>
                                <th scope="col" class="w-25">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mata_kuliah as $matkul)
                                <tr>
                                    <td>{{ $matkul->kd_matkul }}</td>
                                    <td>{{ $matkul->nama }}</td>
                                    <td>{{ $matkul->sks }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('edit_mata_kuliah.form', ['id' => $matkul->kd_matkul]) }}">Edit</a>
                                        <button type="button" class="btn btn-danger" @click="delete_mata_kuliah('{{ $matkul->kd_matkul }}')">Hapus</button>
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
                delete_mata_kuliah: function(id) {
                    if (confirm("Yakin Ingin Menghapus Data Mata Kuliah?")) {
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
                                alert('Data Mata Kuliah Berhasil Dihapus')
                            } else {
                                alert('Data Mata Kuliah Gagal Dihapus, Silahkan Coba Lagi')
                            }
                        });
                    }

                    return false
                }
            }
        })
    </script>
@endpush