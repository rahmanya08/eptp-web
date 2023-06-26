<div class="upload">
    @if ($user->user_identity && $user->user_identity->image)
        <img src="{{ asset('storage/images/users/'.$user->user_identity->image) }}">    
    @else
        <img src="{{ asset('img/nopic.png') }}" alt="" id="profile">
    @endif 
    <div class="round">
    @if ($user->user_identity && $user->user_identity->image)
        <input type="file" name="image" id="file" value="{{ $user->user_identity->image }}" accept="image/jpg,image/png,image/jpeg" />
        <i class='bx bxs-camera' style="color: #fff"></i>
    @else
        <input type="file" name="image" id="file" value="{{ old('image') }}" accept="image/jpg,image/png,image/jpeg" />
        <i class='bx bxs-camera' style="color: #fff"></i>
    @endif 
    </div>
</div>
