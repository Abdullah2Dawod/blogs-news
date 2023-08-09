@extends('layouts.ext_admin')
@section('content2')


    <form action="{{ route('logos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Logo :</strong>
                    <input type="text" name="name_logo" class="form-control" placeholder="Name Logo">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Logo:</strong>
                    <input type="file" id="image" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
@endsection


