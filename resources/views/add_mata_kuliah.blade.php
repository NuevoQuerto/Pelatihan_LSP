@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Tambah Data Mata Kuliah</h5>
                <div class="card-body">
                    <!-- Alert Message -->
                    @verbatim
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" v-if="errors.length">
                            <li v-for="error in errors">{{ error }}</li>
                        </div>
                    @endverbatim

                    <!-- Form -->
                    <form method="POST" @submit="add_mata_kuliah" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="kd_matkul" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kd_matkul" v-model="kd_matkul" id="kd_matkul">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" v-model="nama" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sks" v-model="sks" id="sks">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a class="ml-2 btn btn-secondary" href="{{ route('mata_kuliah') }}">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
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
                kd_matkul: null,
                nama: null,
                sks: null
            },
            methods: {
                add_mata_kuliah: function(e) {
                    e.preventDefault()

                    this.errors = []

                    if (this.kd_matkul && this.nama && this.sks) {
                        fetch('{{ url()->current() }}/',
                            {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    kd_matkul: this.kd_matkul,
                                    nama: this.nama,
                                    sks: this.sks
                                })
                            }
                        )
                        .then(response => response.json())
                        .then(data => {
                            if (data.code === 201) {
                                window.location.href = '{{ route('mata_kuliah') }}';
                            } else {
                                this.errors.push(data.message)
                            }
                        });
                    }

                    if (!this.kd_matkul) {
                        this.errors.push('Masukkan Kode Mata Kuliah.')
                    }

                    if (!this.nama) {
                        this.errors.push('Masukkan Nama.')
                    }

                    if (!this.sks) {
                        this.errors.push('Masukkan SKS.')
                    }
                }
            }
        })
    </script>
@endpush