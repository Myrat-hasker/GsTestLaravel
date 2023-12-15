const phoneInput = document.querySelector("#mobile_number");

let im = new Inputmask('+7 (999) 999-99-99');
im.mask(phoneInput);