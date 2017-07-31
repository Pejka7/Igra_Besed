<!doctype html>
    <form action="/Igra_Besed/public/saveData" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Izberi datoteko:
        <br />
        <input type="file" name="files[]" required="required" multiple />
        <br />
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br />
        <input type="submit" value="Upload" />
    </form>



