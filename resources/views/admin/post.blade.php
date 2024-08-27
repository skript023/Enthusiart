@extends('admin.layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery Posts</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Artwork</h6>
            <a href="/dashboard/post/add" class="btn btn-primary">Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Artist Name</th>
                            <th>Artwork Name</th>
                            <th>Materials</th>
                            <th>Dimension</th>
                            <th>Year</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->artist_name }}</td>
                            <td>{{ $post->artwork_name }}</td>
                            <td>{{ $post->materials }}</td>
                            <td>{{ $post->dimension }}</td>
                            <td>{{ $post->year }}</td>
                            <td>{{ $post->stock }}</td>
                            <td>Rp{{ number_format($post->price, 0, ',', '.') }}</td>
                            <td><img src="{{ asset('storage') }}/uploads/arts/{{ $post->image }}" width="100"></td>
                            <td>{{ $post-> description }}</td>
                            <td>
                                <div class="btn-edit">
                                    <a href="/post/edit/{{ $post->id }}" style="text-decoration: none">
                                        <i class="fas fw fa-pen-to-square mr-3" style="color: #1cc88a"></i>
                                    </a>
                                    <a href="/post/delete/{{ $post->id }}">
                                        <i class="fas fw fa-trash" style="color: #E61010"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{--  <tfoot>
                        <tr>
                            <th>Artist Name</th>
                            <th>Artwork Name</th>
                            <th>Materials</th>
                            <th>Dimension</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>  --}}
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
