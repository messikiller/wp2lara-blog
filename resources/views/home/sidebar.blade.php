<div id="sidebar">

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-bookmark"></i>&nbsp;微语
        </div>
        <div class="sidebar-box-divider"><div class="left"></div><div class="right"></div></div>
        <div class="siderbar-box-content">

        </div>
    </div>

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-tags"></i>&nbsp;标签云
        </div>
        <div class="sidebar-box-divider"><div class="left"></div><div class="right"></div></div>
        <div class="siderbar-box-content">

            <!-- <a href="#" class="btn-tag">mysql</a>
            <a href="#" class="btn-tag">mysql</a>
            <a href="#" class="btn-tag">缓存</a>
            <a href="#" class="btn-tag">反射API</a>
            <a href="#" class="btn-tag">反射API</a>
            <a href="#" class="btn-tag">mysql</a>
            <a href="#" class="btn-tag">缓存</a>
            <a href="#" class="btn-tag">反射API</a> -->
            @foreach($sidebarTags as $tag)
            <a href="#" class="btn-tag" style="color:{{ $tag['color'] }};border-color:{{ $tag['color'] }};" onmouseover="this.style.cssText='color:#ffffff;background-color:{{ $tag['color'] }};'" onmouseout="this.style.cssText='color:{{ $tag['color'] }};background-color:#ffffff;'">{{ $tag['name'] }}</a>
            @endforeach
        </div>
    </div>

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-list-ul"></i>&nbsp;文章分类
        </div>
        <div class="sidebar-box-divider"><div class="left"></div><div class="right"></div></div>
        <div class="siderbar-box-content">

        </div>
    </div>

    <div class="sidebar-box">
        <div class="sidebar-box-title">
            <i class="fa fa-folder-open"></i>&nbsp;文章归档
        </div>
        <div class="sidebar-box-divider"><div class="left"></div><div class="right"></div></div>
        <div class="siderbar-box-content">

        </div>
    </div>

</div>
