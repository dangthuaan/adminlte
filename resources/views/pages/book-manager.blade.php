@extends('layouts.default')

@section('content')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<!-- some styles -->
<style>
    .form-group span {
        color: red;
    }

    .btn {
        background-color: #00a65a;
        border: none;
        color: white;
        padding: 8px 10px;
        font-size: 15px;
        cursor: pointer;
    }

    .btn i {
        padding-right: 5px;
    }

/* Darker background on mouse-over */
    .btn:hover {
        background-color: #008d4c;
        color: white;
    }

    #bookTable td:last-child {
        text-align: center;
        font-size: 15px;
    }

    #bookTable td:last-child i{
        color: #00a65a;
    }

    #bookTable td:last-child .sub-btn-edit {
        padding-right: 10px;
    }

    #bookTable td:last-child .sub-btn-delete {
        padding-left: 10px;
    }

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Books
            <small>book library</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Books</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="#createBookModal" class="btn" data-toggle="modal">
                            <i class="fa fa-plus"></i>
                            <span>Add Book</span>
                        </a>
                        @include('pages.create-book')
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="bookTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book title</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Publish date</th>
                                    <th>Language</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td id="td_id"> {{$book->id}} </td>
                                    <td id="td_title"> {{$book->title}} </td>
                                    <td id="td_author"> {{$book->author}} </td>
                                    <td id="td_publisher"> {{$book->publisher}} </td>
                                    <td id="td_publish_date"> {{$book->publish_date}} </td>
                                    <td id="td_language"> {{$book->language}} </td>
                                    <td id="td_price"> {{$book->price}} </td>
                                    <td id="">
                                        <a href="#updateBookModal_{{ $book->id }}" data-toggle="modal" class="sub-btn-edit"><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>
                                        <a href="#deleteBookModal_{{ $book->id }}" data-toggle="modal" class="sub-btn-delete"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
                                    </td>
                                    @include('pages.edit-book')
                                </tr>
                                @include('pages.delete-book')
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Book title</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Publish date</th>
                                    <th>Language</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
