<?php
include "../models/RoomType.php";
include "../models/Room.php";
include "../controllers/RoomsController.php";
$controller = new RoomsController();
$room_added = $controller->add_room();
$room_types = new RoomType();

if (isset($_GET['id'])) {
  $room = Room::find($_GET['id']);
  $room = $room->data;
}

include "../includes/dashboard/header.php";
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add room
    </h2>
    <?php
    if ($room_added === true) {
    ?>
      <div class="py-2 px-4 bg-green-200 text-green-600">Room has been added!</div>
    <?php
    } else if ($room_added === false) {
    } else {

    ?>
      <div class="py-2 px-4 bg-red-200 text-red-600">
        <?php
        echo nl2br($room_added);
        ?>
      </div>
    <?php
    }
    ?>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($room)){
          ?>
        <input type="hidden" name="id" value="<?= $room["id"]; ?>">
          <?php
        }
        ?>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name</span>
          <input name="name" value="<?= (isset($room)) ? $room["name"] : ""; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" />
        </label>
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Room Number</span>
          <input value="<?= (isset($room)) ? $room["number"] : ""; ?>" name="number" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="100" />
        </label>
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Room Images</span>
          <input accept="image/*" name="image[]" multiple type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="100" />
        </label>
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Room Type</span>
          <select name="type_id" id="" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
            <?php
            if (!isset($room)) {
            ?>
              <option value="" disabled selected> Please Select an Option</option>
            <?php
            } ?>
            <?php
            foreach ($room_types->all() as $type) {
            ?>
              <option
              <?= (isset($room) && $room["room_type_id"] == $type["id"])?"selected":""; ?>
              value="<?php echo $type["id"] ?>"> <?php echo $type["name"] ?></option>
            <?php
            }
            ?>
          </select>
        </label>
        <label class="block text-sm mt-4">
          <span class="text-gray-700 dark:text-gray-400">Price per night</span>
          <input value="<?= (isset($room)) ? $room["price"] : ""; ?>" name="price" type="price" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="500" />
        </label>
        <label class="block text-sm mt-4">
          <input <?= (isset($room)) ? (($room["is_sea_view"] == 1) ? "checked" : "") : ""; ?> name="is_sea_view" type="checkbox" class="form-checkbox " />
          <span class="ml-2 text-gray-700 dark:text-gray-400">Is Sea View?</span>
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