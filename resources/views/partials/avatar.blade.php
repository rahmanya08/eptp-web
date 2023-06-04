<div class="profile">
    @foreach ($identities as $identity)
        @if ($identity->image != null)
            <img src="{{ asset('storage/images/users/'.$identity->image) }}">
        @else
            <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
        @endif
@endforeach
</div>