<div id="boxes">

@for($i=1; $i<=10; $i++)
    <div class="box">

        <div class="box-header">
            <a href="#">他们的文字中，体会到自己的人生</a>
        </div>

        <div class="box-divider"></div>

        <div class="box-body">
            <p>有很长一段时间对文字有着特殊的感觉，就是特以做客类的App，旨在可以去关注自己喜欢的一些作者。从他们的文字中，体会到自己的人生。</p>
            <p>有很长一段时间去关注自己喜欢的一些作者。从他们的文字中，体会到自己的人生。</p>
        </div>

        <div class="box-footer">
            <div class="box-meta-container">
                <span class="box-meta">
                    <i class="fa fa-tags"></i>&nbsp;标签：
                    <span class="label label-badge label-primary">Primary</span>
                    <span class="label label-badge label-success">Success</span>
                    <span class="label label-badge label-info">Info</span>
                    <span class="label label-badge" style="font-weight:bold;">&middot;&middot;&middot;</span>
                </span>
                <span class="box-meta"><i class="fa fa-eye"></i>&nbsp;浏览：56</span>
                <span class="box-meta"><i class="fa fa-clock-o"></i>&nbsp;发表：三天前</span>
            </div>
            <div class="box-view-btn-container">
                <a href="#" class="btn btn-primary btn-md"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
            </div>
        </div>

    </div>
@endfor
</div>
