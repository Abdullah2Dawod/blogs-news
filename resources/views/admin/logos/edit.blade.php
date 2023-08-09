@extends('layouts.ext_admin')
@section('content2')
    <div class="container mt-2">
        <div class="col-lg-12 margin-tb row d-flex justify-content-between m-2">
            <div class="left">
                <h2>Creat :</h2>
            </div>
            <div class="right">
                <a class="btn btn-primary" href="{{ route('logos.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
        <hr>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('logos.update', $logo->id) }}" method="post" enctype="multipart/form-data"">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>title:</strong>
                        <input type="text" name="name_logo" value="{{ $logo->name_logo }}" class="form-control"
                            placeholder="title">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Logo:</strong>
                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
                        <img src="{{ $logo->image_url }}" width="300px">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
