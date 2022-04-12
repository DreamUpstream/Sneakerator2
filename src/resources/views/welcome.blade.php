<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakerator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="px-4 my-5 text-center">
        <img
            class="d-block mx-auto mb-4 col-6 col-md-4 col-lg-2 img-fluid"
            src="{{asset("storage/img/sneakerator_logo.png")}}"
            alt=""
        />
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Welcome to all-in-one sneaker reseller dashboard & selling
                advisor - quickly search and analyze your favorite sneaker
                models with our world’s most in depth online sneaker sales
                listing scraper and analyzer tool. Register now to gain access
                to our early beta platform!
            </p>
        </div>
        
        <a class="btn btn-success" href="{{route('register')}}">Register</a>
        <a  class="btn btn-primary" href="{{route('dashboard')}}">Login</a>
    </div>
    
    <div class="container px-4" id="icon-grid">
        <h2 class="pb-2 border-bottom">Features</h2>

        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5"
        >
            <div class="col d-flex align-items-start">
                <img class="col-2 mt-1 mx-3" src="{{asset("storage/img/dollar.svg")}}" alt="" />
                <div>
                    <h4 class="fw-bold mb-1">Find sales volume</h4>
                    <p>
                        Get current sneaker sales volume in the most popular
                        sneaker reselling sites by using our web scraper that
                        provides you with the real-time price lists.
                    </p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <img class="col-2 mx-3 mt-1" src="{{asset("storage/img/trend.svg")}}" alt="" />
                <div>
                    <h4 class="fw-bold mb-1">Analyze price trends</h4>
                    <p>
                        Receive latest sales graphs & data so you could decide
                        if you should invest in the sneaker faster.
                    </p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <img class="col-2 mx-3 mt-1" src="{{asset("storage/img/table.svg")}}" alt="" />
                <div>
                    <h4 class="fw-bold mb-1">Seller table</h4>
                    <p>
                        Never miss or forget anything with having all details of
                        your bought, incoming, selling, shipped out sneakers in
                        all-in-one seller dashboard.
                    </p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <img class="col-2 mx-3 mt-1" src="{{asset("storage/img/auction.svg")}}" alt="" />
                <div>
                    <h4 class="fw-bold mb-1">Auto-undercut</h4>
                    <p>
                        [Coming in final release] Our bot will automatically
                        undercut your sneaker prices in multiple selling
                        platforms.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>