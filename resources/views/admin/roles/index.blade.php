<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    <a class="btn btn-primary float-right mb-3" href="{{route('admin.roles.create')}}">Create Role</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
{{--                        <th scope="col">Last</th>--}}
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form method="POST" action="{{route('admin.roles.destroy',$role)}} " onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
