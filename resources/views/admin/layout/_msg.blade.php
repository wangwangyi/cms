@if (session('msg'))
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert">
                {{ session('msg') }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="am-g">
        <div class="am-u-md-12">
            <div class="am-alert am-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif