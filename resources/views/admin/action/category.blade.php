@extends('admin.admin')
@section('main-panel')
    <div class="container-fluid" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Category</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Category</li>
            </ol>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive p-3">
                {{-- <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody wire:sortable="updateTaskOrder">
                        @foreach ($category as $c)
                            <tr wire:sortable.item="{{ $c->id }}" wire:key="task-{{ $c->id }}"
                                wire:sortable.handle>
                                <td class="id">{{ $c->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
                <livewire:categories />
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/update-to-category" method="POST">
                        <div class="modal-body">

                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="categoryname">Category Name</label>
                                <input type="text" class="form-control" name="categoryname" id="category"
                                    placeholder="Enter Category Name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
