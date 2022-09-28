// var qElems = document.querySelectorAll('#questions>div');
// var qLength = document.getElementById('length');
// var qCounter = document.getElementById('counter');
// let progress = document.getElementById('progress');
// qLength.innerHTML = qElems.length;
// var i = 0
// function next() {
// for (i ; i <= qElems.length; i++) {
//     qCounter.innerHTML = i + 2 ;
//     if (qElems[i].style.display != 'none') {
//         qElems[i].style.display = 'none';
//         if (i == qElems.length - 1) {
//             qElems[0].style.display = 'block';
//             qCounter.innerHTML = 1  ;
//         } else {
//             qElems[i + 1].style.display = 'block';
//         }
//         break;
//     }
// }
// }
let qElems = document.querySelectorAll('#questions>div');
let qLength = document.getElementById('length');
qLength.innerHTML = qElems.length;
let no_box = document.getElementById('counter');
let btnSubmit = document.getElementById('submit');
let progress = document.getElementById('progress');
let width = 100 / qElems.length;
progress.style.width = `${width}%`;
let btnBack = document.getElementById('back');
btnBack.addEventListener('click', prev);
let btnNext = document.getElementById('next');
btnNext.addEventListener('click', next);

var i = 1;

function next() {
    // Loop to show next question
    for (let j = 0; j < qElems.length; j++) {
        if (qElems[j].style.display != 'none') {
            qElems[j].style.display = 'none';
            if (j == qElems.length - 1) {
                qElems[0].style.display = 'block';
            } else {
                qElems[j + 1].style.display = 'block';
            }
            progress.style.width = `${width*(j+2)}%`;
            break;
        }
    }
    // End position
    if (i == qElems.length - 1) {
        btnNext.style.display = 'none'
        btnSubmit.style.display = 'block';
    }
    if (i == qElems.length) {
        // Add disabled attribute on
        // next button
        btnNext.disabled = true;
        // Remove disabled attribute
        // from prev button
        btnBack.disabled = false;

    } else {
        i++;
        return setNo();
    }

}

function prev() {
    // Loop to back to previous question
    for (let j = 0; j < qElems.length; j++) {
        if (qElems[j].style.display == 'block') {
            var selctionEl = qElems[j];
            var prevEl = qElems[j - 1];
            selctionEl.style.display = 'none';
            prevEl.style.display = 'block'
        }
    }

    // Start position
    if (i == 1) {
        // Add disabled attribute on
        // prev button
        btnBack.disabled = true;
        // Remove disabled attribute
        // from next button
        btnNext.disabled = false;
    } else {
        i--;
        btnNext.style.display = 'block';
        btnSubmit.style.display = 'none';
        return setNo();
    }
}

function setNo() {
    // Change innerhtml
    return no_box.innerHTML = i;
}
