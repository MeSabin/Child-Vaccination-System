<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    .spinner {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      border: 3px solid lightgrey;
      border-top-color: rgb(253, 253, 253);
      border-top-color: rgb(253, 253, 253);
      animation: spin 0.6s linear ;
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 100;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2); 
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="spinner"></div>
</body>
</html>
