@foreach ($user->roles as $role)
    <div class="role-box role-nivel-{{$role->nivel}}">
        <span class="role-scope">{{$role->scope}}</span>
        <span class="role-title">{{$role->title}}</span>
    </div>
@endforeach
