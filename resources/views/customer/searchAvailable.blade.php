<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Phòng</title>
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
        }

        p {
            margin: 0 0 10px 0;
        }

        .button-dat {
            height: 40px;
            border-radius: 5px;
            top: 70px;
            right: 10px;
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

        .room-info {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
        }

        .room-info img {
            width: 300px;
            height: 100%;
            border-radius: 8px;
            margin-right: 10px;
        }

        .no-result-message {
            color: red;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
            <div>
           
                    @if($availableRooms->isNotEmpty())
                        <h3>Hotel Information</h3>
                        <p><strong>Name:</strong> {{ $hotel->Hotel_Name }}</p>
                        <p><strong>Address:</strong> {{ $hotel->Hotel_Address }}</p>

                        @foreach($availableRooms as $room)
                            <div class="room-info">
                                <p>
                                    @if ($room->Image)
                                        <img src="{{ asset('storage/Room_Images/' . $room->Image) }}">
                                    @else
                                        <div style="height: 150px; background-color: #f9f9f9; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                            No Image
                                        </div>
                                    @endif
                                </p>
                                <div>
                                    <p><strong>Number:</strong> {{ $room->Number }}</p>
                                    <p><strong>Status:</strong> {{ $room->Status }} </p>
                                    <p><strong>Describe:</strong> {{ $room->Describe }}</p>
                                    <p><strong>Price:</strong> {{ $room->Price }}</p>
                                    <a href="{{ route('showBookingForm', ['id' => $room->Room_ID]) }}"><button class="button-dat">Đặt phòng</button></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @else
            <p class="no-result-message">không tìm thấy phòng !!!</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
