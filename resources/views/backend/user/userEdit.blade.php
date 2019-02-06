<div class="container-cookbook">
    <div class="card uper">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('cp.userEditPost', ['id' => $users->id]) }}" class="left-form" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="name"> Name</label>
                    <input type="text" class="input" name="name" value="{{ $users->name }}"/>
                </div>

                <div class="form-group">
                    <label for="unit">Email</label>
                    <input type="text" class="input" name="email" value="{{ $users->email }}"/>
                </div>

                <div class="form-group">
                    <label for="unit">User Group</label>
                    <input type="text" class="input" name="user_group" value="{{ $users->user_group }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>