let costInputs = document.querySelectorAll("#cost input")

let getCost = () =>{

    let gross = costInputs[0].value ;
    let tax = costInputs[1].value ;
    let bouns = costInputs[2].value ;
    let net = costInputs[3] ;

    let taxValue = +gross * (+tax / 100);
    let salaryAfterTax = gross - taxValue;
    let totalSalary = +salaryAfterTax + +bouns;

    net.value = Math.round(totalSalary);
}

for(let i =0 ; i<costInputs.length ;i++){
    costInputs[i].addEventListener("keyup" , getCost)   
}



let btn_reload = document.getElementById("btn_reload")

btn_reload.addEventListener("click" , ()=>{
    console.log("ahmed");
    location.reload();
});

