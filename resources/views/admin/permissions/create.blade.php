<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    <a class="btn btn-primary float-right mb-3" href="{{route('admin.permissions.index')}}">Role Index</a>
                </div>
                <div class="">
                    <form action="{{route('admin.permissions.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Permission</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Permission...">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #1a202c;">Add</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
