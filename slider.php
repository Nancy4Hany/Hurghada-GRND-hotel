<!DOCTYPE html>
<html lang="en" class="w-full h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/app.css">
    <title>Sign Up</title>
</head>

<body class="w-full h-full" style="background-image: url('images/feedbackbegad.jpg');">
    <div class="w-full h-full flex justify-center items-center bg-slate-100">
        <div class="w-2/3 pb-16 bg-white shadow-lg">
            <div class="mx-auto mb-16 py-4 rounded-b-xl px-16 text-5xl bg-orange-100 text-gray-700 shadow-lg table ">Reserve Room</div>
            <div class="flex justify-between px-16">
                <div class="step-circle relative w-24 h-24 rounded-full bg-orange-400 ring-4 ring-orange-300 flex justify-center items-center text-4xl text-white">
                    1
                </div>
                <div class="step-circle w-24 h-24 relative rounded-full bg-orange-200 border-2 border-orange-400 flex justify-center items-center text-4xl text-white">
                    2
                </div>
                <div class="step-circle w-24 h-24 rounded-full bg-orange-200 border-2 border-orange-400 flex justify-center items-center text-4xl text-white">
                    3
                </div>
                
            </div>

            <form method="POST">
                <div class="step-inputs mt-8 text-center hidden">
                    <label>
                        <p>Select Option</p>
                        <select name="option" class="py-2 px-8 border border-slate-500" id="">
                        <option value="">Select an option</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                        <option value="">Option 3</option>
                    </select>
                    </label>
                    <br>
                </div>

                <div class="step-inputs text-center hidden">
                    Step 2 <br>
                    <input type="text" class="border border-slate-500 mt-4"><br>
                    <input type="text" class="border border-slate-500 mt-4"><br>
                    <input type="text" class="border border-slate-500 mt-4">
                </div>

                <div class="step-inputs text-center hidden">
                    Step 3 <br>
                    <div class="flex justify-center flex-wrap items-center w-full">
                        <label class="transform relative hover:scale-110 transition-all border border-orange-300">
                           <input type="checkbox" class="peer">
                           <div class="absolute top-0 left-0 bg-orange-500 hidden peer-checked:block"></div>
                            <div class="w-48 h-48">
                                <img src="uploads/1652970159.jpg" class="w-full h-full object-cover object-center" alt="">
                            </div>
                            <div class="py-2 px-2 text-center font-bold">
                                <p>Name</p>
                                <p class="text-green-500">
                                    EGP 300/night
                                </p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button  type="button" class="table mt-4 mx-2 bg-gray-800 text-white py-2 px-8">
                        Save
                    </button>
                    <button id="step_button" type="button" class="table mt-4 mx-2 bg-green-500 text-white py-2 px-8">
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var current_step = 1;
        var max_step =3 ;
        var step_circles = document.querySelectorAll('.step-circle');
        var step_inputs = document.querySelectorAll('.step-inputs');
        var step_button = document.querySelector('#step_button');
        step_inputs[0].classList.remove('hidden');

        function step(i) {
            if (i + 1 == max_step) {
                setTimeout(function() {
                    step_button.innerText = "Submit and Finish";
                    step_button.type = "submit";
                }, 100);
            }else{
                step_button.innerText = "Next";
                step_button.type = "button";
            }
            current_step = parseInt(step_circles[i].innerText);
            for (let i = 0; i < step_circles.length; i++) {
                step_circles[i].classList.remove('bg-orange-400');
                step_circles[i].classList.add('bg-orange-200');
                step_circles[i].classList.add('border-orange-400');
                step_circles[i].classList.remove('ring-orange-400');
                step_circles[i].classList.remove('ring-4');
                step_circles[i].classList.add('border-2');
            }

            for (let i = 0; i < current_step; i++) {
                step_circles[i].classList.add('bg-orange-400');
                step_circles[i].classList.remove('bg-orange-200');
                step_circles[i].classList.remove('border-orange-400');
                step_circles[i].classList.add('ring-orange-300');
                step_circles[i].classList.add('ring-4');
                step_circles[i].classList.remove('border-2');
            }


            for (let j = 0; j < step_inputs.length; j++) {
                step_inputs[j].classList.add('hidden');
            }
            step_inputs[i].classList.remove('hidden');
            step_inputs[i].classList.add('visible');
        }
        for (let i = 0; i < step_circles.length; i++) {
            step_circles[i].addEventListener('click', function() {
                step(i);
            });
        }
        step_button.addEventListener('click', function() {
            if (current_step < max_step) {
                current_step++;
                step(current_step - 1);
                if (current_step == max_step) {
                    let self = this;
                    setTimeout(function() {
                        self.innerText = "Submit and Finish";
                        self.type = "submit";
                    }, 100);
                }
            }
        });
    </script>
</body>

</html>