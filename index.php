
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Image 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        font-family: sans-serif;
        background-color: #eeeeee;
    }
    
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }
    
    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }
    
    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }
    
    .file-upload-content {
        display: none;
        text-align: center;
    }
    
    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }
    
    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
    }
    
    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }
    
    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }
    
    .drag-text {
        text-align: center;
    }
    
    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }
    
    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }
    
    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }
    
    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }
    
    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>

<body>    
    <form id="formAjax" action="" method="POST" enctype="multipart/form-data">
        <!-- ****************** -->

        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <div class="file-upload ">

            <div class="image-upload-wrap">
                <input class="file-upload-input" name="fileAjax" id="fileAjax" type='file' onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                    <h5>Drag and drop a file or select add Image</h5>
                </div>
            </div>
            <div class="file-upload-content ">
                <div class="row">
                    <div class="col-4">
                        <img class="file-upload-image" src="#" alt="your image" />
                    </div>
                    <div class="col-4">
                        <div style="position: absolute;bottom: calc(50% - 30px)">
                            <span class="image-title">Uploaded Image</span>
                            <div class="progress">

                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    100%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div style="position: absolute;bottom: calc(50% - 17px);">
                            <div class="btn-group">
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Upload" />

                                <button type="button" onclick="removeUpload()" class="btn btn-danger">Remove </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- ******** -->
    </form>
    <p id="status"></p>
    <script type="text/javascript" src="/imageUpload.js"></script>
</body>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {


                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>

</html>
<?php
    // $currentDir = getcwd();
    $uploadDirectory = "uploads/";

    // Store all errors
    $errors = [];

    // Available file extensions
    $fileExtensions = ['jpeg','jpg','png','gif'];

   if(!empty($_FILES['fileAjax'] ?? null)) {
        $fileName = $_FILES['fileAjax']['name'];
        $fileTmpName  = $_FILES['fileAjax']['tmp_name'];
        $fileType = $_FILES['fileAjax']['type'];
        $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        $uploadPath = $uploadDirectory . basename($fileName); 

        if (isset($fileName)) {
            if (! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "JPEG, JPG, PNG and GIF images are only supported";
            }
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                if ($didUpload) {
                    echo "The image " . basename($fileName) . " has been uploaded.";
                } else {
                    echo "An error occurred while uploading. Try again.";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "The following error occured: " . "\n";
                }
            }
        }
    }
?>