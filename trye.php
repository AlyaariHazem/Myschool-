<!DOCTYPE html>
<html>
<head>
    <title>Choose Photo</title>
    <style>
        .custom-file-input {
            visibility: hidden;
            width: 0;
            height: 0;
        }

        .custom-file-label {
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .custom-file-label::after {
            content: 'Choose Photo';
        }

        .custom-file-input:focus ~ .custom-file-label {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="photo" name="photo">
        <label class="custom-file-label" for="photo">Choose Photo</label>
    </div>
</body>
</html>