<html>
    <head>
        <title>聯絡通知信件</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h3>Hi! {{ $company->name }}</h3>
        <p>有廠商來信詢問您，請<a href="{{ url('/company/contact/edit', [$params['contactId']] ) }}">前往</a>查看</p>
        <textarea style="width: 100%;height: 150px;" readonly>{{ $params['content'] }} </textarea>
    </body>
</html>
