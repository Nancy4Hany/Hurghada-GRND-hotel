<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include "QC.html";
    ?>
</head>
<body>
<div class="container ml-10">
    <div class="py-3">
        <div class="max-w-md bg-white shadow-lg rounded-lg md:max-w-xl mx-2">
            <div class="md:flex ">


                    <div class="relative pb-5"> </div> <span>Credit Card Information</span>
                    <div class="grid md:grid-cols-2 md:gap-2"> <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Name*"> <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Card Number*"> </div> <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Expire Month*">
                    <div class="grid md:grid-cols-3 md:gap-2"> <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Expire year*"> <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="CVV*"> </div>
                    <div class="block">
  <div class="mt-2 align-top">
    <label class="inline-flex items-center">
      <input type="checkbox" class="w-6 h-6 rounded"  />
      <span class="ml-2">I will pay with cash</span>
    </label>
  </div>
</div>
                    <div class="flex justify-between items-center pt-2"> <button type="button" class="h-12 w-48 rounded font-medium text-xs bg-blue-500 text-white">Checkout</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>