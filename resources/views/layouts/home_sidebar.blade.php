<div id="sidebar">

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-bookmark"></i>&nbsp;微语
        </div>
        <div class="sidebar-box-divider"></div>
        <div class="siderbar-box-content">
            <div class="sidebar-box-motto">
                {{ $blogInfo['sidebar_motto'] }}
            </div>
            <div class="sidebar-box-submotto">{{ $blogInfo['sidebar_motto_sub'] }}</div>
        </div>
    </div>

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-list-ul"></i>&nbsp;文章分类
            <a href="javascript:;" class="btn btn-default btn-xs btn-sidebox-toggle pull-right" style="border-radius: 1px;color: #555;"><i class="fa fa fa-angle-down fa-xs"></i></a>
        </div>
        <div class="sidebar-box-divider"></div>
        <div class="siderbar-box-content">

            @foreach ($sidebarCates as $cate)
            <div>
                <a href="{{ url('articles/cate/'.$cate['Id']) }}" class="sidebar-cate-item">
                    <i class="fa fa-angle-double-right"></i>&nbsp;
                    {{ $cate['name'] }}
                    ({{ $cate['articles_count'] }})
                </a>
            </div>
            @endforeach

        </div>
    </div>

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-folder-open"></i>&nbsp;文章归档
            <a href="javascript:;" class="btn btn-default btn-xs btn-sidebox-toggle pull-right" style="border-radius: 1px;color: #555;"><i class="fa fa fa-angle-down fa-xs"></i></a>
        </div>
        <div class="sidebar-box-divider"></div>
        <div class="siderbar-box-content">

            @foreach ($sidebarArchives as $archive_time => $archive)
            <div>
                <a href="{{ url('articles/archive/'.$archive_time) }}" class="sidebar-archive-item">
                    <i class="fa fa-calendar"></i>&nbsp;
                    {{ date('Y年m月', $archive_time) }}({{ count($archive) }})
                </a>
            </div>
            @endforeach

        </div>
    </div>
<!-- btn btn-default btn-xs -->
    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-tags"></i>&nbsp;标签云
            <a href="javascript:;" class="btn btn-default btn-xs btn-sidebox-toggle pull-right" style="border-radius: 1px;color: #555;"><i class="fa fa fa-angle-down fa-xs"></i></a>
        </div>
        <div class="sidebar-box-divider"></div>
        <div class="siderbar-box-content">

            @foreach($sidebarTags as $tag)

                <a href="/articles/tag/{{ $tag['Id'] }}" class="btn-tag"
                    style="color:{{ $tag['color'] }};background-color:#ffffff;border-color:{{ $tag['color'] }};"
                    onmouseover="this.style.cssText='color:#ffffff;background-color:{{ $tag['color'] }};border-color: {{ $tag['color'] }};'"
                    onmouseout="this.style.cssText='color:{{ $tag['color'] }};background-color:#ffffff;border-color:{{ $tag['color'] }};border-color:{{ $tag['color'] }};'"
                >
                    {{ $tag['name'] }}
                </a>

            @endforeach

        </div>
    </div>

</div>
