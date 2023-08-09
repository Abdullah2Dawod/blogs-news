@extends('layouts.ext_admin')
@section('content2')
    <div class="col-lg-12 margin-tb row d-flex justify-content-between m-2">
        <div class="left">
            <h2>Creat :</h2>
        </div>
        <div class="right">
            <a class="btn btn-primary" href="{{ route('admin.index') }}" enctype="multipart/form-data">
                Back</a>
        </div>
    </div>
    <hr>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title Name :</strong>
                    <input type="text" name="title" class="form-control" placeholder="title Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description :</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>News Source :</strong>
                    <textarea name="news_source" class="form-control" rows="4" placeholder="News Source"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" id="image" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Add New</button>
        </div>
    </form>
@endsection
