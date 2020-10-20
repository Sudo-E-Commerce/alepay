<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo thanh toán Alepay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="pt-4"></div>
    <div class="container">
        <h1>Demo thanh toán Alepay</h1>
        <p class="text-muted">Link action - route('web.alepay') == {{ route('app.alepay') }}, method="POST"</p>
        <form action="{{ route('app.alepay') }}" method="POST" class="form">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="">Cancel URL (<span class="text-primary">cancelUrl</span>)</label>
                        <input type="text" name="cancelUrl" value="http://localhost:8000" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Giá trị đơn hàng (<span class="text-primary">amount</span>)</label>
                        <input type="number" name="amount" value="3000000" class="form-control">
                        <p class="text-muted">Thanh toán trả góp thì số tiền phải lớn hơn 3 triệu</p>
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả (<span class="text-primary">orderDescription</span>)</label>
                        <input type="text" name="orderDescription" value="Thanh toán qua Alepay" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Mã đơn hàng (<span class="text-primary">orderCode</span>)</label>
                        <input type="text" name="orderCode" class="form-control" value="123">
                    </div>

                    <div class="form-group">
                        <label for="">Tiền tệ (<span class="text-primary">currency</span>)</label>
                        <input type="text" class="form-control" name="currency" value="vnd">
                    </div>

                    <div class="form-group">
                        <label for="">Số lượng sản phẩm (<span class="text-primary">totalItem</span>)</label>
                        <input type="number" class="form-control" name="totalItem" value="2">
                    </div>

                    <div class="form-group">
                        <label for="">Kiểu thanh toán (<span class="text-primary">checkoutType</span>)</label>
                        <input type="number" class="form-control" name="checkoutType" value="1">

                        <p class="text-muted">0: Cho phép thanh toán ngay với thẻ quốc tế và</p>
                        <p class="text-muted">1: chỉ thanh toán ngay với thẻ quốc tế</p>
                        <p class="text-muted">2: Chỉ thanh toán trả góp</p>
                        <p class="text-muted">3: Thanh toán ngay với thẻ ATM, IB, QRCODE, thẻ quốc tế và thanh toán trả góp nếu thiết lập allowDomestic = true</p>
                        <p class="text-muted">4: Thanh toán ngay với thẻ ATM, IB, QRCODE, thẻ quốc tế nếu thiết lập allowDomestic = true</p>
                    </div>

                    <div class="form-group">
                        <label for="">Cho phép trả qua thẻ quốc tế (<span class="text-primary">allowDomestic</span>)</label>
                        <input type="text" class="form-control" name="allowDomestic" value="true">
                        <p class="text-muted">Với trường hợp trả góp, để giá trị <span class="text-danger">false</span></p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="">Họ và tên (<span class="text-primary">buyerName</span>)</label>
                        <input type="text" name="buyerName" value="Demo guy" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email (<span class="text-primary">buyerEmail</span>)</label>
                        <input type="text" name="buyerEmail" value="demoguy@gmail.com" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại (<span class="text-primary">buyerPhone</span>)</label>
                        <input type="text" name="buyerPhone" value="0987456321" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ (<span class="text-primary">buyerAddress</span>)</label>
                        <input type="text" name="buyerAddress" value="Km10, Đường Nguyễn Trãi, Q.Hà Đông, Hà Nội" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Thành phố (<span class="text-primary">buyerCity</span>)</label>
                        <input type="text" name="buyerCity" value="Hà Nội" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quốc gia (<span class="text-primary">buyerCountry</span>)</label>
                        <input type="text" name="buyerCountry" value="Việt Nam" class="form-control">
                    </div>


                    <div class="from-group">
                        <caption>Thẻ dùng cho test</caption>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Loại thẻ</th>
                                <th scope="col">Mã thẻ</th>
                                <th scope="col">Ngày hết hạn</th>
                                <th scope="col">CVV</th>
                              </tr>
                            </thead>

                                <tr>
                                    <td>Visa</td>
                                    <td>4111111111111111</td>
                                    <td>12/20</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>Visa 3D</td>
                                    <td>4444000000004404</td>
                                    <td>nt</td>
                                    <td>nt</td>
                                </tr>
                                <tr>
                                    <td>MasterCard</td>
                                    <td>5555555555554444</td>
                                    <td>nt</td>
                                    <td>nt</td>
                                </tr>
                                <tr>
                                    <td>JCB</td>
                                    <td>3566111111111113</td>
                                    <td>nt</td>
                                    <td>nt</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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