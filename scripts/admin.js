let admins = {};

$(document).ready(function() {
    $.ajax({
        url: "api/get-admins.php",
        success: show_admins
    });

    $.ajax({
        url: "api/products.php",
        success: show_products
    });
})

function show_admins(data) {
    data = JSON.parse(data);

    for (let elem of data)
        show_admin(elem);
}

function show_admin(elem) {
    let is_admin = +elem.admin == 1;
    admins[elem.username] = is_admin;

    let row = $('<tr></tr>');

    let username = $('<td></td>');
    username.text(elem.username);
    row.append(username);

    let admin = $('<td></td>');
    row.append(admin);
    
    let checkbox = $('<input type="checkbox"></input>');
    checkbox.prop('checked', is_admin);
    checkbox.prop('id', `admins-${elem.username}`);
    admin.append(checkbox);

    let label = $('<label></label>');
    label.prop('for', checkbox.attr('id'));
    label.text(is_admin ? 'Admin' : 'User');
    admin.append(label);

    checkbox.click(function(e) {
        e.preventDefault();
        change_admin(elem.username, checkbox, label);
    });

    $('#admins').append(row);
}

function change_admin(username, checkbox, label) {
    let new_status = !admins[username];
    let admin = new_status ? 1 : 0;  // convert to digit

    $.ajax({
        url: `api/set-admin.php?username=${username}&value=${admin}`,
        success: function() {
            admins[username] = new_status;
            checkbox.prop('checked', new_status);
            label.text(new_status ? 'Admin' : 'User');
        }
    });
}

function show_products(data) {
    data = JSON.parse(data);

    for (let elem of data)
        show_product(elem);
}

function show_product(elem) {
    let row = $('<tr></tr>');

    let name = $('<td></td>');
    name.text(elem.name);
    row.append(name);
    
    let description_cell = $('<td></td>');
    row.append(description_cell);

    let description = $('<textarea rows="10"></textarea>')
    description.text(elem.descr);
    description_cell.append(description);

    let price_cell = $('<td></td>');
    row.append(price_cell);

    let price = $('<input type="number" min="0" step=".25" oninput="this.value = (+this.value).toFixed(2)"></input>');
    price.val(elem.price);
    price_cell.append(price);
    price_cell.append(' €');

    let button_cell = $('<td></td>');
    button_cell.addClass('center');
    row.append(button_cell);

    let save_button = $('<button></button>');
    save_button.addClass('btn btn-primary mb-1');
    save_button.text('Update');
    button_cell.append(save_button);

    save_button.click(function() {
        let new_description = description.val();
        let new_price = price.val();

        update_product(elem.name, new_description, new_price, save_button);
    });

    let delete_button = $('<button></button>');
    delete_button.addClass('btn btn-danger mb-1');
    delete_button.text('Delete');
    button_cell.append(delete_button);

    delete_button.click(function() {
        delete_button.prop('disabled', true);
        delete_product(elem.name, row);
    });

    $('#products').append(row);
}

function update_product(name, new_description, new_price, button) {
    button.prop('disabled', true);

    $.ajax({
        url: `api/update-product.php?name=${name}&descr=${new_description}&price=${new_price}`,
        success: function() {
            button.prop('disabled', false);
        },
        error: function(e) {
            console.log(e);
            alert('Error during product update. Please reload the current page.');
        }
    });
}

function delete_product(name, row) {
    $.ajax({
        url: `api/delete-product.php?name=${name}`,
        success: function() {
            row.remove();
        }
    });
}

function insert_product() {

}