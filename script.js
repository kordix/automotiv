let cruddata = [];

async function loadData() {
    let self = this;
    await fetch('/api/srwforms.php').then(res => res.json()).then((res) => cruddata = res)
}





function loadList() {

    //  filtruj();
    // document.querySelector('#tablebody').innerHTML = '';

    // for (let i = 0; i < dane.length; i++) {
    //     let elem = dane[i];
    //     document.querySelector('#tablebody').innerHTML += `<tr><td>${elem.id}</td><tr>`;
    // }

    for (let i = 0; i < cruddata.length ; i++) {
        let crudelem = cruddata[i];
        let element = document.createElement('tr');
        element.innerHTML = `<td>${crudelem.id}</td><td>${crudelem.date}</td><td>${crudelem.nr}</td><td>${crudelem.cli_type}</td><td>${crudelem.name} ${crudelem.surname}</td>`;
        document.querySelector('#tablebody').append(element);
    }

    // for (let i = 0; i < 2000 ; i++) {
    //     let elem = dane[i];
    //     document.querySelector('#dupa').innerHTML += `${i}`;
    // }
}


loadData().then((res) => {
    loadList();

})



