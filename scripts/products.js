$(document).ready(function() {
    $.ajax({
        url: "api/products.php",
        success: show,
        error: console.error
    });
})

function show(data) {
    data = JSON.parse(data);

    console.log(data);

    for (let elem of data)
        show_elem(elem);
}

function show_elem(elem) {
    let card = $('<div></div>');
    card.addClass("card");

    let img = $('<img/>');
    img.addClass("card-img-top");
    img.prop("src", elem.img_path);
    img.prop("alt", elem.name);
    card.append(img);

    let card_body = $('<div></div>');
    card_body.addClass('card-body');
    card.append(card_body);

    let title = $('<h5></h5>');
    title.addClass('card-title');
    title.text(elem.name);
    card_body.append(title);

    let text = $("<p></p>");
    text.addClass("card-text");
    if (elem.descr.length > 50) {
        let text_short = elem.descr.substr(0,50) + "...";
        shorten_descr(text, text_short, elem.descr);
    } else {
        text.text(elem.descr);
    }
    card_body.append(text);

    let row = $('<div></div>');
    row.addClass('row');
    card_body.append(row);

    let col1 = $('<div></div>');
    col1.addClass('col');
    row.append(col1);

    let buy_btn = $("<button></button>");
    buy_btn.prop("href","#");
    buy_btn.addClass("btn");
    buy_btn.addClass("btn-primary");
    buy_btn.text("Acquista");
    buy_btn.click(() => buy(card, buy_btn, elem.price));
    col1.append(buy_btn);

    let col2 = $('<div></div>');
    col2.addClass('col');
    row.append(col2);

    let price = $("<label></label>");
    price.addClass("price");
    price.text("€ ");
    col2.append(price); 
    
    let price_span = $("<span></span>");
    price_span.text((+(elem.price)).toFixed(2));
    price.append(price_span);

    $("#products").append(card);
}

function shorten_descr(text, text_short, text_long) {
    text.text(text_short);

    let expand = $("<a></a>");
    expand.addClass("buy-btn-text");
    expand.text("Espandi");
    expand.click(() => expand_descr(text, text_short, text_long));
    text.append(expand);
};

function expand_descr(text, text_short, text_long) {
    text.text(text_long);

    let shorten = $("<a></a>");
    shorten.addClass("buy-btn-text");
    shorten.text("Riduci");
    shorten.click(() => shorten_descr(text, text_short, text_long));
    text.append(shorten);
}

function buy(card, button, price) {
    if (card.hasClass("bought")) {
        card.removeClass("bought");
        button.text("Acquista");
        button.removeClass("btn-danger");
        button.addClass("btn-primary");
        ($("#totale").text((+$("#totale").text() - (+price)).toFixed(2)));
    }
    else {
        card.addClass("bought");
        button.text("Annulla");
        button.removeClass("btn-primary");
        button.addClass("btn-danger");
        ($("#totale").text((+$("#totale").text() + (+price)).toFixed(2)));
    }
};