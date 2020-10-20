<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo thanh toán Onepay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="pt-4"></div>
    <div class="container">
        <h1>Demo thanh toán Onepay</h1>
        <p class="text-muted">Link action - route('web.onepay') == {{ route('app.onepay') }}, method="POST"</p>
        <form action="{{ route('app.onepay') }}" method="POST" class="form">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="">Họ và tên (<span class="text-primary">name</span>)</label>
                        <input type="text" name="name" class="form-control" value="Onepay Guy">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ email (<span class="text-primary">email</span>)</label>
                        <input type="text" name="email" class="form-control" value="onepay@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="">Số điện thoại (<span class="text-primary">phone</span>)</label>
                        <input type="text" name="phone" value="0987456321" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Tỉnh thành phố (<span class="text-primary">province</span>)</label>
                        <input type="text"  name="province" class="form-control" value="Hà Nội">
                    </div>

                    <div class="form-group">
                        <label for="">Quận huyện (<span class="text-primary">district</span>)</label>
                        <input type="text"  name="district" class="form-control" value="Hà Đông">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ (<span class="text-primary">address</span>)</label>
                        <input type="text"  name="address" class="form-control" value="Vincom Hà Đông">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="">Mã đơn hàng (<span class="text-primary">order_id</span>) </label>
                        <input type="text" name="order_id" class="form-control" value="securedemocode">
                    </div>
                    <div class="form-group">
                        <label for="">Tổng tiền (<span class="text-primary">amount</span>)</label>
                        <input type="number" name="amount" value="3000000" class="form-control">
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Thẻ</th>
                                <th>Mã thẻ</th>
                                <th>Ngày</th>
                                <th>OTP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ABB_ATM</td>
                                <td>9704250000000001</td>
                                <td>01/13</td>
                                <td>123456</td>
                            </tr>
                            <tr>
                                <td>Visa</td>
                                <td>4000000000000002</td>
                                <td>05/2021</td>
                                <td>123</td>
                            </tr>

                            <tr>
                                <td>Master</td>
                                <td>5313581000123430</td>
                                <td>05/2021</td>
                                <td>123</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <button class="btn float-right btn-primary">Submit</button>
        </form>
    </div>

    <div class="mt-4"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>