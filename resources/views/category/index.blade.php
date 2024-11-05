<x-app-layout>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-6" >
                <div class="card-header">
                    <!-- <h4>Categories</h4> -->
                  
                    <a href="{{url('product/create')}}" class="btn btn-primary float-end">add product</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>sr no.</th>
                            <th>name</th>   
                            <th>description</th>
                            <th>price</th>
                            <th>added_by</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($products as $product)
                      
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->added_by}}</td>
                            @if((auth()->user()->id == $product->added_by) || (auth()->user()->role == 'admin'))

                            <td><a href="{{url('edit',[$product->id])}}" class="btn btn-success">edit</a></td>
                            <td><a href="{{url('delete',[$product->id])}}" class="btn btn-danger">delete</a></td>
                            @else
                            <td>You are not authorized</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
