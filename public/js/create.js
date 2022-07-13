function create(){
    const input = document.getElementById('text_area');
    const span=document.querySelector("form span");
    const submit=document.getElementById("submit");

    if(!input.value || input.value === ' '){    
        span.classList.remove("hidden");
        span.classList.add("errore");
        submit.disabled=true;
    }
    else{
        span.classList.add("hidden");
        submit.disabled=false;
        console.log(input.value);
    }
}


document.getElementById("text_area").addEventListener("blur", create);
