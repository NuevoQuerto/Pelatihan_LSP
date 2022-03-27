@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Edit Data Dosen</h5>
                <div class="card-body">
                <!-- Alert Message -->
                @verbatim
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if="errors.length">
                        <li v-for="error in errors">{{ error }}</li>
                    </div>
                @endverbatim

                <!-- Form -->
                <form method="PATCH" @submit="edit_dosen">
                    @csrf

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" v-model="nama" id="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" v-model="alamat" id="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a class="ml-2 btn btn-secondary" href="{{ route('dosens') }}">Batal</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>

    <script>
        var app = new Vue({
            el: "#app",
            data: {
                errors: [],
                nama: '{{ $dosen->nama ?? '' }}',
                alamat: '{{ $dosen->alamat ?? '' }}'
            },
            methods: {
                edit_dosen: function(e) {
                    e.preventDefault()

                    this.errors = []

                    if (this.nama && this.alamat) {
                        fetch('{{ url()->current() }}/',
                            {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({'nama': this.nama, 'alamat': this.alamat})
                            }
                        )
                        .then(response => response.json())
                        .then(data => {
                            if (data.code === 201) {
                                window.location.href = '{{ route('dosens') }}';
                            } else {
                                this.errors.push(data.message)
                            }
                        });
                    }

                    if (!this.nama) {
                        this.errors.push('Masukkan Nama.')
                    }

                    if (!this.alamat) {
                        this.errors.push('Masukkan Alamat.')
                    }
                }
            }
        })
    </script>
@endpush