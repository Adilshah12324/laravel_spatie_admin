<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    <a class="btn btn-primary float-right mb-3" href="{{route('admin.roles.index')}}">Role Index</a>
                </div>
                <div class="">
                    <form action="{{route('admin.roles.update',$role)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Permission</label>
                            <input type="text" class="form-control" name="name" value="{{$role->name}}" aria-describedby="emailHelp" placeholder="Enter Role...">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #1a202c;">Update</button>
                    </form>
                </div>
                <br>
                <hr>

                <div class="border mt-5">
                    <h1 style="background-color: #2563eb; color: white; padding: 20px; font-size: 20px;">Role Permissions</h1>
                    <br>
                    @if($role->permissions)
                        @foreach($role->permissions as $role_permission)
                            <form method="POST" action="{{route('admin.roles.permissions.revoke',[$role->id,$role_permission->id])}} " onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">{{$role_permission->name}}</button>
                                <br>
                            </form>
                        @endforeach
                    @endif
                </div>

                <div class="">
                    <form action="{{route('admin.roles.permissions',$role)}}" method="post">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="inputState">Permission</label>
                            <select id="inputState" class="form-control" name="permission">
                                <option selected disabled>Choose...</option>
                                @foreach($permissions as $permission)
                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
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
