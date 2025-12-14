<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="/build/assets/app.css">
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm bg-gray-800 p-6 rounded shadow">
        <h1 class="text-xl font-semibold mb-4">Login Admin</h1>
        <form method="POST" action="/admin/login" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block mb-1">Email</label>
                <input name="email" type="text" class="w-full px-3 py-2 rounded bg-gray-700 text-white" required>
            </div>
            <div>
                <label class="block mb-1">Password</label>
                <input name="password" type="password" class="w-full px-3 py-2 rounded bg-gray-700 text-white" required>
            </div>
            <?php if($errors->any()): ?>
            <div class="text-red-400 text-sm">
                <?php echo e($errors->first()); ?>
            </div>
            <?php endif; ?>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded">Masuk</button>
        </form>
    </div>
</body>
</html>
