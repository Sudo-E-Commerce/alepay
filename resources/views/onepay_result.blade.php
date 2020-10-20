<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kết quả Onepay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="pt-4"></div>
    <div class="container">
        <h1>Kết quả trả về từ Onepay</h1>
        <p>Mọi thông tin đều có hết trên URL. 👌</p>
        <table class="table">
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $item }} @if ($item == "Approved")
                        <b class="text-success">Thanh toán thành công</b>
                    @endif</td>
                </tr>
            @endforeach

            <b>vpc_Message == <span class="text-success">Approved</span> => Thanh toán thành công, còn lại là lỗi hết.</b>
            <p>Danh sách lỗi tham khảo tài liệu. Tài liệu có thể tìm kiếm trên mạng với từ khóa: <i> 'hướng dẫn tích hợp thanh toán onepay'</i></p>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>