<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نصب محصول</title>

    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Vazirmatn", sans-serif;
            font-style: normal;
        }
    </style>

</head>

<body class="bg-neutral-200">

    <main class="mx-auto p-5">

        <h1 class=" text-lg mb-5 font-bold text-center">نصب اسکریپت</h1>

        <p class="mb-10 text-center">اسکریپت دارای نصب آسان میباشد، لطفا تمامی مراحل را تا تکمیل شدن نصب محصول پیش ببرید
        </p>

        {{ $slot }}

    </main>

    @livewireScripts
</body>

</html>
