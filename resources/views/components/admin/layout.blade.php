<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900 dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="h-full bg-gray-900">
    <div class="min-h-full h-full">
        <main class="pt-20">
            <x-admin.navbar />
            <x-admin.sidebar />
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>