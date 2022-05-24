<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html{
            font-size: 62.5%;
        }

        body{
            background-color: lightgray;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            line-height: 1.5;
            display: flex;
            height: 100vh;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .wrapper{
            background: #fff;
            width: 30%;
            padding: 2rem;
            box-shadow: 0 0px 2.2px rgba(0, 0, 0, 0.028), 0 0px 5.3px rgba(0, 0, 0, 0.04), 0 0px 10px rgba(0, 0, 0, 0.05);
        }

        h2{
            font-size: 20px;
            color: black;
            letter-spacing: 0.1rem;
            padding: 1rem;
            cursor: default;
            text-align: center;
        }

        form, input, textarea, button{
            font-family: inherit;
            font-size: initial;
        }

        .form-group label{
            display: block;
            margin: 2rem 0 0 0;
        }

        .form-group input[type="text"], .form-group textarea{
            width: 100%;
            padding: 0 0.8rem;
            border: 1px solid black;
            outline: 0;
            transition: border 0.15s;
        }

        .form-group input[type="text"],\ {
            height: 4.6rem;

        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="file"] {
            width: 100%;
            padding: 0 0.8rem;
            margin-bottom: 2rem;
            outline: 0;
            transition: border 0.15s;
        }

        .submit{
            background-color: black;
            color: white;
            font-weight: bold;
            margin-top: 4rem;
            padding: 1rem 1.5rem;
            border: none;
            cursor: pointer;
        }

        .submit:hover{
            background-color: rgb(185, 185, 185);
            color: black;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Edit Product</h2>
        <form method="POST" action="/added" enctype="multipart/form-data">
            @csrf
        
            <input type="hidden" name="id" value="{{$products->id}}">
            
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Product name" required value="{{$products->name}}">
            </div>
            <div class="form-group">
                <label >Description</label>
                <textarea name="description" id="description" rows="5" required>{{$products->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="Price" required value="{{$products->price}}">
            </div>
            <div class="form-group">
                <button type="submit" class="submit">Submit</button>
            </div>
            
        </form>
    </div>
</body>
</html>
