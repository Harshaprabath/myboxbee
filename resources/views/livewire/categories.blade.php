<div>
    <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody wire:sortable="updateCategoryOrder">
            @foreach ($categories as $category)
                <tr wire:sortable.item="{{ $category->id }}" wire:key="task-{{ $category->id }}" wire:sortable.handle>
                    <td class="id">{{ $category->id }}</td>
                    <td class="name">{{ $category->cname }}</td>
                    <td class="name">{{ $category->order }}</td>
                    <td> <button type="button" class="btn-info btn edit" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Edit</button>
                    
                        <form action="{{route('categories.destroy',$category)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn-danger btn" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>   
</div>
