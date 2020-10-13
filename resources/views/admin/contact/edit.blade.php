<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/admin/body.css' rel='stylesheet' />
    </head>
    <body>
@include('admin.layout.menu')
        <div class="content">
            <h3>聯絡我們 - 編輯</h3>
            @if($result['result'] == false) 
            {{ $result['msg'] }}
            @else
            <form method='post' action='/admin/contact/update/{{ $result['contact']->id }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5>名稱</h5>
                <p> {{ $result['contact']->name }} </p>
                <h5>E-mail</h5>
                <p> {{ $result['contact']->email }} </p>
                <h5>手機</h5>
                <p> {{ $result['contact']->phone }} </p>
                <h5>內容</h5>
                <p> 
                    <textarea type="text" name="content" readonly> {{ $result['contact']->content }} </textarea>
                </p>
                <h5>處理狀態</h5>
                <p> 
                    <select type="text" name="active"> 
                        <option value="未處理" {{ $result['contact']->active == '未處理' ? 'selected="selected"' : '' }} >未處理</option>
                        <option value="處理中" {{ $result['contact']->active == '處理中' ? 'selected="selected"' : '' }} >處理中</option>
                        <option value="已處理" {{ $result['contact']->active == '已處理' ? 'selected="selected"' : '' }} >已處理</option>
                    </select> 
                </p>
                <p class=""> <button class="btn">編輯</button> </p>
            </form>

            @endif
        </div>
@include('admin.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/lib/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="/lib/jquery-validation/dist/localization/messages_zh_TW.min.js"></script>
    <script src="/js/admin/left.js"></script>
    <script src="/js/admin/contact/edit.js"></script>
</html>
