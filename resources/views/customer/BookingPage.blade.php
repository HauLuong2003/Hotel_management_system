<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h3 {
            color: #007bff;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .booking-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .button-dat {
            height: 40px;
            border-radius: 5px;
            color: #fff;
            background-color: black;
            box-shadow: 2px 2px 25px -7px grey;
            cursor: pointer;
            transition: transform 0.3s ease;

            &:hover {
                background-color: #333;
            }

            &:active {
                transform: scale(0.97);
            }
        }
        .button-back{
            margin-top: 20px;
            margin-right: 120px;
            color: #fff;
            height: 40px;
            background-color: black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(isset($room))
            <h3>Đặt Phòng</h3>
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            <div class="room-info">
                <p><strong>Mã Phòng:</strong> {{ $room->Room_ID }}</p>
                <form action="{{ route('createBooking', ['id' => $room->Room_ID]) }}" method="post" class="booking-form">
                    @csrf
                          <div class="form-group">
                         <div class="form-group">
                           <label for="cus_id"><strong>Price:</strong></label>
							<input type="text" id="Price" name="Price" class="form-control" value="" readonly required>
                           <input type="hidden" id="tong" name="tong" class="form-control" value="{{$room->Price}}" readonly required>
                    <div class="form-group">
                        <label for="cus_id">Tên Khách Hàng:</label>
                         <input type="text" id="name" name="name" class="form-control" value=" {{ Auth::user()->name }}" readonly required>   </div>
                             
                        <input type="hidden" id="cus_id" name="cus_id" class="form-control" value="{{ session('user_id') }}" readonly required>   </div>

                    <div class="form-group">
                        <label for="checkin_date">Ngày Nhận Phòng:</label>
                        <input type="date" id="checkin_date" name="checkin_date" onchange="tinhtong()" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="checkout_date">Ngày Trả Phòng:</label>
                        <input type="date" id="checkout_date" name="checkout_date" onchange="tinhtong()" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary button-dat">Xác Nhận Đặt Phòng</button>
                </form>
            </div>
        @else
            <p class="no-result-message">Không tìm thấy thông tin phòng!!!</p>
        @endif
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('home') }}">
            <button class="button-back">Trở về trang chủ</button>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function tinhtong() {
            var gia = document.getElementById('tong').value;
            var ngaycheckin = document.getElementById('checkin_date').value;
            var ngaycheckout = document.getElementById('checkout_date').value;

            if(ngaycheckin == "" || ngaycheckout ==""){
                document.getElementById('Price').value = "";
            }else{
            var ngaydat = new Date(ngaycheckin);
            var ngaytra = new Date(ngaycheckout);

            var songay = Math.floor((ngaytra - ngaydat) / (1000 * 60 * 60 * 24));

            var tongtien = songay * gia;

            document.getElementById('Price').value = tongtien;
            }
        }
    </script>
</html>
