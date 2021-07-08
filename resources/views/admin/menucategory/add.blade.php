@extends('admin.layouts.admin')

@section('title')
    <title>Add menu category</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.contain-header', ['name' => "Menu", "key" => "Add"])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('menus.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category menu name</label>
                                <input type="text" class="form-control" name="menuName">
                            </div>
                            <div class="form-group">
                                <label>Parent Id</label>
                                <select class="form-control" name="parentId">
                                    <option value="0">Select category menu parent</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
@endsection
