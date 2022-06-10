<?php
require_once "controllers/PaymentController.php";
$controller = new PaymentController();
$result = $controller->add_payment();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="tailwind.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="mx-10 md:mx-20">
    <header class="sm:block md:flex justify-end items-end pt-10 pb-24 border-b-2">
        <div class="md:pr-10">
            <nav class="md:flex">
                <div><a href="#" class="font-medium text-gray-700 text-xl pl-10 uppercase">Rooms</a></div>
                <div><a href="#" class="font-medium text-gray-700 text-xl pl-10 uppercase">Recently Viewed</a></div>
                <div><a href="#" class="font-medium text-gray-700 text-xl pl-10 uppercase">Bookings</a></div>
            </nav>
        </div>
        <div class="ml-11">
            <img src="images/logo.png" class="rounded-full" width="70" height="60" alt="">
        </div>
    </header>
    <main>
        <section>
            <div class="mb-5">
                <div class="md:flex justify-between">
                    <div>
                        <?php // display message when payment is success
                        if ($result) {
                        ?>
                            <p class="bg-green-100 text-green-700">Payment added successfully</p>
                        <?php
                        }
                        ?>
                        <h1 class="font-semibold text-xl text-gray-800 mb-1 mt-6">Payment Information</h1>
                        <p class="text-gray-400 text-xs">Choose your method of payment.</p>
                        <div class="md: pt-6 pl-7 text-white space-y-2 w-96 h-60 mt-5 rounded-md bg-gradient-to-r from-blue-500 to-blue-600">
                            <h6 class="text-xs uppercase font-semibold">card number</h6>
                            <h6 class="text-xs uppercase tracking-widest font-semibold">4324 5433 9382 1030</h6>
                            <img src="images/chip.png" width="50" height="50" alt="">
                            <h6 class="text-xs uppercase font-semibold">expiration date</h6>
                            <h6 class="text-xs uppercase font-semibold">03 / 24</h6>
                            <div class="flex justify-between items-center">
                                <h6 class="text-sm font-semibold mb-5">John Doe</h6>
                                <div class="mb-5">
                                    <img src="images/mastercard-logo.jpg" width="85" height="20" class="pr-5" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-end items-center space-x-5 md:flex justify-end items-center mt-5">
                            <div class="flex justify-start items-center mr-2 bg-red-500">
                                <div class="w-14 h-5"><img src="visa.jpg" alt=""> </div>
                                <div class="w-14 h-5"><img src="discover.jpg" alt=""></div>
                            </div>
                            <div class="flex ml-5 items-center">
                                <div class="w-3 h-3 rounded-full bg-gray-200"></div>
                                <img class="ml-5 w-14 h-5" src="images/paypal.png" alt="">
                            </div>
                        </div>
                        <form action="" class="mt-10" method="POST">
                            <div class="block w-full md:flex">
                                <div class="mr-10">
                                    <label for="" class="block text-sm mb-4">Card holder</label>
                                    <input required type="text" name="card_holder" class="border-2 w-64 h-10 rounded-sm ">
                                </div>
                                <div class="mr-10">
                                    <label for="" class="block text-sm mb-4">Credit card number</label>
                                    <input required type="text" name="creditcard_number" class="border-2 w-64 h-10 rounded-sm ">
                                </div>
                                <div>
                                    <label for="" class="block text-sm mb-4">Expiration Month</label>
                                    <input required type="text" name="exp_month" class="border-2 w-64 h-10 rounded-sm ">
                                </div>
                            </div>
                            <div class="block w-full md:flex">
                                <div class="mr-10">
                                    <label for="" class="block text-sm mb-4 mt-4">Security Code</label>
                                    <input required type="text" name="security_code" class="border-2 w-64 h-10 rounded-sm ">
                                </div>
                                <div>
                                    <label for="" class="block text-sm mb-4 mt-4">Postal Code</label>
                                    <input required type="text" name="postal_code" class="border-2 w-64 h-10 rounded-sm ">
                                </div>
                                <div>
                                    <label for="" class="block text-sm mb-4 mt-4">Expiration Year</label>
                                    <input required type="text" name="exp_year" class="border-2 w-60 h-10 rounded-sm ">
                                </div>
                            </div>
                            <div class="flex justify-start items-center mt-5">
                                <input type="radio" name="" id="">
                                <p class="text-sm ml-3">Use this card for next time purchase</p>
                            </div>

                            <button type="submit" name="submit" class="w-full bg-blue-600 text-center p-4 rounded-sm text-white font-medium text-sm mt-5">
                                Save information
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <hr>
        </section>
        <section class="space-y-10 mb-10">
            <div class="flex justify-between">
                <div class="font-bold text-gray-700">Subtotal</div>
                <div class="font-bold text-gray-700">₦2,497.00</div>
            </div>
            <div class="flex justify-between">
                <div class="font-bold text-gray-700">Estimated TAX</div>
                <div class="font-bold text-gray-700">₦119.64</div>
            </div>
            <div class="flex justify-between">
                <div class="font-bold text-gray-700">Promotional Code: <span class="text-gray-300">Z4KXLM9A</span> </div>
                <div class="font-bold text-gray-700">₦-60.00</div>
            </div>
            <hr>
            <div class="flex justify-between">
                <div>
                    <button class="font-semibold bg-blue-600 px-10 py-3 text-white text-xl rounded-sm">Complete payment</button>
                </div>
                <h1 class="font-extrabold text-xl">TOTAL:₦2556.64</h1>
            </div>
        </section>
    </main>
</body>

</html>