<div class="account-info">
    <div class="account-info-actions">
        <button class="account-info-btn" type="button">
            <svg class="icon icon-edit ">
                <use xlink:href="{{asset("./images/sprite-inline.svg#edit")}}"></use>
            </svg>Редактировать профиль
        </button>
        <form action="{{route('profile.cover.store', auth()->user()->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <span class="account-info-btn">
                                <input accept=".jpg,.jpeg,.png" type="file" name="userCoverFile" onchange="this.form.submit()">
                                    <svg class="icon icon-image">
                                        <use xlink:href="{{asset("./images/sprite-inline.svg#image")}}"></use>
                                    </svg>Изменить обложку
                </input>
                            </span>
        </form>
    </div>
    <div class="account-info-cover">
        <img src="{{$cover}}" alt="cover image">
    </div>
    <div class="account-info-desc">
        <div class="account-info-avatar"></div>
        <div class="account-info-name">
            <p>{{$user->username}}</p>
            <div class="account-info-date">Играет с {{$user->created_at->format('d M Y')}}</div>
        </div>
    </div>
</div>
