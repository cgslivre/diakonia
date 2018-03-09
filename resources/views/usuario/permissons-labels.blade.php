@foreach ($user->roles as $role)
    <div class="role-box role-nivel-{{$role->nivel}}">
        <span class="role-group">{{$role->group}}</span>
        <span class="role-title">{{$role->title}}</span>
    </div>
@endforeach
