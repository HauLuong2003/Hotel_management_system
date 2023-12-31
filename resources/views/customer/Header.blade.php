<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <style>
        .nav-link {
            margin-left: 60px;
        }

        .navbar-nav {
            margin-left: auto;
            position: sticky;
        }

        .collapse {
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            height: 100px;
        }

        .navbar-brand img {
            height: 100px;
            width: auto;
        }

        .search-rCu {
            width: 50px;
            height: 50px;
        }

        .nav-item.active .nav-link {
            color: black;
            font-size: 25px;
        }
        .nav-item .nav-link {
            color: black;
            font-size: 25px;
        }
        .search-input {
            border-radius: 5px;
            border: 1px solid black;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
        <title>header</title>
    </head>
    <body>
        <header>
            <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body">
              <div class="container-fluid">

                <button
                  data-mdb-collapse-init
                  class="navbar-toggler"
                  type="button"
                  data-mdb-target="#navbarExample01"
                  aria-controls="navbarExample01"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01" >
                    <a class="navbar-brand">
                        <img src="https://img.freepik.com/premium-vector/hotel-logo-simple-illustration_434503-736.jpg?w=2000" alt="Logo" >
                    </a>
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item active">
                          
                            <a class="nav-link" aria-current="page">Xin chào, {{ Auth::user()->name }}!!</a>
                        </li>
                    @endauth
                    <li class="nav-item active">
                      <a class="nav-link" aria-current="page" href="/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dịch vụ</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    
                 
                    @auth
                    @if (Auth::user()->Roles_ID == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Đăng xuất</a>
                        </li>
                    @elseif (Auth::user()->Roles_ID == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Đăng xuất</a>
                        </li>
                        @endif
                       
                  </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="/dangnhap">Đăng nhập</a>
              </li>
            
                @endauth
                    <li class="nav-item">
                        <div class="input-group">
                            <img id="search-icon" class="search-rCu" src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Search_Icon.svg"/>
                        </div>
                    </li>

                  </ul>
                </div>
              </div>
            </nav>

            <div>
            <form id="searchForm">
                <input type="text" class="form-control search-input d-none" placeholder="Tìm Khách Sạn" id="searchInput">
            </form>
            </div>
            <br>
            <div
              class="p-5 text-center bg-image"
              style="
                background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
                height: 300px;
              "
            >
              <div class="mask">
                <div class="d-flex justify-content-center align-items-center h-100">
                  <div class="text-white">
                    <h1 class="mb-3">No1 Hotel</h1>
                    <h4 class="mb-3">Enjoy your trip </h4>
                    
                    
                  </div>
                </div>
              </div>
            </div>

          </header>    
            </script>
        </body>
    </html>
