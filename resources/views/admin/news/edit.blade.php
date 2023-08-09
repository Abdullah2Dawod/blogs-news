@extends('layouts.ext_admin')
@section('content2')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb row d-flex justify-content-between m-2">
            <div class="left">
                <h2>Edit :</h2>
            </div>
            <div class="right">
                <a class="btn btn-primary" href="{{ route('admin.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    <hr>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('admin.update', $new->id) }}" method="post" enctype="multipart/form-data"">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>title:</strong>
                    <input type="text" name="title" value="{{ $new->title }}" class="form-control"
                        placeholder="title">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="description"
                        value="{{ $new->description }}">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>news_source:</strong>
                    <input type="text" name="news_source" value="{{ $new->news_source }}" class="form-control"
                        placeholder="news_source">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" id="image" class="form-control" placeholder="image">
                    <img src="{{ $new->image_url }}" width="300px">
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection
