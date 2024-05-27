<!DOCTYPE html>
<html>
<head>
    <title>New Issue Raised</title>
    <style>
        body {
            font-family: 'Roboto Serif', serif;
            font-weight: 600;
            font-style: normal;
        }
        .header-title {
            font-family: 'Cinzel Decorative', serif;
            font-weight: 900;
            font-style: normal;
            color: #AD9551;
            text-align: center;
        }
        .center-text {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="header-title text-5xl pb-4">
        Cysuite
    </h1>
    <p class="center-text font-semibold">
        New Issue Raised
    </p>
    <p>
        An issue has been raised with the following details:
    </p>
    <p>

        <span class="font-bold">
        Title:
        </span>{{ $issue->title }}
    </p>
    <p>
         <span class="font-bold">
         Description:
         </span>{{ $issue->description }}
    </p>
</body>
</html>
