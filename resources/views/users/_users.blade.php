@foreach ($users as $user)
    <div class="user">
        <div class="user__header">
            <img class="user__img" src="{{ $user->image }}"/>
        </div>
        <div class="user__body">
            <a href="/user/{{ $user->id }}" class="user__name">{{ $user->name }}</a>
        </div>

    </div>
@endforeach
