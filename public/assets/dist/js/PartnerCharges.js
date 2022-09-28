//  vreat new row
let add = document.getElementById('add'),
    delet = document.getElementById('delet'),
    invoice = document.getElementById('invoice');

add.addEventListener(('click'), () => {
    var new_row = document.createElement('div')
    new_row.classList.add('row')
    new_row.classList.add('align-items-center')
    new_row.classList.add('mt-1')
    new_row.classList.add('rounded')
    new_row.innerHTML = '<div class="col-2 border "><input type="text" class="border-0 p-2 w-100" placeholder="Description" name="data[services_charges][]" required></div>' +
        '<div class="col-1 border"><input type="number" class="data-amount border-0 p-2 w-100"  step="0.01" placeholder="0" name="data[amount][]" required></div>' +
        '<div class="col-2 border"><input type="number" class="data-price border-0 p-2 w-100" step="0.01" placeholder="0" name="data[price][]" required></div>' +
        '<div class="col-2 border p-2"> <span  class="data-total border-0 p-2 w-100">0</span></div>' +
        '<div class="col-2 border"><input type="number" class="data-vat border-0 p-2 w-100" step="0.01" placeholder="0" name="data[vat][]" required></div>' +
        '<div class="col-2 border"> <input type="number" class="totle-price border-0 p-2 w-100" step="0.0000000001" placeholder="0" name="data[total][]"></div>' +
        '<div class="col-1"><a class="delet btn btn-danger" id="delet"><span class="far fa-trash-alt"></span></a></div>';
    invoice.appendChild(new_row)
})

// delet  row
var total_delet = 0
document.addEventListener(('click'), () => {
    let delet = document.querySelectorAll('.delet');
    // delef frist row
    delet[0].addEventListener(('click'), () => {
            invoice.children[0].classList.add('d-none')
            total_delet = totlePrice[0].value;
        })
        // delet row
    for (let i = 0; i < delet.length; i++) {
        delet[i].addEventListener(('click'), () => {
            invoice.children[i].classList.add('d-none')
                // console.log(totlePrice[i].value)
                // total_delet = totlePrice[i].value;
        })
    }
})

// calculate
let dataAmount = document.querySelectorAll('.data-amount'),
    dataPrice = document.querySelectorAll('.data-price'),
    dataTotal = document.querySelectorAll('.data-total'),
    dataVat = document.querySelectorAll('.data-vat'),
    totlePrice = document.querySelectorAll('.totle-price'),
    Total = document.getElementById('Total')

// calculate
onclick = () => {
    onkeyup = () => {
        let dataAmount = document.querySelectorAll('.data-amount'),
            dataPrice = document.querySelectorAll('.data-price'),
            dataTotal = document.querySelectorAll('.data-total'),
            dataVat = document.querySelectorAll('.data-vat'),
            totlePrice = document.querySelectorAll('.totle-price'),
            Total = document.getElementById('Total');
        // to calculate the price on input
        for (let i = 0; i < dataTotal.length; i++) {
            dataTotal[i].textContent = dataAmount[i].value * dataPrice[i].value
                // to calculate the price with rate
            totlePrice[i].value = 1 * dataTotal[i].textContent + dataTotal[i].textContent * (dataVat[i].value / 100)
        }
        //     //balance / Total
        let balance_totle = 0;
        for (let i = 0; i < dataTotal.length; i++) {
            balance_totle = balance_totle + totlePrice[i].value * 1
            Total.textContent = balance_totle
        }
    }
    Total.textContent = Total.textContent - total_delet
}