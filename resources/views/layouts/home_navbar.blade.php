<div id="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <ul class="catebar">
                    <li
                        @if ($current_cate == 0)
                        class="active"
                        @endif
                    ><a href="{{ url('/') }}">home</a></li>
                    @foreach ($navbarCates as $cate)
                    <li
                        @if ($current_cate == $cate['Id'])
                        class="active"
                        @endif
                    >
                        <a href="/cate/{{ $cate['Id'] }}">

                            {{ $cate['name'] }}

                            @if (isset($cate['children']))
                                &nbsp;&nbsp;<i class="fa fa-angle-left"></i></a>
                                <ul class="children">
                                    @foreach ($cate['children'] as $child)
                                    <li><a href="/cate/{{ $child['Id'] }}">{{ $child['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                    </li>
                    @endforeach

                    @inject('request', 'Illuminate\Http\Request')
                    @if ($request->session()->has('user'))
                    <li>
                        <a href="{{ url('/admin') }}" class="admin-link">
                            <img src="{{ url($blogInfo['header_logo']) }}"
                                alt="{{ $request->session()->get('user')->username }}"
                                title="{{ $request->session()->get('user')->username }}"
                                class="img-circle"
                                style="width:30px;"
                            />
                            &nbsp;管理博客
                        </a>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
    </div>
</div>
