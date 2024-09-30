document.querySelector('#name').textContent = document.querySelector('#shop_name').textContent;

function timeChange() {
    document.querySelector('#time').textContent = document.getElementById('rese_time').value;
}

function numberChange() {
    document.querySelector('#number').textContent = `${document.getElementById('rese_number').value}人`;
}

function dateChange() {
    document.querySelector('#date').textContent = document.getElementById('rese_date').value;
}

