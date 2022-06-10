<?php
$type = "receptionist";
if($type != "receptionist"){
    die('You are not authorized to view this page');
}
include "../models/Reservation.php";
$reservations = Reservation::all();
include "../includes/dashboard/header.php";
?>

<div id="myModal" class="hidden fixed flex px-8 z-50 justify-center items-center top-0 left-0 w-full h-full">
  <div class="w-full z-20 absolute h-full bg-black opacity-20"></div>
  <div class="w-full z-50 absolute lg:w-1/2 py-8 px-16 rounded-lg bg-white dark:bg-gray-700 text-black dark:text-white">
    <p>Are you sure you want to delete this item?</p>
    <div class=" mt-8">
      <form action="" method="GET">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="type" value="reservation">
        <input type="password" name="pin" placeholder="Enter manager PIN" class="py-2 px-8 rounded w-full mb-4 dark:bg-gray-600 dark:text-white">
        <div class="flex">
          <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="py-2 px-4 bg-red-500 rounded-md text-white">No</a>
          <input type="submit" name="delete" value="Yes" class="py-2 px-4 bg-purple-500 ml-4 cursor-pointer rounded-md text-white">
        </div>
      </form>
    </div>
  </div>
</div>

<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <div class="flex justify-between items-center">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Reservation
      </h2>
      <!-- <a href="add-room.php">
        <button class="py-2 px-4 rounded-md bg-purple-500 hover:bg-purple-700 active:bg-purple-600 text-white">
          <i class="las la-plus text-lg"></i> Add Room
        </button>
      </a> -->
    </div>



    <!-- With actions -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">User Name</th>
              <th class="px-4 py-3">Checked In By</th>
              <th class="px-4 py-3">Start Date</th>
              <th class="px-4 py-3">End Date</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Rooms Count</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <?php foreach ($reservations as $reservation) :


            ?>
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div>
                      <p class="font-semibold"><?= $reservation["user_name"]; ?></p>
                    </div>
                  </div>
                </td>

                <td class="px-4 py-3 text-sm">
                  <?= $reservation["receptionist_name"] ?? "N/A"; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?= $reservation["start_date"]; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?= $reservation["end_date"]; ?>
                </td>
                <td class="px-4 py-3 text-xs">
                  <?php
                  if ($reservation["status"] == NULL) {
                  ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                      Pending
                    </span>
                  <?php
                  } else if ($reservation["status"] == "1") {
                  ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                      Approved
                    </span>
                  <?php
                  } else {
                  ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                      Rejected
                    </span>
                  <?php
                  } ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?= count($reservation["rooms"]); ?>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    <a href="add-room.php?id=<?= $reservation["id"]; ?>"><button class=" flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </button></a>

                    <a id="delete" data-id="<?= $reservation["id"]; ?>" data-href="delete.php">
                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>

                        </svg>
                      </button>
                    </a>
                    <script>
                      document.getElementById("delete").addEventListener("click", function() {
                        var modal = document.getElementById("myModal");
                        modal.classList.remove('hidden');
                        modal.querySelector('input[name="id"').value = this.getAttribute("data-id");
                        modal.querySelector('form').action = this.getAttribute('data-href');
                      });
                    </script>
                    <a href="view-reservation.php?id=<?= $reservation["id"]; ?>">
                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                        <i class="las la-eye text-xl"></i>
                      </button>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
          Showing 21-30 of 100
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
          <nav aria-label="Table navigation">
            <ul class="inline-flex items-center">
              <li>
                <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                  <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                  </svg>
                </button>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                  1
                </button>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                  2
                </button>
              </li>
              <li>
                <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                  3
                </button>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                  4
                </button>
              </li>
              <li>
                <span class="px-3 py-1">...</span>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                  8
                </button>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                  9
                </button>
              </li>
              <li>
                <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                  <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                  </svg>
                </button>
              </li>
            </ul>
          </nav>
        </span>
      </div>
    </div>
  </div>
</main>
</div>
</div>
</body>

</html>