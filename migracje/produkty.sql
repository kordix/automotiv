CREATE TABLE produkty (
    id int AUTO_INCREMENT PRIMARY KEY,
    sku varchar(255),
    nrkatalog varchar(255),
    obraz varchar(255) NULL,
     title varchar(255) NULL,
    opis text NULL,
    producent varchar(255) null,
    kategoria varchar(255) null,
    podkategoria  varchar(255) null,
    barkody varchar(255) null,
    quality varchar(255)  null,
    regularprice float null,
    saleprice float null,
    productweight float null,
    quantitystore float null
)