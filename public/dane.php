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

        input{
            width:20cm;
        }
    </style>
</head>

<body>
    <div id="app" style="max-width:80%;margin:auto">
        <h2>Dane do faktury</h2>    

        <div class="mb-1">
            <label for="">NIP</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-1">
            <label for="">Nazwa firmy</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-1">
            <label for="">Adres</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-1">
            <label for="">Kod pocztowy</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-1">
            <label for="">Miejscowość</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-1">
            <label for="">Kraj</label>
            <input type="text" class="form-control">
        </div>

        <h2>Dodatkowe dane</h2>
        <div class="mb-1">
            <label for="">Wyślij fakturę email (PDF)</label>
            <input type="text" class="form-control">
        </div>
         <div class="mb-1">
            <label for="">Numer telefonu księgowy</label>
            <input type="text" class="form-control">
        </div>



       




    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
               
            },
            methods: {
              
            },
            mounted() {
   
            },
            computed: {
            
            }
        })

    </script>
</body>

</html>