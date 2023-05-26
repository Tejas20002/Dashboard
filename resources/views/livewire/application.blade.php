<div class="container mt-4">
    <div class="row ui-sortable">
        @foreach($apps as $app)
            <div class="col-12 col-sm-6 col-md-3 ui-sortable-handle">
                <div class="info-box">
                    <div class="cursor-pointer absolute top-0 right-0 p-1">
                        <a wire:click="$emit('openModal', 'modal.userauth-model', {{ json_encode([$apps]) }})"><i class="fas fa-edit"></i></a>
                    </div>
                    <span class="info-box-icon bg-info elevation-1" style="width: 70px; height: 68px"><img src="{{ $app->icon }}" alt=""></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $app->name }}</span>
                        <span class="info-box-number">
                            <a href="{{ $app->url }}" target="_blank"><i class="fas fa-folder-open"></i></a>&nbsp;
                            <a href="#" class="dropdown" id="menu-button" aria-expanded="false" aria-haspopup="false"><i class="fas fa-eye"></i></a>
                        </span>
                        <ul class="hidden relative right-0 z-10 mt-2 w-auto origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1" id="dropdown">
                            <li class="cursor-pointer text-gray-700 block px-4 py-2 text-sm" id="user">Username: <span id="user-val">{{ $app->app_user }}</span></li>
                            <li class="cursor-pointer text-gray-700 block px-4 py-2 text-sm" id="pass">Password: ***********<span class="hidden" id="pass-val">{{ $app->app_password }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
