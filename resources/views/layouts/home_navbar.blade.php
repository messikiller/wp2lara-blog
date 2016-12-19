<div id="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <ul class="catebar">
                    <li
                        @if ($current_cate == 0)
                        class="active"
                        @endif
                    ><a href="#">home</a></li>
                    @foreach ($cates as $cate)
                    <li
                        @if ($current_cate == $cate['Id'])
                        class="active"
                        @endif
                    >
                        <a href="{{ $cate['Id'] }}">{{ $cate['name'] }}&nbsp;&nbsp;<i class="fa fa-angle-left"></i></a>
                        @if (isset($cate['children']))
                            <ul class="children">
                                @foreach ($cate['children'] as $child)
                                <li><a href="{{ $child['Id'] }}">{{ $child['name'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
