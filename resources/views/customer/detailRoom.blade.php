<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Room</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
    }

    section {
      padding: 20px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .room {
      border: 1px solid #ddd;
      padding: 15px;
      margin: 10px;
      border-radius: 5px;
      background-color: #fff;
      max-width: 300px; /* Giảm độ rộng tối đa của phòng */
      width: 500%;
    }
/* 
    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
      position: absolute;
      bottom: 0;
      width: 100%;
    } */
    .room img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <header>
    <h1>Detail Room </h1>
  </header>
  @include('customer.Header')

    
  <section>
    <div class="card">
        <div class="photo-container">        
        @if ($room)
    <!-- Kiểm tra xem thuộc tính 'image' có tồn tại -->
    @if ($room->image)
        <img src="  {{ asset('storage/app/'. $room->image) }}" alt="Room Image">    
    @endif
@endif

        </div>
@if ($room)
    <h1>Phòng {{ $room->Number }}</h1>
       <p class="type">Giá: {{ $room->Price }}$</p>
        <p>Status: {{ $room->Status }}</p>
        <p>Quantity: {{ $room->Quantity }}</p>
        <div class="variant">
            <h3>Describe :</h3>
            <p>{{ $room->Describe }}</p>
         <a href="{{ url('/home/booking/'. $room->Room_ID)}}">
            <button class="buy--btn">Đặt phòng</button>
        </a>
          @endif 
    </div>
  </section>

  <footer>
    @include('customer.Footer')
  </footer>
</body>
</html>
