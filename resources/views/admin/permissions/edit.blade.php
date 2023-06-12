<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    <a class="btn btn-primary float-right mb-3" href="{{route('admin.permissions.index')}}">Role Index</a>
                </div>
                <div class="">
                    <form action="{{route('admin.permissions.update',$permission)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Permission</label>
                            <input type="text" class="form-control" name="name" value="{{$permission->name}}" aria-describedby="emailHelp" placeholder="Enter Permission...">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #1a202c;">Update</button>
                    </form>
                </div>

                <div class="border mt-5">
                    <h1 style="background-color: #2563eb; color: white; padding: 20px; font-size: 20px;">Roles</h1>
                    <br>
                    @if($permission->roles)
                        @foreach($permission->roles as $permission_role)
                            <form method="POST" action="{{route('admin.permissions.roles.remove',[$permission->id,$permission_role->id])}} " onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">{{$permission_role->name}}</button>
                                <br>
                            </form>
                        @endforeach
                    @endif
                </div>

                <div class="">
                    <form action="{{route('admin.permissions.roles',$permission)}}" method="post">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="inputState">Role</label>
                            <select id="inputState" class="form-control" name="role">
                                <option selected disabled>Choose...</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #1a202c;">Assign</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
