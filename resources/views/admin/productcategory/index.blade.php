@extends('admin.layouts.admin')

@section('title')
    <title>Admin</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.contain-header', ['name' => "Category", "key" => "List"])

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Parent Category ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryList as $value)                           
                                <tr>
                                    <th scope="row">{{$value['id']}}</th>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['parent_id']}}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['id' => $value['id']]) }}" class = "btn btn-secondary">Edit</a>
                                        <a href="{{ route('categories.delete', ['id' => $value['id']]) }}" class = "btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$categoryList->links()}}
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
