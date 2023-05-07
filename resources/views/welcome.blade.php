<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WA Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row mt-4">
        <div class="col-md-8 mx-auto">

            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <h3 class="">Whats App Cloud API Message</h3>
            <div class="card">

                <div class="card-body">

                    <form action="/message-send" method="get">

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="8801717849968" value="8801717849968">
                        </div>

                        <div class="mb-3">
                            <label for="Type" class="form-label">Type</label>
                            <select class="form-select" name="type">
                                <option value="1">Template</option>
                                <option value="2" selected>Custom</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                        </div>


                        <div class="mb-3">

                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>


    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
