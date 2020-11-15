@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Photo Produk</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @forelse ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @empty
                            <option value="0">Produk Tidak Tersedia</option>
                        @endforelse
                    </select>
                    @error('name')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo Barang</label>
                    <input type="file" required accept="image/*" name="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" id="photo">
                    @error('photo')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br>
                    <label>
                        <input type="radio" required name="is_default" value="1" class="@error('is_default') is-invalid @enderror">
                        Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" required name="is_default" value="0" class="@error('is_default') is-invalid @enderror">
                        Enggak
                    </label>
                    @error('is_default')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Tambah Photo Barang</button></div>
            </form>
        </div>
    </div>
@endsection