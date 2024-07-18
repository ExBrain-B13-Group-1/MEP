<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Popup</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../lib/jquery-3.7.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="relative">
        <!-- Notification Icon -->
        <button id="notification-icon" class="p-4">
            <ion-icon name="notifications-outline"></ion-icon>
        </button>

        <!-- Notification Popup -->
        <div id="notification-popup" class="hidden absolute right-0 mt-2 w-96 bg-white border rounded-lg shadow-lg">
            <div class="p-4 border-b flex justify-between items-center">
                <div class="flex items-center">
                    <h3 class="text-lg font-bold flex items-center">
                        Notifications &nbsp;
                    </h3>
                    <div class="px-2 py-1 rounded-lg text-sm font-thin bg-black text-white">&nbsp;&nbsp;&nbsp;25&nbsp;&nbsp;&nbsp;</div>
                </div>
                <button class="text-sm text-blue-600 hover:underline">Mark all as read</button>
            </div>
            
            <div id="notification-list">
                <!-- Notifications will be dynamically added here -->
            </div>
            
            <div class="p-4 border-t text-center">
                <button class="text-sm text-blue-600 hover:underline">See More</button>
            </div>
        </div>
    </div>

    <script src="../js/notiPopup.js"></script>
</body>

</html>