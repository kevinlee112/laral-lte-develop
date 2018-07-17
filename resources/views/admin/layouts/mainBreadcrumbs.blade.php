<section class="content-header">
    <?php $comData=Request::get('comData_menu'); ?>
    <h1>
        @foreach($comData['top'] as $v)
            @if(in_array($v['id'],$comData['openarr']))
                {{$v['label']}}
                <small>{{$v['description']}}</small>
            @endif
        @endforeach

    </h1>
    <ol class="breadcrumb">
        @if(Request::is('admin/index'))
            仪表盘
        @else
            {!! Breadcrumbs::render(Route::currentRouteName()) !!}
        @endif
    </ol>
</section>