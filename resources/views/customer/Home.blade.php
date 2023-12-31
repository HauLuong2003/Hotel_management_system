
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>hotel</title>
    <meta charset="utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width" />

    <style>
        body {
    display: flex;
    margin: 0;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.formforcheck {
    max-width: 500px;
    height: 100px;
    width: 100%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	margin: auto;
}
.item {
    display: inline-block;
    margin-right: 20px;
}
.check_Availability{
    display: flex;
    margin-left: 150px;
    margin-top: 16px;
}
.accomodation{
    padding-top: 100px;
	display: flex;
    align-items: center;
    justify-content: center;
color: #4F4F4F;
font-family: Arial, Helvetica, sans-serif;
}
.p-5.text-center.bg-image {
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
    background-size: cover;
	width: 100vw;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

.choose{
	display: flex;
    align-items: center;
    justify-content: center;
    color: #9E9E9E;
    font-family: Arial, Helvetica, sans-serif;
    padding-top: 10px;
    margin-left: 50px;

}
      

.product {
            display: grid;
            grid-template-columns: 1fr;
            margin: auto;
            padding: 2.5em 0;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .photo-container {
            display: grid;
            grid-template-rows: 1fr;
            width: 100%;
            height: auto;
            border-radius: 6px;
            box-shadow: 4px 4px 25px -2px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .photo-main {
            border-radius: 6px;
            background-color: none;
        }

        .photo-main img {
            width: 100%;
            height: auto;
        }

        .product__info {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1em 0;
            margin-top: 20px;
        }

        .title {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 10px;
           
        }

        .price {
            color: grey;
            font-size: 1.2em;
            margin: 0.5em 0;
        }

        .status {
            text-align: center;
            margin-top: 10px;
        }

        .Quantity {
            text-align: center;
            margin-top: 10px;
        }

        .variant {
            text-align: center;
            margin-top: 10px;
        }

        .variant h3 {
            font-size: 1.2em;
            margin-bottom: 5px;
        }

        .variant p {
            margin: 0;
        }

        .buy--btn {
            margin-top: 20px;
            padding: 1em 2em;
            border: none;
            border-radius: 7px;
            font-size: 1em;
            font-weight: 700;
            letter-spacing: 1.3px;
            color: #fff;
            background-color: grey;
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

.card-container {
            display: flex;
            justify-content: space-around; /* Để các card cách nhau một khoảng giống nhau */
            margin-left: -100px;
            flex-wrap: wrap;
        }

.card {
    display: inline-block;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin-left: 150px;
    margin-bottom: 50px;
    text-align: center;
    font-family: arial;
  }

  .type {
    color: grey;
    font-size: 22px;
  }

  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .card button:hover {
    opacity: 0.7;
  }

    </style>
     </head>
  <body>
    <home>
    @include('customer.Header')

        <div class="formforcheck">
            <form action="/searchRoom" method="GET">
                @csrf          

                <div class="item">
                    <label for="guests">Guests:</label>
                    <select id="guests" name="guests">
                        <option value="1">1 </option>
                        <option value="2">2 </option>
                        <option value="3">3 </option>
                        <option value="4">4 </option>      
                    </select>
                </div>
                <button class="check_Availability" type="submit" >Check Availability</button>
            </form>

        </div>
        <h1 class="accomodation">PHÒNG CHO THUÊ</h1>
   

    <div class="card-container">
        @foreach($rooms as $room)
        <div class="card">
            <div class="photo-container">
                <div class="photo-main">        
                    <img src="{{ Storage::url('app/'.$room->image) }}" alt="Room Image">                 
                </div>
            </div>
            <h4 class="card-title show_txt"><a href="{{url('detailRoom/'.$room->Room_ID)}}" title="View Room" style="text-decoration:none;color:black">Phòng số:{{$room->Number}}</a></h4>
            <p class="type">Giá: {{ $room->Price }}$</p>
            <p>Status: {{ $room->Status }}</p>
            <p>Quantity: {{ $room->Quantity }}</p>
            <div class="variant">
                <h3>Mô tả</h3>
                <p>{{ $room->Describe }}</p>
            </div>

             <a href="{{ route('showBookingForm',['id' => $room->Room_ID]) }}">
                <button class="buy--btn">Đặt phòng</button>
            </a>
        </div>
        @endforeach
    </div>

  @include('customer.Footer')

  </home>
  </body>
</html>
