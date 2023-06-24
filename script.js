                                                    /*login page*/

const pwShowHide = document.querySelectorAll(".pw_hide");

pwShowHide.forEach((icon) => {
icon.addEventListener("click", () => {
  let getPwInput = icon.parentElement.querySelector("input");
  if (getPwInput.type === "password") {
    getPwInput.type = "text";
    icon.classList.replace("uil-eye-slash", "uil-eye");
  } else {
    getPwInput.type = "password";
    icon.classList.replace("uil-eye", "uil-eye-slash");
  }
});
});




                                                  /*second page js*/
const menu1=document.querySelectorAll('.sem');
menu1.forEach(sem=>{
    const select=sem.querySelector('.select');
    const symbol=sem.querySelector('.symbol');
    const drop=sem.querySelector('.drop');
    const option=sem.querySelectorAll('.drop li');
    const highlighted=sem.querySelector('.highlight');

    select.addEventListener('click',()=>{
        select.classList.toggle('select-clicked');
        symbol.classList.toggle('symbol-rotate');
        drop.classList.toggle('drop-open');
    });

    option.forEach(options=>{
        options.addEventListener('click',()=>{
            highlighted.innerText=options.innerText;
            select.classList.remove('select-clicked');
            symbol.classList.remove('symbol-rotate');
            drop.classList.remove('drop-open');
            option.forEach(options => {
                options.classList.remove('active');
            });
            options.classList.add('active');
        });
    });
});

const menu2=document.querySelectorAll('.branch');
menu2.forEach(branch=>{
    const select=branch.querySelector('.select');
    const symbol=branch.querySelector('.symbol');
    const drop=branch.querySelector('.drop');
    const option=branch.querySelectorAll('.drop li');
    const highlighted=branch.querySelector('.highlight');

    select.addEventListener('click',()=>{
        select.classList.toggle('select-clicked');
        symbol.classList.toggle('symbol-rotate');
        drop.classList.toggle('drop-open');
    });

    option.forEach(options=>{
        options.addEventListener('click',()=>{
            highlighted.innerText=options.innerText;
            select.classList.remove('select-clicked');
            symbol.classList.remove('symbol-rotate');
            drop.classList.remove('drop-open');
            option.forEach(options => {
                options.classList.remove('active');
            });
            options.classList.add('active');
        });
    });
});

const menu3=document.querySelectorAll('.pastyear');
menu3.forEach(pastyear=>{
    const select=pastyear.querySelector('.select');
    const symbol=pastyear.querySelector('.symbol');
    const drop=pastyear.querySelector('.drop');
    const option=pastyear.querySelectorAll('.drop li');
    const highlighted=pastyear.querySelector('.highlight');

    select.addEventListener('click',()=>{
        select.classList.toggle('select-clicked');
        symbol.classList.toggle('symbol-rotate');
        drop.classList.toggle('drop-open');
    });

    option.forEach(options=>{
        options.addEventListener('click',()=>{
            highlighted.innerText=options.innerText;
            select.classList.remove('select-clicked');
            symbol.classList.remove('symbol-rotate');
            drop.classList.remove('drop-open');
            option.forEach(options => {
                options.classList.remove('active');
            });
            options.classList.add('active');
        });
    });
});

function ValidationForm() {
    let password = document.forms["Logform"]["password"];
    let email = document.forms["Logform"]["emailId"];
    if(password.value == "") {
      alert("Please enter your password.");
      fname.focus();
      return false;
    }
    if(email.value == "") {
      alert("Please enter a valid e-mail address.");
      email.focus();
      return false;
    }
    if(email.value.indexOf("@", 0) < 0) {
      alert("Please enter a valid e-mail address.");
      email.focus();
      return false;
    }
    if(email.value.indexOf(".", 0) < 0) {
      alert("Please enter a valid e-mail address.");
      email.focus();
      return false;
    }
    return true;
  }
