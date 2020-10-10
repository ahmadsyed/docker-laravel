<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div class="container">
            <div class="content">
            <h3>Providers</h3>
            <table border= '1px solid black'>
                <tr>
                    <th>Name</th>
                    <th>Rules</th>
                </tr>
                <tbody>
                @foreach($providers as $provider)
                    <tr>
                        <td>{{$provider->name}}</td>
                        <td>{{$provider->description}}</td>
                    </tr>
                    
                @endforeach
                </tbody>
            </table>
                <h3>File Upload</h3>
                <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
                <label>Select Provider:</label>
                    <select name='provider_id' id='provider_id'>
                        <option value=1>Google</option>
                        <option value=2>Snapchat</option>
                    </select>
                    @if($errors->has('provider_id'))
                        <p style="color:red">{{ $errors->first('provider_id')}} </p>
                    @endif
                    </br>
                    <label>File name:</label> <!-- can be taken from uploaded file also -->
                    <input type="text" name="name" id="name" required>
                    @if($errors->has('name'))
                    <p style="color:red">{{ $errors->first('name')}} </p>
                    @endif
                    </br>
                    <label>Select image to upload:</label>
                    <input type="file" name="file" id="file" required>
                    @if($errors->has('file'))
                    <p style="color:red">{{ $errors->first('file')}} </p>
                    @endif
                    </br>
                    <input type="submit" value="Upload" name="submit">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </form>
                <h3>Uploads</h3>
                <table border= '1px solid black'>
                <tr>
                    <th>Name</th>
                    <th>path</th>
                    <th>Provider</th>
                </tr>
                @foreach($medias as $media)
                    <tr>
                        <td>{{$media->name}}</td>
                        <td>{{$media->path}}</td>
                        <td>{{$media->provider->name}}</td>
                    </tr>
                @endforeach
            </table>
            </div>
        </div>
    </body>
</html>