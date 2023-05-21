<div class="container mt-4">
    <div class="row ui-sortable">
        @foreach($apps as $app)
            <div class="col-12 col-sm-6 col-md-3 ui-sortable-handle">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><img src="{{ $app->icon }}" alt=""></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $app->name }}</span>
                        <span class="info-box-number">
                            <a href="{{ $app->url }}" target="_blank"><i class="fas fa-folder-open"></i></a>&nbsp;
                            <a href="#" wire:click="$emit('openModal', 'modal.userauth-model', {{ json_encode([$apps]) }})"><i class="fas fa-eye"></i></a></span>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
