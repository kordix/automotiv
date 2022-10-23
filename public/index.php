<?php
session_start();


// echo $_SESSION['zalogowany'];

if (!isset($_SESSION['zalogowany'])) {
     header('Location: /login.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/mybootstrap.css">

    <style>
        body {
            font-size: 16px;
            background: #fafafa;
        }

        label {
            font-size: 11px;
        }

        .dokumenty p {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .productsheader{
            border: dashed 1px !important;
            border-color: #999 !important;
            /* border-bottom-right-radius: 24px !important; */
        }

        .productselem{
            border: dashed 1px !important;
            border-color: #E31E24 !important;
            display:flex;font-weight:bold;background:#fff;padding:10px
        }

        .productselem > div{
            border-right:1px #ddd solid;
            line-height: 70px;
            padding:5px;
            height:70px;
        }

        .productsheader > div {
            padding:5px;
        }

        .cena {
            border-right:0px #999 solid !important;
        }

        .productselem > div:last-child{
            border-right:0px #999 solid !important;
        }

        
    </style>
</head>

<body>
    <div id="app" style="max-width:80%;margin:auto">
    <input type="text" placeholder="wyszukaj" v-model="search">
    <br><br>
        <div style="display:flex;font-weight:bold;background:#fff;padding:10px" class="productsheader">
            <div style="width:140px;text-align:center">Zdjęcie</div>
            <div style="width:140px;text-align:center">SKU</div>
            <div style="width:140px;text-align:center">Nr katalogowy</div>
            <div style="width:600px">PRODUKT</div>
            <div style="width:170px">CENA</div>
            <!-- <div style="">Zamów</div> -->

        </div>

        <div style="" class="productselem" v-for="elem in filtered">
            <div style="width:140px;text-align:center"> <img :src="elem.obraz" alt="" style="max-width: 100%;height: 70px;"></div>
            <div style="width:140px;text-align:center">{{elem.sku}}</div>
            <div style="width:140px;text-align:center">{{elem.nrkatalog}}</div>

            <div style="width:600px">{{elem.title}}</div>
            <div style="width:170px;">{{elem.saleprice ? elem.saleprice : elem.regularprice}}</div>
            <div style="width:170px;" class="cena"><input type="number" style="width:50px;margin-right:5px" value="0"><button class="btn-primary" style="height:30px;display:inline">Dodaj</button></div>
            

        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                produkty: [],
                produktdata: {
                    sku: '',
                    nrkatalog: '',
                    obraz: '',
                    opis: '',
                    producent: '',
                    kategoria: '',
                    podkategoria: '',
                    regularprice: 0
                },
                sortkey: '',
                search:''
            },
            methods: {
                add() {
                    let self = this;
                    console.log(JSON.stringify(self.produktdata));
                    fetch('/api/add.php', { method: 'POST', body: JSON.stringify(self.produktdata) }).then((res) => console.log('poszlo'))
                },
                wywal(id) {
                    let self = this;
                    fetch('/api/delete.php', { method: 'POST', body: JSON.stringify(id) }).then((res) => location.reload())
                }
            },
            mounted() {
                let self = this;
                fetch('/api/produkty.php').then(res => res.json()).then((res) => self.produkty = res)
            },
            computed: {
                filtered: function () {
                    console.log('fsafdad');
                    let self = this;
                    var filterKey = this.search && this.search.toLowerCase()
                    var order = 1;
                    var filtered = this.produkty;
                    if (filterKey) {
                        filtered = filtered.filter(function (row) {
                            return Object.keys(row).some(function (key) {
                                return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                            })
                        })
                    }
                    if (this.sortkey) {

                        filtered = filtered.sort(function (a, b) {
                            console.log(self.sortkey);

                            var keyA = a[self.sortkey];
                            var keyB = b[self.sortkey];
                            // Compare the 2 dates
                            if (keyA < keyB) return -1;
                            if (keyA > keyB) return 1;
                            return 0;
                        })
                    }
                    return filtered
                }
            }
        })

    </script>
</body>

</html>