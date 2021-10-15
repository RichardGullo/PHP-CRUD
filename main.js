// Configuration Form Fields
let configFormFields = document.querySelectorAll("#config-form input");

for(input of configFormFields)
{
    console.log(input);
    if(input.dataset.name == "timeout"){

        input.addEventListener("change", (e)=>{
                console.log(e.target.value);
                
        });
    }
}