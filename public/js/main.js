// обработка события выбора валюты
$('#currency').change( (e) => {
    window.location = 'currency/change?currency=' + e.target.value;
//        console.log(e.target.value);
        
});

