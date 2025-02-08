<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); 
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .whitespace-normal {
            white-space: normal;
            word-wrap: break-word;
        }
        .max-w-xs {
            max-width: 20rem;
        }
    </style>
</head>
<body>
    <!--LOGIN-->
    
    <!--END LOGIN-->

    <!--HEADER-->
    <?php include "header.php" ?>
    <!--END HEADER-->

    <!--BADAN-->

 <div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:px-6">
            <h2 class="text-lg font-medium text-gray-900">Users</h2>
            <p class="mt-1 text-sm text-gray-500">A list of all the users in your account including their name, email, and bio.</p>
        </div>
        <div class="border-t border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    <?php
                    include 'service/database.php';
                    $sql = "SELECT id, first_name, last_name, email, bio, photo FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['id'] != 1) {
                            $fullName = $row['first_name'] . ' ' . $row['last_name'];
                            $photoPath = $row['photo'] ? $row['photo'] : 'https://via.placeholder.com/40';
                            echo "<tr>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='flex items-center'>
                                            <div class='flex-shrink-0 h-10 w-10'>
                                                <img class='h-10 w-10 rounded-full' src='$photoPath' alt='$fullName'>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <div class='text-sm font-medium text-gray-900'>$fullName</div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$row['email']}</td>
                                    <td class='px-6 py-4 whitespace-normal text-sm text-gray-500 max-w-xs'>{$row['bio']}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>
                                        <a href='edit_data.php?id={$row['id']}' class='text-indigo-600 hover:text-indigo-900'>Edit</a>
                                        <a href='delete_data.php?id={$row['id']}' class='ml-2 text-red-600 hover:text-red-900' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                    </td>
                                  </tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5' class='px-6 py-4 text-center'>Tidak ada data ditemukan.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="px-4 py-4 sm:px-6">
            <a href="tambah_data.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah Data
            </a>
        </div>
    </div>
    
    <!--END BADAN-->

    <!--FOOTER-->
    <?php include "tampilan/footer.html" ?>
    <!-- END FOOTER-->
</body>
</html>