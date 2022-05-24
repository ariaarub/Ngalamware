<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        <style>
            * {
                box-sizing: border-box;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            
            .column {
            float: left;
            padding: 10px;
            height: 430px;
            }
            
            .left {
            width: 25%;
            }

            .right {
                width: 50%;
            }
            
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            .detail {
                margin: 1em 0 2em 0;
                font-size: 15px;
            }
            

            li {
                list-style: none;
                float: left;
                margin: 1em 0;
            }

            .button {
                float: left;
                margin: 7em 2em 2em 0;
            }

            .btn{
            font-family: sans-serif;   
            font-size: 15px;   
            background: rgb(196, 196, 196); 
            color: rgb(0, 0, 0); 
            border: 0.2rem solid rgb(196, 196, 196); 
            border-radius: 0.5rem; 
            padding: 0.5rem 1.5rem; 
            margin-top: 1rem;
            text-decoration: none;
        }

        .mr-2 {
            margin-right: 2em;
        }

        .btn:hover{
            opacity: 0.8;
        }
        </style>
    </head>
    <body>
        <h2>Product</h2>
        <div class="container">
            <form action="product/modify" method="post">
                <div class="row">
                    <div class="column left">
                        <div class="image">
                            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fid.m.wikipedia.org%2Fwiki%2FBerkas%3APhotoshop_CC_icon.png&psig=AOvVaw3erO3_kFXCLdEdX55MIX0k&ust=1653452443494000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCNDxob-k9_cCFQAAAAAdAAAAABAD" height="400" width="300">
                        </div>
                    </div>
                    <div class="column right">
                        <div class="detail">
                            <li class="name">{{ $prod->name }}</li><br>
                            <li class="description">{{ $prod->description }}</li><br>
                            <li class="price">{{ $prod->price }}</li><br><br><br><br>
                        </div>
                        <div class="button">
                            <li><a href="product/delete/{{$prod->id}}" class="btn mr-2">Delete product</a></li>
                            <li><a href="product/edit/{{$prod->id}}" class="btn mr-2">Edit product</a></li>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @empty
        <h2>It's empty</h2>

        @endforelse
        <a href="{{ route('product.add') }}" class="btn mr-2" method="post">Add Product</a>
        
    </body>
</html>
