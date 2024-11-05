<x-app-layout>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="card mb-6" >
                <div class="card-header">
                    <h4>edit Categories</h4>
                    <a href="{{url('product')}}" class="btn btn-primary float-end">back</a>
                </div>
                <div class="card-body">
<form action="{{url('update',[$product->id])}}"  method="post" class="col-sm-3 border border-danger bg-light shadow rounded mx-auto mt-5 p-1" encrypt="multipart/form-data">
 @csrf  
 <div class="row">

        <div class="form-group">
        <label for="" >name</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
        <label for="" >description</label>
        <textarea name="description" class="form-control">{{old('description')}}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
        <label for="" >price</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>  
      
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">update</button>
    </div>
 </form>

</div>

                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
