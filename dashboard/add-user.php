<?php
// include "../models/RoomType.php";
include "../models/User.php";
include "../controllers/UserController.php";
$controller = new UserController();
$added = $controller->add_user();
// $user_types = new UserType();



include "../includes/dashboard/header.php";
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add user
    </h2>
    <?php
    if ($added === true) {
    ?>
      <div class="py-2 px-4 bg-green-200 text-green-600">User has been added!</div>
    <?php
    } else if ($added === false) {
    } else {

    ?>
      <div class="py-2 px-4 bg-red-200 text-red-600">
        <?php
        echo nl2br($added);
        ?>
      </div>
    <?php
    }
    ?>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($user)) {
        ?>
          <input type="hidden" name="id" value="<?= $user["id"]; ?>">
        <?php
        }
        ?>

<label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">image</span>
          <input accept=".jpg,.png,.jpeg" name="image" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name</span>
          <input name="name" value="<?= (isset($user)) ? $user["name"] : ""; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" />
        </label>
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Email</span>
          <input value="<?= (isset($user)) ? $user["email"] : ""; ?>" name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">National ID</span>
          <input accept=".jpg,.png,.jpeg" name="national_id" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

       
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
          <input value="<?= (isset($user)) ? $user["birth_date"] : ""; ?>" name="birth_date" type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
        </label>

        <button type="submit" name="submit" class="py-2 px-4 rounded-lg bg-purple-500 hover:bg-purple-600 active:bg-purple-500 text-white mt-4">Save <i class="las la-arrow-right"></i></button>
    </div>
    </form>
  </div>
</main>
</div>
</div>
</body>

</html>